@extends('layouts.app')

@section('title', 'Opname')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Opname</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Data Opname</h4>
                    <div class="card-header-form">
                        <button type="button" class="btn btn-success mb-2 float-right" data-toggle="modal"data-target="#form-tambah">Tambah</button>
                        <button type="button" class="btn btn-danger mb-2 float-right mr-1" data-toggle="modal"data-target="#form-opname">Print Bulanan</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col" style="width: 15%">Tanggal</th>
                                <th scope="col">Barang</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Kondisi</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($opname as $item)
                            <tr>
                                <td class="align-middle" scope="row">{{$loop->iteration}}</th>
                                <td class="align-middle">{{$item->tgl_opname}}</td>
                                <td class="align-middle">{{$item->pengadaan->masterBarang->nama_barang}}</td>
                                <td class="align-middle">{{$item->jumlah}}</td>
                                <td class="align-middle">{{$item->kondisi}}</td>
                                <td class="align-middle">{{$item->keterangan}}</td>
                                <td class="align-middle">
                                    <button class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#edit{{$item->encrypted_id}}">Edit</button>
                                    <a class="btn btn-sm btn-danger" href="/{{auth()->user()->role}}/opname/{{$item->encrypted_id}}/pdf" target="_blank">Print</a>
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
@include('opname.form')
@include('opname.edit')
@include('opname.formPrint')
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

        window.open('/{{auth()->user()->role}}/opname/' + tahun + '/' + bulan + '/print');
    }
</script>
@endpush