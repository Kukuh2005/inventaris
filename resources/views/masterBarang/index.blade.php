@extends('layouts.app')

@section('title', 'Master Barang')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Master Barang</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Data Master Barang</h4>
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
                                <th scope="col" style="width: 30%">Nama</th>
                                <th scope="col">Spesifikasi Teknis</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($masterBarang as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->kode_barang}}</td>
                                <td>{{$item->nama_barang}}</td>
                                <td>{{$item->spesifikasi_teknis}}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#edit{{$item->encrypted_id}}">Edit</button>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$item->encrypted_id}}">Delete</button>
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
@include('masterBarang.delete')
@include('masterBarang.form')
@include('masterBarang.edit')
@endsection
