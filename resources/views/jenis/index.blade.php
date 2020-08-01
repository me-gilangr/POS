@extends('layouts.master')

@section('content')
<div class="col-12">
	<div class="card">
		<div class="card-header border-0">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="mb-0">
						<i class="ni ni-settings-gear-65 text-primary"></i> &ensp;
						Data Jenis
					</h3>
				</div>
				<div class="col text-right">
					<a href="{{ route('jenis.create') }}" class="btn btn-sm btn-primary">
						Tambah Data
					</a>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<!-- Projects table -->
			<table class="table align-items-center table-flush" id="table1">
				<thead class="thead-light">
					<tr>
						<th scope="col">Kode</th>
						<th scope="col">Nama Jenis</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>#</td>
						<td>#</td>
						<td>#</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>		
</div>

@endsection

@section('script')
@endsection