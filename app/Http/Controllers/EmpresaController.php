<?php

namespace adminFudea\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('empresa.index');
    }


    public function buscarsocio(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $socio=DB::table('socios')
            ->select(DB::raw('estadoSuscripcion'))
            ->where('RUN','=',$query)
            ->get();
            return view('empresa.index',["searchText"=>$query,"socio"=>$socio]);
        }
    }
}
