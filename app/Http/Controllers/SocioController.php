<?php

namespace adminFudea\Http\Controllers;

use Illuminate\Http\Request;

// use adminFudea\Socio;
use adminFudea\Socios;
use Auth;

use Illuminate\Support\Facades\Redirect;
use adminFudea\Http\Requests\SocioFormRequest;
use DB;


class SocioController extends Controller
{
    public function __construct()
    {
    	//Se utiliza para validar
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if($request)
    	{
    		$query=trim($request->get('searchText'));
    		$socios=DB::table('socios')->where('nombre','LIKE','%'.$query.'%')
            ->orWhere('apellidoPaterno','LIKE','%'.$query.'%')
            ->orWhere('apellidoMaterno','LIKE','%'.$query.'%')
            // ->where('estadoSuscripcion','=','1')
    		->orderBy('idSocio','desc')
    		->paginate(7);
            $modalidadpago= DB::table('modalidadpago')->orderBy('idModalidadPago','asc')->get();
            $carrera= DB::table('carrera')->orderBy('idCarrera','asc')->get();
    		return view('admin.socio.index',["socios"=>$socios,"searchText"=>$query,"carrera"=>$carrera,"modalidadpago"=>$modalidadpago]);
    	}
    }

    public function create()
    {
        $query=trim('1');
        $modalidadpago= DB::table('modalidadpago')->orderBy('idModalidadPago','asc')->get();
        $carrera= DB::table('carrera')->orderBy('idCarrera','asc')->get();
    	return view('admin.socio.create',["modalidadpago"=>$modalidadpago,"carrera"=>$carrera]);
    }

    public function store(SocioFormRequest $request)
    {
    	$socio = new Socios;

    	$socio->idCarrera=$request->get('idCarrera');
    	$socio->nombre=$request->get('nombre');
    	$socio->apellidoPaterno=$request->get('apellidoPaterno');
    	$socio->apellidoMaterno=$request->get('apellidoMaterno');
		$socio->idModalidadPago=$request->get('idModalidadPago');
		$socio->idUser=Auth::user()->id;
        $socio->Sexo=$request->get('sexo');
		$socio->egreso=$request->get('egreso');
		$socio->estadoSuscripcion=$request->get('estadoSuscripcion');
        $socio->run=$request->get('run');
		$socio->vencimientoSuscripcion=$request->get('vencimientoSuscripcion');
		$socio->save();

		return Redirect::to('admin/socio');
    }

    public function show($idSocio)
    {
    	return view("admin.socio.show",["socio"=>Socios::findOrFail($idSocio)]);
    }

    public function edit($idSocio)
    {
        $modalidadpago= DB::table('modalidadpago')->get();
        $carrera= DB::table('carrera')->get();
    	return view("admin.socio.edit",["socio"=>Socios::findOrFail($idSocio),"modalidadpago"=>$modalidadpago,"carrera"=>$carrera]);	
    }

    public function update(SocioFormRequest $request, $idSocio)
    {
    	$socio = Socios::findOrFail($idSocio);
    	$socio->idCarrera=$request->get('idCarrera');
    	$socio->nombre=$request->get('nombre');
    	$socio->apellidoPaterno=$request->get('apellidoPaterno');
    	$socio->apellidoMaterno=$request->get('apellidoMaterno');
		$socio->idModalidadPago=$request->get('idModalidadPago');
		$socio->idUser=$request->get('idUser');
		$socio->egreso=$request->get('egreso');
		$socio->estadoSuscripcion=$request->get('estadoSuscripcion');
		$socio->vencimientoSuscripcion=$request->get('vencimientoSuscripcion');
		$socio->update();
		return Redirect::to("admin/socio");
    }

    public function destroy($idSocio)
    {
    	$socio=Socios::findOrFail($idSocio);
    	DB::table('socios')->where('idSocio', '=', $idSocio)->delete();

     //    $socio->estadoSuscripcion='0';
    	// $socio->update(); 

    	return Redirect::to('admin/socio');
    }

    public function informes()
    {

            $carrera = DB::table('socios')
            -> join('carrera','socios.idCarrera','=','carrera.idCarrera')
            -> select(DB::raw('carrera.Nombre, count(*) as num') )
            -> groupBy(DB::raw('carrera.Nombre') )
            ->get();


            $total = DB::table('socios')
            -> select(DB::raw('COUNT(*) as num'))
            -> get();

            $estado = DB::table('socios')
            -> select(DB::raw('COUNT(*) as num'))
            -> where('estadoSuscripcion','=','1')
            -> get();

            $sexo = DB::table('socios')
            -> select(DB::raw('COUNT(*) as num'))
            -> where('sexo','=','0')
            -> get();

            return view('admin.socio.informes',["carrera"=>$carrera,"estado"=>$estado,"total"=>$total,"sexo"=>$sexo]);
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
            return view('admin.socio.buscarsocio',["searchText"=>$query,"socio"=>$socio]);

        }
    }
    public function actualizarEstado()
    {
        DB::statement('call actualizarEstado()');

        return Redirect::to('admin/socio/');
    }

    public function verUsuarios()
    {
        $socios=DB::table('users')
        ->orderBy('id','desc')
        ->paginate(7);
        return view('admin.usuarios.index',["socios"=>$socios]);
    }

    public function bloquearUsuario($id)
    {
        $estado = DB::table('users')
        ->where('id',$id)
        ->select('bloqueado')
        ->get();

        if($estado[0]->bloqueado==0)
        {
            $socios=DB::table('users')
            ->where('id',$id)
            ->update(['bloqueado'=> 1]);
            return Redirect::to('/admin/usuarios');      
        }
        else
        {
            $socios=DB::table('users')
            ->where('id',$id)
            ->update(['bloqueado'=> 0]);
            return Redirect::to('/admin/usuarios'); 
        }

    }

}
