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
						<th scope="col" width="20%" class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($jenis as $item)
						<tr>
							<td>{{ $item->FK_JENIS }}</td>
							<td>{{ $item->FN_JENIS }}</td>
							<td class="text-center">
								<div class="btn-group">
									<a href="{{ route('jenis.edit', $item->FK_JENIS) }}" class="btn btn-sm btn-warning">
										Edit Data
									</a>
									<a class="btn btn-sm btn-danger" href="#" onclick="event.preventDefault(); document.getElementById('delete{{ $loop->iteration }}').submit();" style="border-top-right-radius: 0.25rem; border-bottom-right-radius: 0.25rem;">Hapus Data</a>
									
									<form action="{{ route('jenis.destroy', $item->FK_JENIS) }}" method="post" id="delete{{ $loop->iteration }}" onsubmit="">
										@csrf
										@method('DELETE')
									</form>
								</div>
							</td>
						</tr>
					@empty
							
					@endforelse
				</tbody>
			</table>
		</div>
	</div>		
</div>

@endsection

@section('script')
@endsection