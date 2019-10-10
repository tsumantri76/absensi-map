<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Pegawai;

class Select2Controller extends Controller
{
    public function roleSelect(Request $request)
    {
    	$search = $request->get('q');
    	$data['items'] = [];

    	if (! is_null($search)) {
    		$data['items'] = Role::where('nama_role', 'like', '%' .$search. '%')
    			->orWhere('keterangan', 'like', '%' .$search. '%')
    			->take(30)
    			->get();
    	}

    	$data['items'] = Role::take(30)->get();

    	return response()->json($data, 200);
    }

    public function pegawaiSelect()
    {
    	# code...
    }
}
