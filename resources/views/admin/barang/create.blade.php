@extends('layouts.admin')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Add Barang</h5>
            <form class="row g-3" method="POST" action="{{ route('barang.store') }}">
                @csrf
                <div class="col-md-4x">
                    <label for="input13" class="form-label">Nama Barang</label>
                    <div class="position-relative input-icon">
                        <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" id="input13" value="{{ old('nama_barang') }}" placeholder="nama_barang" required>
                        <span class="position-absolute top-50 translate-middle-y"><i class="material-icons-outlined fs-5">person_outline</i></span>
                        @error('nama_barang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="input16" class="form-label">Jumlah</label>
                    <div class="position-relative input-icon">
                        <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}" id="input16" placeholder="jumlah" required>
                        <span class="position-absolute top-50 translate-middle-y"><i class="material-icons-outlined fs-5">email</i></span>
                        @error('jumlah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- <div class="col-md-12">
                    <label for="input16" class="form-label">Keterangan</label>
                    <div class="position-relative input-icon">
                        <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}" id="input16" placeholder="keterangan" required>
                        <span class="position-absolute top-50 translate-middle-y"><i class="material-icons-outlined fs-5">email</i></span>
                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                <div class="col-md-12">
                    <label for="input19" class="form-label">Keterangan</label>
                    <select id="input19" name="keterangan" class="form-select">
                        <option selected="">Choose...</option>
                        <option value="0">Barang Masuk</option>
                        <option value="1">Barang Keluar</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-grd-primary px-4">Submit</button>
                        <button type="submit" class="btn btn-grd-primary px-4"><a href="{{route('barang.index')}}" class="text-white">Back</a></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection