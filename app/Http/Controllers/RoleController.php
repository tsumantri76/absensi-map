<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('role.index', [
            'title' => 'List Role'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create', [
            'title' => 'Tambah Role'
        ]);
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
            'nama_role' => 'required|unique:roles|max:50',
            'keterangan' => 'required'
        ]);

        $role = New Role;
        $role->nama_role = $request->nama_role;
        $role->keterangan = $request->keterangan;
        $role->save();

        return redirect()->route('admin.role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);

        return view('role.edit', [
            'title' => 'Edit Role',
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:50',
            'keterangan' => 'required'
        ]);

        $role = Role::find($id);
        $role->nama_role = $request->nama;
        $role->keterangan = $request->keterangan;
        $role->save();

        return redirect()->route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return response()->json([
            'pesan' => ($role ? 'Data berhasil dihapus' : 'Data gagal dihapus'),
            'error' => ($role ? 0 : 1),
        ]);
    }

    public function allData(Request $request)
    {
        return Datatables::of(Role::query())
        ->addColumn('aksi', function ($role) {
            $edit = route('admin.role.edit', $role->id);

            return '<a href="' .$edit. '" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a> '.
            '<a href="#" onclick="hapusData('.$role->id.')" class="btn-sm btn btn-danger" title="Hapus" data-toggle="tooltip"><i class="fa fa-trash"></i></a>';
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }
}
