@extends('layouts.app')

@section('title', 'Distributor')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Distributor</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Data Distributor</h4>
                    <div class="card-header-form">
                        <button type="button" class="btn btn-success mb-2 float-right" data-toggle="modal"data-target="#form-tambah">Tambah</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col" style="width: 20%">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">Email</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($distributor as $item)
                            <tr>
                                <td class="align-middle" scope="row">{{$loop->iteration}}</th>
                                <td class="align-middle">{{$item->nama_distributor}}</td>
                                <td class="align-middle">{{$item->alamat}}</td>
                                <td class="align-middle">{{$item->no_telp}}</td>
                                <td class="align-middle">{{$item->email}}</td>
                                <td class="align-middle">{{$item->keterangan}}</td>
                                <td class="align-middle">
                                    <div class="d-block">
                                        <button class="btn btn-sm btn-warning d-block m-2" data-toggle="modal"
                                        data-target="#edit{{$item->encrypted_id}}">Edit</button>
                                    <button type="button" class="btn btn-sm btn-danger d-block m-2" data-toggle="modal" data-target="#delete{{$item->encrypted_id}}">Delete</button>
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
@include('distributor.delete')
@include('distributor.form')
@include('distributor.edit')
@endsection