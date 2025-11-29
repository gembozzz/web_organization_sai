<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DonasiController extends Controller
{
    public function create()
    {
        return view('frontend.donasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nominal' => 'required|numeric|min:1000',
            'metode' => 'required|string|max:50',
            'keterangan' => 'nullable|string|max:255',
            'nama' => 'nullable|string|max:100',
            'no_tlp' => 'nullable|string|max:20',
            'email' => 'nullable|string|email|max:100',
        ]);

        $now = \Carbon\Carbon::now();

        // insert sesuai struktur tabel jurnal_kas
        $id = DB::table('jurnal_kas')->insertGetId([
            'tanggal' => $now->toDateString(),
            'nama' => $request->nama,           // <-- disimpan
            'no_tlp' => $request->no_tlp,       // <-- disimpan
            'email' => $request->email,         // <-- disimpan
            'keterangan' => $request->keterangan ?? 'Donasi',
            'petugas' => null,
            'jenis_transaksi_id' => 1, // sesuaikan jika perlu
            'nominal' => (int) $request->nominal,
            'metode' => strtoupper($request->metode),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // redirect ke thank you sambil bawa data opsional
        return redirect()->route('donasi.thankyou', [
            'id' => $id,
            'nama' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
        ]);
    }

    public function thankyou(Request $request)
    {
        $id = $request->query('id');
        $transaksi = DB::table('jurnal_kas')->where('id', $id)->first();

        if (! $transaksi) {
            return redirect()->route('donasi.create')->with('error', 'Transaksi tidak ditemukan.');
        }

        // ambil optional dari query string (jika ada)
        $nama = $request->query('nama') ?: null;
        $no_tlp = $request->query('no_tlp') ?: null;
        $email = $request->query('email') ?: null;
        $bank = $request->query('bank') ?: null;

        return view('frontend.donasi.thankyou', compact('transaksi', 'nama', 'no_tlp', 'email', 'bank'));
    }

    public function getdonatur()
    {
        $donatur = DB::table('jurnal_kas')
            ->select('nama', 'nominal', 'status')
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.donasi.data_donatur', compact('donatur'));
    }
}
