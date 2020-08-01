<?php

namespace App\Http\Controllers;

use App\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuan = Satuan::orderBy('FK_SATUAN')->get();
        return view('satuan.index', compact('satuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('satuan.create');
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
            'FN_SATUAN' => 'required|string',
        ]);

        try {
    $no = Satuan::withTrashed()->where('FK_SATUAN','like','S%')->get();
    if ( count($no) > 0) {
        $array = count($no) - 1;
        $data = $no[$array]->FK_SATUAN;
        $hapus = (int) substr($data,1,2);
        $hapus++;
        $kodeSatuan = 'S' . sprintf("%02s", $hapus);
    }else{
        $kodeSatuan = 'S01';
    }

            $satuan = Satuan::firstOrCreate([
                'FK_SATUAN' => $kodeSatuan,
                'FN_SATUAN' => $request->FN_SATUAN,
            ]);

            session()->flash('success', 'Data Satuan di-Tambahkan !');
            return redirect(route('satuan.index'));
        } catch (\Exception $e) {
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
    public function edit($id)
    {
        //
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
        //
    }
}
