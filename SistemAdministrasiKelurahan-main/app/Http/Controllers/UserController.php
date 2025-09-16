<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Staff;
use App\User;
use RealRashid\SweetAlert\Facades\Alert as FacaKelurahanlert;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $users = User::latest()->paginate(10);
        $roles = Role::all();
        return view('dashboard.manajemen_pengguna.pengguna', compact('users', 'roles'));
    }

    // Form tambah pengguna
    public function create()
    {
        $staffs = Staff::with('villager')->get();
        $roles = Role::all();

        return view('dashboard.manajemen_pengguna.pengguna-tambah', compact('staffs', 'roles'));
    }

    // Simpan pengguna baru
    public function store(Request $request)
    {
        $request->validate([
            'staff' => 'required|exists:staff,id',
            'role'  => 'required|exists:roles,name',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        $staff = Staff::with('villager')->findOrFail($request->staff);

        if (!$staff->villager) {
            return back()->withErrors(['staff' => 'Staf ini belum memiliki data warga terkait']);
        }

        $email = $staff->villager->nik . '@example.com';

        if (User::where('email', $email)->exists()) {
            return back()->withErrors(['staff' => 'Pengguna untuk staf ini sudah ada']);
        }

        $photoPath = $request->hasFile('photo') ? $request->file('photo')->store('users', 'public') : null;

        try {
            $user = new User();
            $user->nik = $staff->villager->nik;
            $user->full_name = $staff->villager->full_name;
            $user->email = $staff->villager->nik . '@example.com';
            $user->password = Hash::make('123456');
            $user->phone = $staff->phone ?? $staff->villager->phone ?? '';
            $user->photo = $photoPath;
            $user->is_active = 1;

            $user->save(); // simpan user

            $user->assignRole($request->role); // assign role

            FacaKelurahanlert::success('Berhasil', 'Pengguna berhasil ditambahkan');
            return redirect()->route('manajemen-pengguna.pengguna');

        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withErrors(['error' => 'Database Error: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    // Form edit pengguna
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('dashboard.manajemen_pengguna.pengguna-edit', compact('user', 'roles'));
    }

    // Update role pengguna
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

    // Hapus pengguna
    public function destroy(User $user)
    {
        $user->delete();
        FacaKelurahanlert::success('Berhasil', 'Pengguna berhasil dihapus');
        return redirect()->route('manajemen-pengguna.pengguna');
    }

    // Aktivasi / nonaktifkan pengguna
    public function activation(Request $request, User $user)
    {
        $request->validate([
            'is_active' => 'required|boolean'
        ]);

        $user->update(['is_active' => $request->is_active]);

        $message = $request->is_active ? 'Akun pengguna diaktifkan' : 'Akun pengguna dinonaktifkan';
        FacaKelurahanlert::success('Berhasil', $message);

        return redirect()->route('manajemen-pengguna.pengguna');
    }

    // Hapus banyak pengguna sekaligus
    public function massDestroy(Request $request)
    {
        $ids = $request->input('selected_id', []);

        if (!empty($ids)) {
            User::whereIn('id', $ids)->delete();
            FacaKelurahanlert::success('Berhasil', 'Data pengguna terpilih berhasil dihapus');
        } else {
            FacaKelurahanlert::error('Gagal', 'Tidak ada data yang dipilih');
        }

        return redirect()->route('manajemen-pengguna.pengguna');
    }
}