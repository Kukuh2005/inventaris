@extends('layouts.app')

@section('title', 'Mutasi Lokasi')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Mutasi Lokasi</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Data Mutasi Lokasi</h4>
                    <div class="card-header-form">
                        <button type="button" class="btn btn-success mb-2 float-right" data-toggle="modal" data-target="#form-tambah">Tambah</button>
                        <button type="button" class="btn btn-danger mb-2 float-right mr-1" data-toggle="modal"data-target="#form-mutasi">Print Bulanan</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Tanggal Mutasi</th>
                                <th scope="col">Barang</th>
                                <th scope="col">jumlah</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Flag Lokasi</th>
                                <th scope="col">Flag Pindah</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mutasi_lokasi as $item)
                            <tr>
                                <td class="align-middle" scope="row">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $item->tgl_mutasi }}</td>
                                <td class="align-middle">{{$item->pengadaan->kode_pengadaan ?? 'Tidak Ditemukan'}} <br> {{ $item->pengadaan->masterBarang->nama_barang ?? 'Tidak Ditemukan' }}</td>
                                <td class="align-middle">{{ $item->jumlah }}</td>
                                <td class="align-middle">{{ $item->lokasi->nama_lokasi ?? 'Tidak Ditemukan' }}</td>
                                <td class="align-middle">{{ $item->flag_lokasi }}</td>
                                <td class="align-middle">{{ $item->flag_pindah }}</td>
                                <td class="align-middle">
                                    <div class="d-block">
                                        <button class="btn btn-sm btn-warning d-block mb-1" data-toggle="modal"
                                            data-target="#edit{{$item->encrypted_id}}">Edit</button>
                                        <a class="btn btn-sm btn-danger d-block" href="/{{auth()->user()->role}}/mutasi-lokasi/{{$item->encrypted_id}}/pdf" target="_blank">Print</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@include('mutasiLokasi.form')
@include('mutasiLokasi.edit')
@include('mutasiLokasi.formPrint')
@endsection

@push('script')
<script>
    function printBulanan(){
        var tahun = document.getElementById('tahun').value;  
        var bulan = document.getElementById('bulan').value;  
        
        if (!tahun || !bulan) {
            alert("Silakan pilih barang terlebih dahulu!");
            return;
        }

        window.open('/{{auth()->user()->role}}/mutasi-lokasi/' + tahun + '/' + bulan + '/print');
    }
</script>
@endpush