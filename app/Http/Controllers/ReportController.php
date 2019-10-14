<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Absensi;
use Carbon\Carbon;
use App\Map;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('report.index', [
            'title' => 'List Absensi'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        ->make(true);
    }
}
