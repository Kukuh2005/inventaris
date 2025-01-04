@extends('layouts.app')

@section('title', 'Subkategori Asset')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Subkategori Asset</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Data Subkategori Asset</h4>
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
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori Asset</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subkategoriAsset as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->kode_sub_kategori_asset}}</td>
                                <td>{{$item->sub_kategori_asset}}</td>
                                <td>{{$item->KategoriAsset->kategori_asset}}</td>
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
@include('subkategoriAsset.delete')
@include('subkategoriAsset.form')
@include('subkategoriAsset.edit')
@endsection