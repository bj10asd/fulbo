<?php
namespace App\Http\Controllers;

use App\Cancha;
use App\Users;

use Illuminate\Http\Request;
use DataTables;

class CanchasController extends Controller
{
    //protected $var=$_GET['product_id'];
    /**     * Display a listing of the resource.     *     * @return \Illuminate\Http\Response     */
    public function index(Request $request,$id)
    {   
        //dd($request);
        //dd($id);
        if ($request->ajax()) {
            
            $data = Cancha::select('canchas.id','canchas.nombre_del_predio','canchas.detalles_de_canchas','canchas.user_id')
                ->join('users','users.id','=','canchas.user_id')
                ->where('canchas.user_id','=',$id)
                ->get();
            $var = $data[0]->nombre_del_predio;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    
                               $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="editbtn btn-primary btn-sm editProduct">Ver esta cancha</a>';
                    //$btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"         data-id="'.$row->id.'"     data-original-title="Delete"class="btn btn-danger btn-sm deleteProduct">Borrar</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            
        }
        $var = Cancha::select('canchas.id','canchas.nombre_del_predio','canchas.detalles_de_canchas','canchas.user_id')
                ->join('users','users.id','=','canchas.user_id')
                ->where('canchas.user_id','=',$id)
                ->get();
        if(count($var)!=0)
            return view('canchasporid')->with('var',$var[0]->nombre_del_predio);
        else
            return view('canchas');
    }
    
    public function store(){
        Cancha::updateOrCreate(['id' => $request->product_id],
                                ['nombre_del_predio' => $request->nombre_del_predio, 'detalles_de_canchas' => $request->detalles_de_canchas, 'user_id' => $request->user_id]);
        return response()->json(['success'=>'Libro guardado con éxito.']);
    }
    public function show($id){
       //dd($id);
            $data = Cancha::select('canchas.nombre_del_predio','canchas.detalles_de_canchas','canchas.user_id')
                ->join('users','users.id','=','canchas.user_id')
                ->where('canchas.user_id',$id)
                ->get();
        dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                               $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="editbtn btn-primary btn-sm editProduct">Ver esta cancha</a>';
                    //$btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"         data-id="'.$row->id.'"     data-original-title="Delete"class="btn btn-danger btn-sm deleteProduct">Borrar</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        //dd($data);
            //return view('canchasporid',$data);
        
        
        //$categoriaData['data'] = Category::get();
        //return view('canchasporid');//->with("categoriaData", $categoriaData);//->with("categoriaData", $categoriaData);//,compact('categories')
    }
}
    