@extends('layouts.app')

@section('title', 'Satuan')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Satuan</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Data Satuan</h4>
                    <div class="card-header-form">
                        <button type="button" class="btn btn-success mb-2 float-right" data-toggle="modal"data-target="#form-tambah">Tambah</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($satuan as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->satuan}}</td>
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
@include('satuan.delete')
@include('satuan.form')
@include('satuan.edit')
@endsection