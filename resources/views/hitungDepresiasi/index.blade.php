@extends('layouts.app')

@section('title', 'Hitung Depresiasi')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Hitung Depresiasi {{$tahun}}</h1>
        </div>

        <div class="section-body">            
            <div class="card">
                <div class="card-header">
                    <h4>
                        <select class="form-control" name="bulan" id="" onchange="window.location.href='/{{ auth()->user()->role }}/hitung-depresiasi/' + this.value">
                            <option value="0" {{$bulan == '0' ? 'selected' : ''}}>Semua Data</option>
                            <option value="1" {{$bulan == '1' ? 'selected' : ''}}>Januari</option>
                            <option value="2" {{$bulan == '2' ? 'selected' : ''}}>Februari</option>
                            <option value="3" {{$bulan == '3' ? 'selected' : ''}}>Maret</option>
                            <option value="4" {{$bulan == '4' ? 'selected' : ''}}>April</option>
                            <option value="5" {{$bulan == '5' ? 'selected' : ''}}>Mei</option>
                            <option value="6" {{$bulan == '6' ? 'selected' : ''}}>Juni</option>
                            <option value="7" {{$bulan == '7' ? 'selected' : ''}}>Juli</option>
                            <option value="8" {{$bulan == '8' ? 'selected' : ''}}>Agustus</option>
                            <option value="9" {{$bulan == '9' ? 'selected' : ''}}>September</option>
                            <option value="10" {{$bulan == '10' ? 'selected' : ''}}>Oktober</option>
                            <option value="11" {{$bulan == '11' ? 'selected' : ''}}>November</option>
                            <option value="12" {{$bulan == '12' ? 'selected' : ''}}>Desember</option>
                        </select>        
                    </h4>
                    
                    <div class="card-header-form">
                        <button type="button" class="btn btn-success d-inline float-right" data-toggle="modal" data-target="#form-tambah">Hitung Depresiasi</button>
                        <button type="button" class="btn btn-primary d-inline float-right mr-1" data-toggle="modal" data-target="#hitung-keseluruhan">Hitung Keseluruhan</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Barang</th>
                                <th scope="col">Durasi</th>
                                <th scope="col">Nilai Barang</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hitungDepresiasi as $item)
                            <tr>
                                <td class="align-middle" scope="row">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $item->tgl_hitung_depresiasi }}</td>
                                <td class="align-middle">{{$item->pengadaan->kode_pengadaan}} <br> {{ $item->pengadaan->masterBarang->nama_barang ?? 'Tidak Ditemukan' }}</td>
                                <td class="align-middle">{{ $item->durasi }} Bulan</td>
                                <td class="align-middle">{{ number_format($item->nilai_barang, 0, ',', '.') }}</td>
                                <td class="align-middle">
                                    <div class="d-block">
                                        <button class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#edit{{$item->encrypted_id}}">Edit</button>                                        
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
@include('hitungDepresiasi.form')
@include('hitungDepresiasi.edit')
@include('hitungDepresiasi.formHitungKeseluruhan')
@endsection