<?php

namespace adminFudea\Http\Controllers;

use Illuminate\Http\Request;
use adminFudea\Socios;
use Illuminate\Support\Facades\Redirect;
use adminFudea\Http\Requests\SocioFormRequest;
use DB;

class EjecutivoController extends Controller
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


            return view('ejecutivo.index',["socios"=>$socios,"searchText"=>$query,"carrera"=>$carrera,"modalidadpago"=>$modalidadpago]);

        }
    }

    public function create()
    {
        $query=trim('1');
//        $socios= ['socios'=> DB::table('socios')->get()];
        $modalidadpago= DB::table('modalidadpago')->orderBy('idModalidadPago','asc')->get();

        $carrera= DB::table('carrera')->orderBy('idCarrera','asc')->get();
        // $metodosPago=DB::table('modalidadPago')->where('Nombre','=',"Efectivo");
// <!-- 
//             <select>
//                 @foreach ($metodosPago as $met)
//                     <option>{{$met}}</option>
//                 @endforeach
//             </select> -->



        return view('ejecutivo.create',["modalidadpago"=>$modalidadpago,"carrera"=>$carrera]);
    }

    public function store(SocioFormRequest $request)
    {
        $socio = new Socios;
        $socio->idCarrera=$request->get('idCarrera');
        $socio->nombre=$request->get('nombre');
        $socio->apellidoPaterno=$request->get('apellidoPaterno');
        $socio->apellidoMaterno=$request->get('apellidoMaterno');
        $socio->idModalidadPago=$request->get('idModalidadPago');
        $socio->idUser=$request->get('idUser');
        $socio->egreso=$request->get('egreso');
        $socio->estadoSuscripcion=$request->get('estadoSuscripcion');
        $socio->run=$request->get('run');
        $socio->vencimientoSuscripcion=$request->get('vencimientoSuscripcion');
        $socio->save();

        return Redirect::to('ejecutivo');
    }

    public function show($idSocio)
    {
        return view("ejecutivo.show",["socio"=>Socios::findOrFail($idSocio)]);
    }

    public function edit($idSocio)
    {
        $modalidadpago= DB::table('modalidadpago')->get();
        $carrera= DB::table('carrera')->get();
        return view("ejecutivo.edit",["socio"=>Socios::findOrFail($idSocio),"modalidadpago"=>$modalidadpago,"carrera"=>$carrera]);    
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
        return Redirect::to("ejecutivo");
    }

    public function destroy($idSocio)
    {
        $socio=Socios::findOrFail($idSocio);
        DB::table('socios')->where('idSocio', '=', $idSocio)->delete();

        return Redirect::to('/ejecutivo');
    }

    public function actualizarEstado()
    {
        DB::statement('call actualizarEstado()');

        return Redirect::to('/ejecutivo');
    }
}