<?php

namespace App\Http\Controllers\Anugrah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res_penjualan = DB::select('SELECT p.id_penjualan,p.tanggal,p.no_faktur,b.nama_alternatif,p.qty,p.satuan
        FROM tbl_penjualan p
        INNER JOIN tbl_barang b on b.id_alternatif=p.id_alternatif
        LIMIT 0,1000');
        $title = 'Penjualan';
        return view('master.list-penjualan', compact('title', 'res_penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res_barang = DB::select('select * from tbl_barang');
        return view('master.add-penjualan', compact('res_barang'));
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
            'tanggal' => 'required',
            'no_faktur' => 'required',
            'id_alternatif' => 'required',
            'qty' => 'required',
            'satuan' => 'required'
        ]);

        $resinsert = DB::insert('INSERT INTO tbl_penjualan (tanggal,no_faktur,id_alternatif,qty,satuan)
    VALUES ("' . $request->tanggal . '","' . $request->no_faktur . '","' . $request->id_alternatif . '","' . $request->qty . '","' . $request->satuan . '"); ');

        if ($resinsert) {
            return redirect()
                ->route('penjualan.list')
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
        $res_find = DB::select('select * from tbl_penjualan where id_penjualan=' . $id);
        $find = $res_find[0];
        $res_barang = DB::select('select * from tbl_barang');
        return view('master.show-penjualan', compact('find', 'res_barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res_find = DB::select('select * from tbl_penjualan where id_penjualan=' . $id);
        $find = $res_find[0];
        $res_barang = DB::select('select * from tbl_barang');
        return view('master.edit-penjualan', compact('find', 'res_barang'));
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
            'tanggal' => 'required',
            'no_faktur' => 'required',
            'id_alternatif' => 'required',
            'qty' => 'required',
            'satuan' => 'required'
        ]);

        $resupdate = DB::update('UPDATE tbl_penjualan
        SET tanggal="' . $request->tanggal . '",no_faktur="' . $request->no_faktur . '",id_alternatif="' . $request->id_alternatif . '",qty="' . $request->qty . '",satuan="' . $request->satuan . '" WHERE id_penjualan=' . $id . '; ');

        if ($resupdate) {
            return redirect()
                ->route('penjualan.list')
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
        $resdelete = DB::delete('DELETE FROM tbl_penjualan WHERE id_penjualan=' . $id . ';');

        if ($resdelete) {
            return redirect()
                ->route('penjualan.list')
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
