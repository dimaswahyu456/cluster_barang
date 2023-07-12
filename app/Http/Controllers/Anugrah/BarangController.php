<?php

namespace App\Http\Controllers\Anugrah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res_barang = DB::select('select * from tbl_barang');
        $title = 'Barang';
        return view('master.list-barang', compact('title', 'res_barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.add-barang');
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
            'kode_alternatif' => 'required',
            'nama_alternatif' => 'required',
            'stock' => 'required',
            'satuan' => 'required'
        ]);

        $resinsert = DB::insert('INSERT INTO tbl_barang (kode_alternatif,nama_alternatif,stock,satuan)
        VALUES ("' . $request->kode_alternatif . '","' . $request->nama_alternatif . '","' . $request->stock . '","' . $request->satuan . '"); ');

        if ($resinsert) {
            return redirect()
                ->route('barang.list')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
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
        $res_find = DB::select('select * from tbl_barang where id_alternatif=' . $id);
        $find = $res_find[0];
        return view('master.show-barang', compact('find'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res_find = DB::select('select * from tbl_barang where id_alternatif=' . $id);
        $find = $res_find[0];
        return view('master.edit-barang', compact('find'));
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
            'kode_alternatif' => 'required',
            'nama_alternatif' => 'required',
            'stock' => 'required',
            'satuan' => 'required'
        ]);

        $resupdate = DB::update('UPDATE tbl_barang
        SET kode_alternatif="' . $request->kode_alternatif . '",nama_alternatif="' . $request->nama_alternatif . '",stock="' . $request->stock . '",satuan="' . $request->satuan . '" WHERE kd_propinsi=' . $id . '; ');

        if ($resupdate) {
            return redirect()
                ->route('barang.list')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
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
        $resdelete = DB::delete('DELETE FROM tbl_barang WHERE id_alternatif=' . $id . ';');

        if ($resdelete) {
            return redirect()
                ->route('barang.list')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
}
