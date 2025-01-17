<x-slot name="breadcrumb">
    <div class="row pagetitle">
        <h1>Nilai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('transaksi') }}">Transaksi</a></li>
                <li class="breadcrumb-item active">Nilai</li>
            </ol>
        </nav>
    </div>
</x-slot>
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mx-md-4">
                        <div class="col-12 mt-3 mb-4">
                            <h5 class="card-title text-center">PENILAIAN KINERJA PENYEDIA BARANG / JASA BPS PROVINSI
                                SUMATERA BARAT</h5>
                        </div>
                        <div class="mb-3">
                            <span class="text-muted pt-1 fw-bold">Deskripsi Penyedia</span>
                        </div>
                        <div class="col-12">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Paket Pengadaan</label>
                                <div class="col-md-8 col-sm-12">
                                    <input value="{{ $transaksi->uraian_pekerjaan }}" type="text"
                                        class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                <div class="col-sm-8">
                                    <input value="{{ $transaksi->penyedia->nama }}" type="text" class="form-control"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Alamat Perusahaan</label>
                                <div class="col-sm-8">
                                    <input value="{{ $transaksi->penyedia->alamat }}" type="text"
                                        class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nilai Kontrak</label>
                                <div class="col-sm-8">
                                    <input value="{{ $transaksi->nilai_kontrak }}" type="text" class="form-control"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row mb-5">
                                <label for="inputText" class="col-sm-2 col-form-label">Waktu Pelaksanaan</label>
                                <div class="col-sm-8">
                                    <input value="{{ $transaksi->tanggal }}" type="date" class="form-control"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <span class="text-muted pt-1 fw-bold">Nilai</span>
                        </div>
                        @include('components.form-nilai')

                        <!-- Total -->
                        <div wire:poll.1s class="mt-4 mb-4 mx-5rem p-4 border rounded bg-gray-50">
                            <p class="font-bold">Total Nilai Kinerja: {{ $nilai_akhir }}</p>
                            <p class="font-bold">Predikat: {{ $predikat }}</p>
                        </div>
                    </div>
                    <div class="col-12 mx-4">
                        <button class="btn btn-primary" wire:click="save">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
