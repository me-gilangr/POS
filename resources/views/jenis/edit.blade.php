@extends('layouts.master')	

@section('content')
<div class="col-12">
	<div class="card">
		<div class="card-header border-0">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="mb-0">
						<i class="ni ni-settings-gear-65 text-primary"></i> &ensp;
						Edit Data Jenis
					</h3>
				</div>
				<div class="col text-right">
					<a href="{{ route('jenis.index') }}" class="btn btn-sm btn-danger">
						Kembali
					</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-8 col-lg-8">
					<form method="post" action="{{ route('jenis.update', $edit->FK_JENIS)  }}" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="" class="form-control-label">Nama Jenis : </label>
							<input type="text" name="FN_JENIS" id="FN_JENIS" class="form-control" placeholder="Masukan Nama Jenis..." value="{{ $edit->FN_JENIS }}" autofocus required>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success">
								Simpan Perubahan
							</button>
							<button type="reset" class="btn btn-danger">
								Reset Input
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
	$(document).ready(function() {
		$('#FN_JENIS').focus();
	});
</script>
@endsection