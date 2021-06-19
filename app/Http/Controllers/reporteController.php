<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Task;
use DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class reporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *->where([['day(date(tasks.start))','=','day(now())'],['month(date(tasks.start))','=','month(now())']])
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data=Task::select('tasks.id','tasks.title','tasks.start','tasks.end','canchas.nombre_del_predio','canchas.detalles_de_canchas','tasks.id_cancha')
            ->join('canchas','canchas.id','=','tasks.id_cancha')
            ->whereRaw('day(tasks.start) = day(now()) AND month(tasks.start) = month(now())' )
            ->get();
            //dd($tasks);
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="editbtn btn-primary btn-sm editProduct">Editar</a>';
                
                return $btn;
            })
            ->rawColumns(['action'])
                ->make(true);
        }
        return view("crearreporte");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd();
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
        //return redirect()->route('crearreporte.index')->with('success','Usuario borrado con éxito.');
        return view('crearreporte');
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
    public function crearpdf()
    {
        $user=Task::select('tasks.id','tasks.title','tasks.start','tasks.end','canchas.nombre_del_predio','canchas.detalles_de_canchas','tasks.id_cancha')
        ->join('canchas','canchas.id','=','tasks.id_cancha')
        ->whereRaw('day(tasks.start) = day(now()) AND month(tasks.start) = month(now())' )
        ->get();
        //dd($user);
        
        $pdf = PDF::loadView('reporte-pdf',compact('user'));
        
        return $pdf->stream('reportecanchas.pdf');
    }
}
