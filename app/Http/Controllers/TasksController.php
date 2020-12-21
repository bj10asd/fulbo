<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Calendar;
use App\Task;
use App\Cancha;
use Route;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;


use Mail;

use App\Http\Controllers\Controller;
use DB;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        //dd($id);
        //$tasks = Task::get();
        $tasks=Task::select('tasks.title','tasks.start','tasks.end','canchas.nombre_del_predio','canchas.detalles_de_canchas','tasks.id_cancha')
            ->join('canchas','canchas.id','=','tasks.id_cancha')
                ->where('tasks.id_cancha','=',$id)
                ->get();
        //$cancha=Cancha::select('canchas.nombre_del_predio','canchas.detalles_de_canchas','tasks.id_cancha')->join('tasks','canchas.id','=','tasks.id_cancha')->where('canchas.id','=',$id)->get();
        //dd($cancha[0]->nombre_del_predio);
        
        if(count($tasks) == 0){
            //dd($id);
            $rta= Cancha::select('canchas.nombre_del_predio','canchas.detalles_de_canchas')->where('id','=',$id)->get();
            //$var="error";
            //return view('canchas',compact('var'));
            //dd($rta[0]->nombre_del_predio);
            return view('tasks.index',compact('var'))->with('id',$id)->with('nom',$rta[0]->nombre_del_predio)->with('det',$rta[0]->detalles_de_canchas);
            //header('Location: http://localhost/ProyectFinal/public/canchas');
            //exit();
        }else{
        return view('tasks.index', compact('tasks'))->with('nom',$tasks[0]->nombre_del_predio)->with('det',$tasks[0]->detalles_de_canchas)->with('id',$tasks[0]->id_cancha);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        Task::
        updateOrCreate(['title' => $request->title,
                        'start' => $request->start,
                        'end' => $request->end,
                        'id_cancha' => $request->id_cancha ]
                       );
        
        $tasks=Task::select('tasks.title','tasks.start','tasks.end','canchas.nombre_del_predio','canchas.detalles_de_canchas','tasks.id_cancha')
            ->join('canchas','canchas.id','=','tasks.id_cancha')
                ->where('tasks.id_cancha','=',$request->id_cancha)
                ->get();
        
        return response()->json(['success'=>'Todo correcto','id'=>$request->id_cancha,'nombre_del_predio'=>$tasks[0]->nombre_del_predio, 'info'=>$request->info]);
        
        //dd( redirect()->route('tasks.index',['id'=>$tasks[0]->id_cancha]));
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
        $task = Task::find($id);
        return view('tasks.edit',compact('task'));
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
        $task = Task::find($id)->delete();
        return redirect()->route('tasks.index');
    }
    public function pdf()
    {
        
        $data = array('name'=>'XXX'); //no se para que es xdxd pero anda
        $user=Cancha::select('canchas.nombre_del_predio','canchas.detalles_de_canchas','tasks.start')->join('tasks','canchas.id','=','tasks.id_cancha')->where('tasks.title','=',Auth::user()->name)->orderby('tasks.id','desc')->get();
        //dd($user);
        
        $pdf = PDF::loadView('descargar-pdf',compact('user'));
        
        
        Mail::send('sending', $data, function($message) use($data,$pdf){
            $message->to('josemaria.terrazas@gmail.com','hola');
            $message->from('josemaria.terrazas@gmail.com')->subject ('¡Reservaste tu cancha con 5inco!');
            $message->attachData($pdf->output(), 'reserva.pdf');
            });
        
        
        return response()->json(['success'=>'ok']);
        //return $pdf->stream('reserva.pdf');
            
    }

}
