<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Absensi;
use Carbon\Carbon;
use App\Map;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AbsensiController extends Controller
{
    public function index()
    {
        return view('absensi.index', [
            'title' => 'List Absensi'
        ]);
    }

    public function create()
    {
        $map = Map::all();

        return view('absensi.create', [
            'title' => 'Absen Masuk',
            'map' => $map
        ]);
    }

    public function store(Request $request)
    {
        $map = Map::find($request->map_id);

        $hitung = 6371 * acos( 
                cos(deg2rad($request->latitude)) 
              * cos(deg2rad($map->latitude)) 
              * cos(deg2rad($request->longitude)-deg2rad($map->longitude)) 
              + sin(deg2rad($request->latitude)) 
              * sin(deg2rad($map->latitude)));

        $jarak = $hitung * 1000;
        if(abs($jarak) > 300) {
            return redirect()->back();
        }

        $absensi = New Absensi;
        $absensi->user_id = Auth::user()->id;
        $absensi->map_id = $request->map_id;
        $absensi->jam_masuk = Carbon::now('Asia/Jakarta');
        $absensi->latitude_masuk = $request->latitude;
        $absensi->longitude_masuk = $request->longitude;
        $absensi->jarak_masuk = $jarak;
        $absensi->save();

        return redirect()->route('admin.absen.index');
    }

    public function show(Absensi $absensi)
    {
        //
    }

    public function edit($id)
    {
        $absensi = Absensi::find($id);
        $map = Map::all();

        return view('absensi.edit', [
            'title' => 'Absen Keluar',
            'absen' => $absensi,
            'map' => $map
        ]);
    }

    public function update(Request $request, $id)
    {
        $map = Map::find($request->map_id);

        $hitung = 6371 * acos( 
                cos(deg2rad($request->latitude)) 
              * cos(deg2rad($map->latitude)) 
              * cos(deg2rad($request->longitude)-deg2rad($map->longitude)) 
              + sin(deg2rad($request->latitude)) 
              * sin(deg2rad($map->latitude)));

        $jarak = $hitung * 1000;
        if(abs($jarak) > 300) {
            return redirect()->back();
        }

        $absensi = Absensi::find($id);
        $absensi->user_id = Auth::user()->id;
        $absensi->map_id = $request->map_id;
        $absensi->jam_keluar = Carbon::now('Asia/Jakarta');
        $absensi->latitude_keluar = $request->latitude;
        $absensi->longitude_keluar = $request->longitude;
        $absensi->jarak_keluar = $jarak;
        $absensi->save();

        return redirect()->route('admin.absen.index');
    }

    public function destroy($id)
    {
        //
    }

    public function allData(Request $request)
    {
        if (Auth::user()->roles()->first()->nama_role == 'administrator') {
            $query = DB::table('absensis')
                ->join('users', 'users.id', '=', 'absensis.user_id')
                ->select('absensis.id', 'absensis.jam_masuk', 'absensis.jam_keluar', 'absensis.keterangan',
                'users.name')
                ->orderBy('absensis.id', 'desc')
                ->get();
        } else {
            $query = DB::table('absensis')->where('user_id', Auth::user()->id)
                ->join('users', 'users.id', '=', 'absensis.user_id')
                ->select('absensis.id', 'absensis.jam_masuk', 'absensis.jam_keluar', 'absensis.keterangan',
                'users.name')
                ->orderBy('absensis.id', 'desc')
                ->get();
        }

        return Datatables::of($query)
        ->addColumn('aksi', function ($absensi) {
            $route = route('admin.absen.edit', $absensi->id);
            
            if ($absensi->jam_keluar == '') {
                return '<a href="'.$route.'" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Absen Keluar"><i class="fa fa-sign-out"></i>Keluar</a>';
            }
           
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }
}
