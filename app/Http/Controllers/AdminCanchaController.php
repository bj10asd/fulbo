<?php

namespace App\Http\Controllers;

use App\Cancha;
use App\Task;
use DataTables;

use Illuminate\Http\Request;

class AdminCanchaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        
        if ($request->ajax()) {
            //dd($id);
            $data = Cancha::select('canchas.id','canchas.nombre_del_predio','canchas.detalles_de_canchas','canchas.user_id','canchas.imagen')
                ->join('users','users.id','=','canchas.user_id')
                ->where('canchas.user_id','=',$id)
                ->get();
            //$var = $data[0]->nombre_del_predio;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="editbtn btn-primary btn-sm editProduct">Vista Previa</a>';
                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Delete"class="deletebtn btn-danger btn-sm deleteProduct">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
       /* $var = Cancha::select('canchas.id','canchas.nombre_del_predio','canchas.detalles_de_canchas','canchas.user_id','canchas.imagen')
                ->join('users','users.id','=','canchas.user_id')
                ->where('canchas.user_id','=',$id)
                ->get();*/
        //$ver = Cancha::select('canchas.id')->from('canchas')->where('')
        //return view('administrarmicancha')->with('var',$var[0]->nombre_del_predio)->with('id',$var[0]->id);
        //return view('administrarmicancha')->with('var',$var[0]->nombre_del_predio)->with('ver',$var[0]->imagen);
        return view("administrarmicancha");
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //dd($id); //SI LLEGA BIEN EL ID = 2; 
        //return redirect()->route('administrarmicancha.create',[$id]);
        //return view('administrarmicancha.create',$id)->with('id',$id);
        //
        return view('amc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
            if(!$request->id_cancha){//si la carga no viene por el edit
                if($request->hasFile('imagen')){
                    $cancha['imagen'] = time() . '_' . $request->file('imagen')->getClientOriginalName();
                    $request->file('imagen')->storeAs('canchas',$cancha['imagen']);
                    Cancha::updateOrCreate(
                        ['nombre_del_predio' => $request->name,
                        'detalles_de_canchas' => $request->detail,
                        'imagen' => $cancha['imagen'],
                        'user_id' => $request->id]);
                }
                else{
                    Cancha::updateOrCreate(
                        ['nombre_del_predio' => $request->name,
                        'detalles_de_canchas' => $request->detail,
                        'user_id' => $request->id]);
                }
            }
            else
            {
                //si la carga viene por el edit
                if($request->hasFile('imagen')){
                    $cancha['imagen'] = time() . '_' . $request->file('imagen')->getClientOriginalName();
                    $request->file('imagen')->storeAs('canchas',$cancha['imagen']);
                    Cancha::updateOrCreate(['id' => $request->id_cancha],
                    ['nombre_del_predio' => $request->name,
                    'detalles_de_canchas' => $request->detail,
                    'imagen' => $cancha['imagen'],
                    'user_id' => $request->id]);
                }
                Cancha::updateOrCreate(['id' => $request->id_cancha],
                    ['nombre_del_predio' => $request->name,
                    'detalles_de_canchas' => $request->detail,
                    'user_id' => $request->id]);
            }
        //}
        return redirect()->route('administrarmicancha.show',$request->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $data = Cancha::select('canchas.id','canchas.nombre_del_predio','canchas.detalles_de_canchas','canchas.user_id')
                ->join('users','users.id','=','canchas.user_id')
                ->where('canchas.user_id','=',$id)
                ->get();
        $var = $data[0]->nombre_del_predio;
        return view('administrarmicancha.index')->with('var',$var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    { 
        $adm = Cancha::find($id);
        return response()->json(['success'=>'Todo correcto','adm'=>$adm]);
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
        return $request->name;
        //
    }
    public function act(Request $request,$id){
        $val = Cancha::select('canchas.id','canchas.nombre_del_predio','canchas.detalles_de_canchas','canchas.user_id','canchas.imagen')
                ->join('users','users.id','=','canchas.user_id')
                ->where('canchas.id','=',$request->id)
                ->get();
        return view('amc.act')->with('val',$val[0]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Primero 
    public function destroy($id)
    {
        //dd($id);
        $tasks=Task::where('tasks.id_cancha','=',$id)->get();
        //dd($tasks->count());
        if($tasks->count()==0){//solo borra si nadie alquiló
            $rta = Cancha::select('canchas.imagen')->where('id','=',$id)->get();
            $rta = Cancha::find($id)->delete();
        }
        return view('administrarmicancha');
    }
}
