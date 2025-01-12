@extends('layouts.app')

@section('title', 'Pengadaan')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengadaan</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Data Pengadaan</h4>
                    <div class="card-header-form">
                        <button type="button" class="btn btn-success mb-2 float-right" data-toggle="modal"data-target="#form-tambah">Tambah</button>
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
                                    <button class="btn btn-sm btn-info d-block m-2" data-toggle="modal" data-target="#view{{$item->encrypted_id}}">View</button>
                                    <button class="btn btn-sm btn-warning d-block m-2" data-toggle="modal" data-target="#edit{{$item->encrypted_id}}">Edit</button>
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
@include('pengadaan.form')
@include('pengadaan.edit')
@include('pengadaan.view')

@push('script')
<script>
    function HitungNilai() {
        var harga = document.getElementById('harga').value || 0;
        var jumlah = document.getElementById('jumlah').value || 0;
        var nilai = harga * jumlah;
        document.getElementById('nilai').value = nilai;
    }
</script>
<script>
    function HitungNilaiEdit(id) {
        var harga = document.getElementById('harga' + id).value || 0;
        var jumlah = document.getElementById('jumlah' + id).value || 0;
        var nilai = harga * jumlah;
        document.getElementById('nilai' + id).value = nilai;
    }
</script>
@endpush
@endsection