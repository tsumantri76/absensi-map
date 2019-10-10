<?php

namespace App\Http\Controllers;

use App\Map;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class MapController extends Controller
{

    public function index()
    {
        return view('map.index', [
            'title' => 'List Map'
        ]);
    }

    public function create()
    {
        return view('map.create', [
            'title' => 'Tambah Map'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_tempat' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        $map = New Map;
        $map->latitude = $request->latitude;
        $map->longitude = $request->longitude;
        $map->nama_tempat = $request->nama_tempat;
        $map->save();

        return redirect()->route('admin.map.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $map = Role::find($id);

        return view('map.edit', [
            'title' => 'Edit Role',
            'map' => $map
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_tempat' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        $map = Map::find($id);
        $map->latitude = $request->latitude;
        $map->longitude = $request->longitude;
        $map->nama_tempat = $request->nama_tempat;
        $map->save();

        return redirect()->route('admin.map.index');
    }

    public function destroy($id)
    {
        $map = Map::find($id);
        $map->delete();

        return response()->json([
            'pesan' => ($map ? 'Data berhasil dihapus' : 'Data gagal dihapus'),
            'error' => ($map ? 0 : 1),
        ]);
    }

    public function allData(Request $request)
    {
        return Datatables::of(Map::query())
        ->addColumn('aksi', function ($map) {
            return '<a href="/admin/map/edit/' .$map->id. '" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a> '.
            '<a href="#" onclick="hapusData('.$map->id.')" class="btn-sm btn btn-danger" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>';
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }
}
