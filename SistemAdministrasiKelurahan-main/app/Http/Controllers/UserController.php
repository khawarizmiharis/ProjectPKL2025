<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Staff;
use App\User;
use App\Villager;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert as FacaKelurahanlert;
use Spatie\Permission\Models\Role;

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
    public function create()
    {
        $villagers = Villager::where('user_id', null)->get();
        $roles = Role::get();

        return view('dashboard.manajemen_pengguna.pengguna-tambah', compact('villagers', 'roles'));
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

            return redirect()->route('manajemen-pengguna.pengguna')
                ->with('success', 'Pengguna berhasil ditambahkan');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('dashboard.manajemen_pengguna.pengguna.pengguna-edit');
    }

    /**
     * Update user role (perbaikan dari BadMethodCallException)
     */
    public function updateRole(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
            'role_name' => 'required|string'
        ]);

        $user = User::findOrFail($request->id);
        $user->syncRoles([$request->role_name]);

        FacaKelurahanlert::success('Berhasil', 'Role pengguna berhasil diperbarui');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('manajemen-pengguna.pengguna')
                            ->with('error', 'Data pengguna tidak ditemukan.');
        }

        $user->delete();

        return redirect()->route('manajemen-pengguna.pengguna')
                        ->with('success', 'Pengguna berhasil dihapus.');
    }

    public function activation(Request $request, User $user)
    {
        $attr = $request->validate([
            'is_active' => 'required|boolean'
        ]);

        $user->update($attr);

        if ($request->is_active == 1) {
            FacaKelurahanlert::success(' Berhasil ', 'Akun pengguna diaktifkan');
        } else {
            FacaKelurahanlert::success(' Berhasil ', 'Akun pengguna dinonaktifkan');
        }

        return redirect()->route('manajemen-pengguna.pengguna');
    }

    public function massDestroy(Request $request)
    {
        $ids = $request->input('selected_id', []);

        if (!empty($ids)) {
            User::whereIn('id', $ids)->delete();
        }

        return redirect()->route('manajemen-pengguna.pengguna')
                        ->with('success', 'Data pengguna terpilih berhasil dihapus.');
    }
}
