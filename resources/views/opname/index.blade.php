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
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col" style="width: 15%">Tanggal</th>
                                <th scope="col">Kode Pengadaan</th>
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
                                <td class="align-middle">{{$item->pengadaan->kode_pengadaan}}</td>
                                <td class="align-middle">{{$item->kondisi}}</td>
                                <td class="align-middle">{{$item->keterangan}}</td>
                                <td class="align-middle">
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
@include('opname.delete')
@include('opname.form')
@include('opname.edit')
@endsection