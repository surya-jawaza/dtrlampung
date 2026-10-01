<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pengurus;
use App\Models\Donatur;
use App\Models\Kegiatan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // =========================
        // JUMLAH DATA
        // =========================
        $jumlahAnggota = Anggota::count();
        $jumlahPengurus = Pengurus::count();
        $jumlahDonatur = Donatur::count();
        $jumlahKegiatan = Kegiatan::count();

        // =========================
        // DATA ANGGOTA BERDASARKAN TRAINING
        // =========================
        $anggotaTraining = Anggota::selectRaw('jenjang_training, COUNT(*) as jumlah')
            ->groupBy('jenjang_training')
            ->orderBy('jenjang_training')
            ->get();

        // =========================
        // PENAMBAHAN ANGGOTA PER BULAN
        // TAHUN BERJALAN
        // =========================
        $tahunSekarang = Carbon::now()->year;

        // Dikelompokkan di PHP agar jalan di MySQL maupun SQLite
        $anggotaPerBulan = Anggota::whereYear('created_at', $tahunSekarang)
            ->pluck('created_at')
            ->countBy(fn ($tanggal) => $tanggal->month);

        $namaBulan = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'Mei',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Agu',
            9 => 'Sep',
            10 => 'Okt',
            11 => 'Nov',
            12 => 'Des',
        ];

        $penambahanAnggota = [];

        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $jumlahBaru = $anggotaPerBulan->get($bulan, 0);

            $penambahanAnggota[] = [
                'bulan' => $namaBulan[$bulan],
                'jumlah' => $jumlahBaru,
            ];
        }

        // =========================
        // DATA TERBARU
        // =========================
        $anggotaTerbaru = Anggota::latest()->take(5)->get();
        $kegiatanTerbaru = Kegiatan::latest()->take(3)->get();

        return view('dashboard', compact(
            'jumlahAnggota',
            'jumlahPengurus',
            'jumlahDonatur',
            'jumlahKegiatan',
            'anggotaTraining',
            'penambahanAnggota',
            'anggotaTerbaru',
            'kegiatanTerbaru'
        ));
    }
}