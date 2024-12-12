<?php

namespace App\Livewire;

use App\Models\Produk;
use Livewire\Component;
use App\Models\LogNilai;
use App\Models\Penyedia;
use App\Models\Transaksi;
use App\Models\AspekKinerja;
use App\Models\ProdukPenyedia;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class DatabaseTransaksi extends Component
{
    public $tambah_transaksi = [
        'tanggal' => '',
        'penyedia_id' => '',
    ];
    public $daftar_transaksi;

    public $daftar_penyedia;
    public $daftar_produk_penyedia;

    public $produk_transaksi = [[
        'transaksi_id' => '',
        'produk_id' => '',
        'jumlah' => '',
        'total' => '',
    ]];
    public $daftar_produk;

    public $aspek_kinerja;
    public $log_nilai;

    public function mount()
    {
        $this->daftar_transaksi = Transaksi::with('penyedia')->get();
        $this->daftar_penyedia = Penyedia::getAll();
        $this->daftar_produk_penyedia = ProdukPenyedia::getAll();
        $this->aspek_kinerja = AspekKinerja::all()->map(function ($item) {
            return [
                'id' => $item->id,
                'aspek_kinerja' => $item->aspek_kinerja,
                'bobot' => $item->bobot,
                'nilai' => null, // Nilai default
            ];
        })->toArray();
    }

    public function export()
    {
        try {
            return Excel::download(new TransaksiExport, 'transaksi.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            Alert::success('Berhasil', 'Berhasil Mengekspor Transaksi');
            return redirect()->route('transaksi');
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return redirect()->route('transaksi');
        }
    }

    public function tambah_input_produk_transaksi()
    {
        $this->produk_transaksi[] = [
            'transaksi_id' => '',
            'produk_id' => '',
            'jumlah' => '',
            'total' => '',
        ];
    }

    public function nilaiTransaksi($id)
    {
        $nilai = 0;
        // Log Nilai
        foreach ($this->aspek_kinerja as $key => $aspek) {
            $nilai = $nilai + ($aspek['nilai'] * $aspek['bobot'] * 0.01);

            $log_nilai = [
                'transaksi_id' => $id,
                'aspek_kinerja_id' => $aspek['id'],
                'nilai_kinerja' => $aspek['nilai'],
            ];
            LogNilai::create($log_nilai);
        }
        // Perbarui Nilai pada Transaksi
        $transaksi = Transaksi::find($id);
        $transaksi->nilai = $nilai;
        $transaksi->update();

        Alert::success('Berhasil', 'Berhasil menilai transaksi!');

        // Redirect ke halaman detail penyedia
        return redirect()->route('transaksi');
    }

    public function render()
    {
        return view('livewire.transaksi')->layout('layouts.app');;
    }
}
