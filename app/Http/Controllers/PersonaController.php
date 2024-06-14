<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use Carbon\Carbon;
use DB;
class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index(Request $request)
    {
        //$personas = Persona::Paginate(5);
        //$personas = Persona::Paginate(5);
        $existe= Persona::where('dni', '=', 10545776)->first();
       // dd($existe);
        $buscar = $request->get('buscarpor');
        $tipo = $request->get('tipo');
        $personas = Persona::buscarpor($tipo,$buscar)->Paginate(10);

        return view ('persona.index',compact('personas'));
        //return view ('persona.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persona.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request->subdirectiva, $request->n_pago);

       //dd('Publicando evento publico');

       

        $persona = new Persona();

        $existe= Persona::where('dni', '=', $request->dni)->first();

        if ($existe == null) {
            if ($request->nombres && $request->apellidos&&$request->dni&&$request->num_cel&&$request->pago&&$request->subdirectiva&&$request->promocion!=null||"") {
                $persona->nombres = $request->nombres;
                $persona->apellidos = $request->apellidos;
                $persona->dni = $request->dni;
                $persona-> num_cel = $request-> num_cel;
                $persona-> tipo_pago = $request->tipo_pago;
                $persona-> pago = $request->pago;
                $persona-> n_pago = $request->n_pago;
                $persona-> subdirectiva = $request->subdirectiva;
                $persona-> promocion = $request->promocion;      
                $persona->save();
                return response()->json(["resp"=>200, 'mensaje'=>'Registrado Correctamente']);
            }else {
                return response()->json(["resp"=>250, 'mensaje'=>'Registro no realizado, verifique los campos que esten completos']);
            }
        }
        else {
            return response()->json(["resp"=>3000, 'mensaje'=>'ya existe persona registrada']);
        }


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
        $persona = Persona::findOrFail($id);
        return view ('persona.edit', compact('persona'));
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
        $persona = Persona::findOrFail($id);
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->dni = $request->dni;
        $persona->save();

        return response()->json(['mensaje'=>'Actualizado Correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function confirm($id)
    {
        $persona = Persona::findOrFail($id);
        return view('persona.confirm', compact('persona'));
    }

    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();
        return response()->json(['mensaje'=>'Eliminado Correctamente']);
    }
}
