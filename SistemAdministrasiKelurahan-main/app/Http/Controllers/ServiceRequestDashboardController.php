<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ServiceRequest;
use App\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceRequestDashboardController extends Controller
{
    // Tampilkan semua pengajuan layanan
    public function index()
    {
        $services = ServiceRequest::with('category')->latest()->paginate(10);
        return view('dashboard.manajemen_layanan.layanan', compact('services')); // <-- blade baru
    }

    // Tampilkan detail pengajuan
    public function show(ServiceRequest $service)
    {
        return view('dashboard.manajemen_layanan.layanan-show', compact('service')); // <-- blade baru
    }

    // Hapus pengajuan layanan
    public function destroy(ServiceRequest $service)
    {
        if ($service->document) {
            Storage::delete($service->document);
        }

        $service->delete();
        Alert::success('Berhasil', 'Pengajuan layanan berhasil dihapus');
        return redirect()->route('manajemen-layanan.index');
    }
}
