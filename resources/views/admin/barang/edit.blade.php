@extends('layouts.admin')
@section('styles')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection

@section('content')

 <div class="col-11 col-xl-11">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit Barang <b>{{$barangs->name}}</b></h5>
            <form class="row g-3" method="POST" action="{{ route('barang.update', $barangs->id) }}">
                @method('put')
                @csrf
                <div class="col-md-4x">
                    <label for="" class="form-label">Nama_Barang</label>
                    <div class="position-relative input-icon">
                        <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" id="input13" value="{{ old('nama_barang') }}" placeholder="nama_barang" required>
                        <span class="position-absolute top-50 translate-middle-y"><i class="material-icons-outlined fs-5">person_outline</i></span>
                        @error('nama_barang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="input16" class="form-label">Tanggal</label>
                        <div class="position-relative input-icon">
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}" id="input16" placeholder="tanggal" required>
                            <span class="position-absolute top-50 translate-middle-y"><i class="material-icons-outlined fs-5">email</i></span>
                            @error('tanggal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                {{-- <div class="col-md-12">
                    <label for="input17" class="form-label">Confirm Password</label>
                    <div class="position-relative input-icon">
                        <input type="password" name="password_confirmation" class="form-control" id="input17" placeholder="Password">
                        <span class="position-absolute top-50 translate-middle-y"><i class="material-icons-outlined fs-5">lock_open</i></span>
                    </div>
                </div> --}}
                {{-- <div class="col-md-12">
                    <label for="input19" class="form-label">Keterangan</label>
                    <select id="input19" name="isAdmin" class="form-select">
                        <option selected="">Choose...</option>
                        <option value="0">Barang Masuk</option>
                        <option value="1">Barang Keluar</option>
                    </select>
                </div> --}}
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-grd-primary px-4" class="text-white">Submit</button>
                        <button type="submit" class="btn btn-grd-primary px-4"><a href="{{route('barang.index')}}" class="text-white">Kembali</a></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
@endpush