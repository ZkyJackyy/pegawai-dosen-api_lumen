<?php
namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;


class RsController extends Controller{
    public function index()
    {
        return response()->json(RumahSakit::all());
    }

    public function show($id)
    {
        $rs = RumahSakit::find($id);
        if (!$rs) return response()->json(['message' => 'Data tidak ditemukan'], 404);
        return response()->json($rs);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'type' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        ]);

        $rs = RumahSakit::create($request->all());
        return response()->json($rs, 201);
    }

    public function update(Request $request, $id)
    {
        $rs = RumahSakit::find($id);
        if (!$rs) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $rs->update($request->all());
        return response()->json($rs);
    }

    public function destroy($id)
    {
        $rs = RumahSakit::find($id);
        if (!$rs) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $rs->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }

}