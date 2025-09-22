<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ServiceRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'description' => 'required|string',
            'document' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $documentPath = null;
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('documents', 'public');
        }

        ServiceRequest::create([
            'service_category_id' => $request->service_category_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'document' => $documentPath,
        ]);

        Alert::success('Berhasil', 'Pengajuan layanan berhasil dikirim. Mohon untuk menunggu respon dari kami.');

        return redirect()->route('layanan.informasi')
            ->with('success', 'Permohonan layanan berhasil dikirim!');
    }

}
