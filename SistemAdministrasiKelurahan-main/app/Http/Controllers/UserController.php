<?php

namespace App\Http\Controllers;

use App\User; 
use App\Villager; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;
use Spatie\Permission\Models\Role;
use App\Staff;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        $roles = Role::get();
        return view('dashboard.manajemen_pengguna.pengguna', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *  
     * @return \Illuminate\Http\Response
     */
    // UserController.php

    public function create()
    {
        $villagers = Villager::where('user_id', null)->get();
        $roles = Role::get();

        // TAMBAHKAN BARIS INI untuk mengambil data staff
        $staffs = Staff::where('user_id', null)->get();

        // TAMBAHKAN 'staffs' ke dalam compact()
        return view('dashboard.manajemen_pengguna.pengguna-tambah', compact('villagers', 'roles', 'staffs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik'       => 'required|string|max:20|unique:users,nik',
            'full_name' => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users,email',
            'password'  => 'required|string|min:6',
            'role'      => 'required|string',
            'photo'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('users', 'public');
        }

        try {
            $user = User::create([
                'nik'       => $request->nik,
                'full_name' => $request->full_name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'photo'     => $photoPath,
                'is_active' => 1,
            ]);

            $user->assignRole($request->role);

            
            return redirect()->route('dashboard.manajemen-pengguna.pengguna.index')
                ->with('success', 'Pengguna berhasil ditambahkan');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('dashboard.manajemen_pengguna.pengguna-edit', compact('user', 'roles'));
    }

    /**
     * Update user role
     */
    public function updateRole(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
            'role_name' => 'required|string|exists:roles,name'
        ]);

        $user = User::findOrFail($request->id);
        $user->syncRoles([$request->role_name]);

        FacadesAlert::success('Berhasil', 'Role pengguna berhasil diperbarui');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(User $user)
    {
        // PERBAIKAN: Hapus file foto dari storage jika ada
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->delete();

        return redirect()->route('dashboard.manajemen-pengguna.pengguna.index')
                         ->with('success', 'Pengguna berhasil dihapus.');
    }

    public function activation(Request $request, User $user)
    {
        $attr = $request->validate([
            'is_active' => 'required|boolean'
        ]);

        $user->update($attr);

        $message = $request->is_active ? 'Akun pengguna diaktifkan' : 'Akun pengguna dinonaktifkan';
        FacadesAlert::success('Berhasil', $message);

        return redirect()->route('dashboard.manajemen-pengguna.pengguna.index');
    }

    public function massDestroy(Request $request)
    {
        $ids = $request->input('selected_id', []);

        if (!empty($ids)) {
            $usersToDelete = User::whereIn('id', $ids)->get();

            foreach ($usersToDelete as $user) {
                // PERBAIKAN: Hapus foto untuk setiap user
                if ($user->photo) {
                    Storage::disk('public')->delete($user->photo);
                }
            }
            
            User::whereIn('id', $ids)->delete();
        }

        return redirect()->route('dashboard.manajemen-pengguna.pengguna.index')
                         ->with('success', 'Data pengguna terpilih berhasil dihapus.');
    }
}