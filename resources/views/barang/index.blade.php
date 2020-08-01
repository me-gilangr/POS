@extends('layouts.master')

@section('content')
<div class="col-12">
	<div class="card">
		<div class="card-header border-0">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="mb-0">
						<i class="ni ni-settings-gear-65 text-primary"></i> &ensp;
						Data Barang
					</h3>
				</div>
				<div class="col text-right">
					<div class="btn-group">
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#exampleModal">
							Tong Sampah
						</button>

						<a href="{{ route('barang.create') }}" class="btn btn-sm btn-primary">
							Tambah Data
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<!-- Projects table -->
			<table class="table align-items-center table-flush" id="table1">
				<thead class="thead-light">
					<tr>
						<th scope="col">Kode</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Jenis</th>
						<th scope="col" width="20%" class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($barang as $item)
						<tr>
							<td>{{ $item->FN_BRG }}</td>
                            <td>{{ $item->FN_BRG }}</td>
                            <td>{{ $item->FN_SATUAN }}</td>
                            <td>{{ $item->FN_JENIS }}</td>
							<td class="text-center">
								<div class="btn-group">
									<a href="{{ route('barang.edit', $item->FN_BRG) }}" class="btn btn-sm btn-warning">
										Edit Data
									</a>
									<a class="btn btn-sm btn-danger" href="#" onclick="event.preventDefault(); document.getElementById('delete{{ $loop->iteration }}').submit();" style="border-top-right-radius: 0.25rem; border-bottom-right-radius: 0.25rem;">Hapus Data</a>
									
									<form action="{{ route('barang.destroy', $item->FN_BRG) }}" method="post" id="delete{{ $loop->iteration }}" onsubmit="">
										@csrf
										@method('DELETE')
									</form>
								</div>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="5" class="text-center">
								Belum Ada Data Barang
							</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>		
</div>

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Jenis</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<div class="table-responsive">
					<table class="table align-items-center table-flush" id="table1">
						<thead class="thead-light">
							<tr>
								<th scope="col">Kode</th>
								<th scope="col">Nama Jenis</th>
								<th scope="col" width="20%" class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($jenis_terhapus as $item)
								<tr>
									<td>{{ $item->FK_JENIS }}</td>
									<td>{{ $item->FN_JENIS }}</td>
									<td class="text-center">
										<div class="btn-group">
											<a href="#" onclick="event.preventDefault(); document.getElementById('restore{{ $loop->iteration }}').submit();" class="btn btn-sm btn-warning">
												Pulihkan Data
											</a>
											<a class="btn btn-sm btn-danger" href="#" onclick="event.preventDefault(); document.getElementById('del{{ $loop->iteration }}').submit();" style="border-top-right-radius: 0.25rem; border-bottom-right-radius: 0.25rem;">Hapus Permanen</a>
											
											
											<form action="{{ route('jenis.restore', $item->FK_JENIS) }}" method="post" id="restore{{ $loop->iteration }}" onsubmit="">
												@csrf
												@method('PUT')
											</form>

											<form action="{{ route('jenis.permanent', $item->FK_JENIS) }}" method="post" id="del{{ $loop->iteration }}" onsubmit="">
												@csrf
												@method('DELETE')
											</form>
										</div>
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="3" class="text-center">
										Belum Ada Data Jenis
									</td>
								</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> --}}

@endsection

@section('script')
@endsection