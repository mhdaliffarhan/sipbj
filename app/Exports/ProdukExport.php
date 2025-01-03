<?php

namespace App\Exports;

use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProdukExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $produk = Produk::all();
        $data = [];
        foreach ($produk as $item) {
            $data[] = [
                'Kode Produk' => $item->kode,
                'Nama Produk' => $item->nama,
                'Satuan' => $item->satuan,
            ];
        }
        return collect($data);
    }

    public function headings(): array
    {
        return [
            'Kode Produk',
            'Nama Produk',
            'Satuan',
        ];
    }
}
