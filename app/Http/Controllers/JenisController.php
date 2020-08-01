<?php

namespace App\Http\Controllers;

use App\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$jenis = Jenis::orderBy('FN_JENIS', 'ASC')->get();
			$jenis_terhapus = Jenis::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
			return view('jenis.index', compact('jenis', 'jenis_terhapus'));
		}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			return view('jenis.create');
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
				'FN_JENIS' => 'required|string',
			]);

			try {
        $no = Jenis::withTrashed()->where('FK_JENIS','like','J%')->get();
        if ( count($no) > 0) {
            $array = count($no) - 1;
            $data = $no[$array]->FK_JENIS;
            $hapus = (int) substr($data,1,2);
            $hapus++;
            $kodeJenis = 'J' . sprintf("%02s", $hapus);
        }else{
            $kodeJenis = 'J01';
        }

				$jenis = Jenis::firstOrCreate([
					'FK_JENIS' => $kodeJenis,
					'FN_JENIS' => $request->FN_JENIS,
				]);

				session()->flash('success', 'Data Jenis di-Tambahkan !');
				return redirect(route('jenis.index'));
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
			try {
				$edit = Jenis::where('FK_JENIS', '=', $id)->firstOrFail();
				return view('jenis.edit', compact('edit'));
			} catch (\Exception $e) {
				session()->flash('error', 'Terjadi Kesalahan !');
				return redirect()->back();
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
			$this->validate($request, [
				'FN_JENIS' => 'required|string'
			]);

			try {
				$jenis = Jenis::where('FK_JENIS', '=', $id)->firstOrFail();
				$jenis->update([
					'FN_JENIS' => $request->FN_JENIS
				]);

				session()->flash('success', 'Perubahan di-Simpan !');
				return redirect(route('jenis.index'));
			} catch (\Exception $e) {
				return redirect()->back('error', 'Terjadi Kesalahan !');
			}
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
				$jenis = Jenis::where('FK_JENIS', '=', $id)->firstOrFail();
				$jenis->delete();
				
				session()->flash('warning', 'Data di-Hapus !');
				return redirect(route('jenis.index'));
			} catch (\Exception $e) {
				dd($e);
				session()->flash('error', 'Terjadi Kesalahan !');
				return redirect()->back();
			}
		}

		public function restore(Request $request, $id)
		{
			try {
				$jenis = Jenis::onlyTrashed()->where('FK_JENIS', '=', $id)->firstOrFail();
				$jenis->restore();

				return redirect(route('jenis.index'));
			} catch (\Exception $e) {
				session()->flash('error', 'Terjadi Kesalahan !');
				return redirect()->back();
			}
		}

		public function permanent($id)
		{
			try {
				$jenis = Jenis::onlyTrashed()->where('FK_JENIS', '=', $id)->firstOrFail();
				$jenis->forceDelete();

				return redirect(route('jenis.index'));
			} catch (\Exception $e) {
				session()->flash('error', 'Terjadi Kesalahan !');
				return redirect()->back();
			}
		}
}
