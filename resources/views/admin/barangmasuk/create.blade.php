@extends('layouts.admin')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Add Barang Masuk</h5>
            <form class="row g-3" method="POST" action="{{ route('barangmasuk.store') }}">
                @csrf
                {{-- <div class="col-md-4x">
                    <label for="input13" class="form-label">Barang Masuk Id</label>
                    <div class="position-relative input-icon">
                        <input type="number" name="barang_masuk_id" class="form-control @error('barang_masuk_id') is-invalid @enderror" id="input13" value="{{ old('barang_masuk_id') }}" placeholder="barang_masuk_id" required>
                        <span class="position-absolute top-50 translate-middle-y"><i class="material-icons-outlined fs-5">person_outline</i></span>
                        @error('barang_masuk_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                {{-- <div class="col-md-12">
                    <label for="input16" class="form-label">Barang_id</label>
                    <div class="position-relative input-icon">
                        <input type="number" name="barang_id" class="form-control @error('barang_id') is-invalid @enderror" value="{{ old('barang_id') }}" id="input16" placeholder="barang_id" required>
                        <span class="position-absolute top-50 translate-middle-y"><i class="material-icons-outlined fs-5">email</i></span>
                        @error('barang_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                <div class="mb-3">
                    <label for="" class="form-label">Barang Id</label>
                        <select name="id_barang" id=""
                        class="form-control @error('id_barang') is invalid @enderror">
                        @foreach ($barangs as $data )
                        <option value="{{$data->id}}">{{$data->nama_barang}}</option>
                        @endforeach
                        </select> 
                        @error('id_barang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 
                <div class="col-md-12">
                    <label for="input16" class="form-label">Tanggal Masuk</label>
                    <div class="position-relative input-icon">
                        <input type="date" name="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror" value="{{ old('tanggal_masuk') }}" id="input16" placeholder="tanggal_masuk" required>
                        <span class="position-absolute top-50 translate-middle-y"><i class="material-icons-outlined fs-5">email</i></span>
                        @error('tanggal_masuk')
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
                <div class="col-md-12">
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
                </div>
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-grd-primary px-4">Submit</a></button>
                        <button type="submit" class="btn btn-grd-primary px-4"><a href="{{route('barangmasuk.index')}}" class="text-white">Back</a></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection