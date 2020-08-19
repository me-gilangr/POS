@extends('layouts.master')

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Data Barang</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('barang.update', $editbarang->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group">
                                        <label for="">Nama Barang</label>
                                        <input type="Txtnamabarang" name="Txtnamabarang" id="Txtnamabarang" class="form-control" value="{{ $editbarang->FN_BRG }}">
                                        {{-- untuk membuat ini ketik input:text.form-control --}}
                                    </div>
                                    </div>
                                    <div class="col-lg-8"></div>
                                    <div class="col-sm-12 col-md-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="">Satuan</label>
                                            <select name="txtsatuan" id="txtsatuan" class="form-control">
                                                <option value="">Pilih Bagian</option>
                                                @foreach ($databagian as $itemidbagian)
                                                    <option value="{{ $itemidbagian->FK_SATUAN }}" {{ $editbagian->FK_SATUAN == $itemidbagian->FK_Bagian ? 'selected':''  }}>{{ $itemidbagian->FN_Bagian}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-8"></div>
                                    <div class="col-sm-12 col-md-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="">Bagian</label>
                                            <select name="txtidbagian" id="txtidbagian" class="form-control">
                                                <option value="">Pilih Bagian</option>
                                                @foreach ($databagian as $itemidbagian)
                                                    <option value="{{ $itemidbagian->FK_JENIS }}" {{ $editsubbagian->FK_Bagian == $itemidbagian->FK_Bagian ? 'selected':''  }}>{{ $itemidbagian->FN_Bagian}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-8"></div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection