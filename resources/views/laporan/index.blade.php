@extends('layouts.app')

@section('title', 'Laporan')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Data Laporan Pengadaan</h4>
                    <div class="card-header-form">
                        <button type="button" class="btn btn-danger mb-2 float-right" data-toggle="modal"data-target="#form-pdf">Print Bulanan</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Kode</th>
                                <th scope="col">No Invoice</th>
                                <th scope="col">Tanggal Pengadaan</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Distributor</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengadaan as $item)
                            <tr>
                                <td class="align-middle" scope="row">{{$loop->iteration}}</th>
                                <td class="align-middle">{{$item->kode_pengadaan}}</td>
                                <td class="align-middle">{{$item->no_invoice}}</td>
                                <td class="align-middle">{{$item->tgl_pengadaan}}</td>
                                <td class="align-middle">{{$item->masterBarang->nama_barang ?? 'Data Kososng'}}</td>
                                <td class="align-middle">{{$item->distributor->nama_distributor ?? 'Data Kososong'}}</td>
                                <td class="align-middle">
                                    <button class="btn btn-sm btn-info d-block mb-1" data-toggle="modal" data-target="#view{{$item->encrypted_id}}"><i class="fas fa-eye"></i></button>
                                    <a class="btn btn-sm btn-danger" href="/{{auth()->user()->role}}/laporan/{{$item->encrypted_id}}/pdf" target="_blank"><i class="fas fa-print"></i></a>
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
@include('laporan.view')
@include('laporan.pdf_form')
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

        window.open('/{{auth()->user()->role}}/laporan/' + tahun + '/' + bulan + '/print');
    }
</script>
@endpush