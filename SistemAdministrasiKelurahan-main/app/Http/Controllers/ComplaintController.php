<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\ComplaintCategory;
use App\Mail\ComplaintMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::latest()->paginate(10);
        return view('dashboard.manajemen_pengaduan.pengaduan', compact('complaints'));
    }

    public function show(Complaint $complaint)
    {
        // Menampilkan halaman detail pengaduan
        return view('dashboard.manajemen_pengaduan.pengaduan-show', compact('complaint'));
    }

    public function create()
    {
        return view('visitors.pengaduan.form', [
            'complaint_categories' => ComplaintCategory::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'                  => ['required', 'string', 'max:255', 'regex:/^[\pL\s.,]+$/u'],
            'email'                 => 'nullable|email|max:255', 
            'phone_number'          => 'required|string|max:15',
            'complaint'             => ['required', 'string', 'max:5000', 'regex:/^[\pL\s.,!?-]+$/u'],
            'complaint_category_id' => 'required',
            'other_category'        => 'nullable|string|max:255',
            'attachment'            => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048'
        ], [
            'name.regex'      => 'Nama hanya boleh berisi huruf dan spasi.',
            'complaint.regex' => 'Isi pengaduan hanya boleh berisi huruf dan tanda baca umum.'
        ]);

        // ✅ handle kategori "lainnya"
        if ($request->complaint_category_id === 'lainnya' && $request->filled('other_category')) {
            $validatedData['complaint_category_id'] = null; 
            $validatedData['other_category'] = $request->other_category;
        } else {
            $validatedData['other_category'] = null;
        }

        // ✅ handle upload lampiran
        if ($request->hasFile('attachment')) {
            $validatedData['attachment'] = $request->file('attachment')->store('complaints/attachment', 'public');
        }

        $complaint = Complaint::create($validatedData);

        // Kalau mau aktifkan email
        // if (!empty($validatedData['email'])) {
        //     Mail::to($validatedData['email'])->send(new ComplaintMail($complaint));
        // }

        Alert::success('Berhasil', 'Pengaduan anda berhasil terkirim. Mohon untuk menunggu respon dari kami.');
        return redirect()->back();
    }

    public function destroy(Complaint $complaint)
    {
        // Hapus lampiran jika ada
        if ($complaint->attachment && Storage::disk('public')->exists($complaint->attachment)) {
            Storage::disk('public')->delete($complaint->attachment);
        }

        $complaint->delete();

        Alert::success('Berhasil', 'Data pengaduan berhasil dihapus');
        return redirect()->route('manajemen-pengaduan.data-pengaduan');
    }
}