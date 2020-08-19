<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Jenis;
use App\Satuan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::orderBy('FN_BRG')->get();
        //dd($barang);
        // Oh Jadi si data jenis nya terhapus sedangkan si data jenis nya terkait sama data barang yang ada
        $barang_terhapus = Barang::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
        return view('barang.index', compact('barang','barang_terhapus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $satuan = Satuan::orderBy('FK_SATUAN')->get();
        $jenis = Jenis::orderBy('FK_JENIS')->get();
        return view('barang.create', compact('satuan','jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'FN_BRG' => 'required|string',
            'FK_SATUAN' => 'required|string',
            'FK_JENIS' => 'required|string',
        ]);

        try {
    $no = Barang::withTrashed()->where('FK_BRG','like','BRG%')->get();
    if ( count($no) > 0) {
        $array = count($no) - 1;
        $data = $no[$array]->FK_BRG;
        $hapus = (int) substr($data,3,4);
        $hapus++;
        $kodebarang = 'BRG' . sprintf("%04s", $hapus);
    }else{
        $kodebarang = 'BRG0001';
    }

            $satuan = Barang::firstOrCreate([
                'FK_BRG' => $kodebarang,
                'FN_BRG' => $request->FN_BRG,
                'FK_SATUAN' => $request->FK_SATUAN,
                'FK_JENIS' => $request->FK_JENIS,
            ]);

            session()->flash('success', 'Data Barang di-Tambahkan !');
            return redirect(route('barang.index'));
        } catch (\Exception $e) {
            dd($e);
            session()->flash('error', 'Terjadi Kesalahan !');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($FK_JENIS)
    {
        try {
            $editjenis = Jenis::where('FK_JENIS','=',$FK_JENIS)->firstOrFail();
            $databarang = Barang::get();
            return view('Jenis.edit',compact('editjenis', 'databarang'));
        } catch (\Exception $th) {
            return redirect(route('Jenis.index'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $barang = Barang::where('FK_BRG', '=', $id)->firstOrFail();
            $barang->delete();
            
            session()->flash('warning', 'Data di-Hapus !');
            return redirect(route('barang.index'));
        } catch (\Exception $e) {
            dd($e);
            session()->flash('error', 'Terjadi Kesalahan !');
            return redirect()->back();
        }
    }
}
