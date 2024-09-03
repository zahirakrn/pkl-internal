@extends('layouts.admin')
@section('styles')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
    	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Dashboard</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Admin</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary"><a href="{{route('barang.create')}}" class="text-white">Add Data</a></button>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">DataTable Barang</h6>
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
                                        <th>No</th>
										<th>Nama_Barang</th>
										<th>Jumlah</th>
										<th>Katerangan</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@php $i = 1;  @endphp
                                    @foreach ($barangs as $data )
										<tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$data->nama_barang}}</td>
                                            <td>{{$data->jumlah}}</td>		
											<td>{{$data->keterangan ? 'Barang Keluar' : 'Barang Masuk'}}</td>	
                                            <td>
                                                <form action="{{route('barang.destroy',$data->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{route('barang.edit',$data->id)}}" class="btn btn-grd-warning">
                                                        Edit
                                                </a>
												{{-- @if ($i == 2)
												<button class="btn btn-grd-danger" type="submit" disabled
													onclick="return confirm('Apakah anda yakin ingin menghapus data ini')">
													Delete
												</button>
											@else --}}
												{{-- <button class="btn btn-sm btn-danger" type="submit" 
												data-confirm-delete="true">
														Delete
												</button> --}}
												<a href="{{ route('barang.destroy', $data->id) }}" class="btn btn-grd-danger" data-confirm-delete="true">Delete</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
							</table>
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