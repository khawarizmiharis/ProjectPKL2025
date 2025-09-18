<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\ComplaintCategory;
use App\Mail\ComplaintMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::latest()->paginate(10);
        return view('dashboard.manajemen_pengaduan.pengaduan', compact('complaints'));
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
            'email'                 => 'required|email|max:255',
            'phone_number'          => 'required|string|max:15',
            'complaint'             => ['required', 'string', 'max:5000', 'regex:/^[\pL\s.,!?-]+$/u'],
            'complaint_category_id' => 'required',
            'attachment'            => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048'
        ], [
            'name.regex' => 'Nama hanya boleh berisi huruf dan spasi.',
            'complaint.regex'  => 'Isi pengaduan hanya boleh berisi huruf dan tanda baca umum.'
        ]);

        if ($request->file('attachment')) {
            $validatedData['attachment'] = $request->file('attachment')->store('complaints/attachment');
        }

        $complaint = Complaint::create($validatedData);

        // Mail::to($validatedData['email'])->send(new ComplaintMail($complaint));

        Alert::success('Berhasil', 'Pengaduan anda berhasil terkirim. Mohon untuk menunggu respon dari kami.');

        return redirect()->back();
    }
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();

        Alert::success('Berhasil', 'Data pengaduan berhasil dihapus');
        return redirect()->route('manajemen-pengaduan.data-pengaduan');
    }

}

