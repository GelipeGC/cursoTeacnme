<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Entities\State;
use App\Entities\Municipio;
class EstadosController extends Controller
{
    public function index()
    {
    	$states = State::lists('name','id');
    	return view('estados.index', compact('states'));
    }

    public function getMunicipios(Request $request, $id)
    {
    	if($request->ajax()){
    		$municipios = Municipio::municipios($id);
    		return response()->json($municipios);
    	}
    }

}
