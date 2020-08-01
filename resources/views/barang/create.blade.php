@extends('layouts.master')	
@section('css')
<style>
.select2-container .select2-selection--single {
    height: 50px;
}
</style>
@endsection
@section('content')
<div class="col-12">
	<div class="card">
		<div class="card-header border-0">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="mb-0">
						<i class="ni ni-settings-gear-65 text-primary"></i> &ensp;
						Tambah Data Barang
					</h3>
				</div>
				<div class="col text-right">
					<a href="{{ route('barang.index') }}" class="btn btn-sm btn-danger">
						Kembali
					</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-8 col-lg-8">
					<form method="post" action="{{ route('barang.store')  }}" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="" class="form-control-label">Nama Barang : </label>
							<input type="text" name="FN_BRG" id="FN_BRG" class="form-control" placeholder="Masukan Nama Jenis..." value="{{ old('FN_JENIS') }}" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Satuan : </label>
                            <select name="FK_SATUAN" id="FK_SATUAN" class="form-control" >
                                <option value="">PILIH</option>
                                @foreach ($satuan as $item)
                                    <option value="{{ $item->FK_SATUAN }}">{{ $item->FN_SATUAN }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                                <label for="" class="form-control-label">Jenis : </label>
                                <select name="FK_JENIS" id="FK_JENIS" class="form-control" >
                                    <option value="">PILIH</option>
                                    @foreach ($jenis as $item)
                                        <option value="{{ $item->FK_JENIS }}">{{ $item->FN_JENIS }}</option>
                                    @endforeach
                                </select>
                            </div>
						<div class="form-group">
							<button type="submit" class="btn btn-success">
								Tambah Data
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
        $('#FK_SATUAN').select2();
        $('#FK_JENIS').select2();
	});
</script>
@endsection