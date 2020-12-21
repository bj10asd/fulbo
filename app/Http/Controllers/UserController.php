<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DataTables;
use Barryvdh\DomPDF\Facade as PDF;
use App\Role;

use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function index(Request $request)
    {//si quiero poner una condicion como estoy buscando lo que en realidad hago es prohibir la vista a quienes no sean canchero, que no es lo que quiero, lo que quiero es que solo me liste los cancheros
        //dd($request->ajax());
        if ($request->ajax()) {
            //if($request->user()->hasRole('cliente')){
            //$roles=$request->user()->hasRole('canchero') ? 'canchero' : 'visita';
            $data = User::select('users.id','name')->join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_id','2')->get() ;   
            //dd($data);
            //$roles = User::latest()->getRole();
            //$request->user()->hasRole('canchero') ? $data = User::latest()->get() : null;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                               $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="editbtn btn-primary btn-sm editProduct">Ver</a>';
                    //$btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"         data-id="'.$row->id.'"     data-original-title="Delete"class="btn btn-danger btn-sm deleteProduct">Borrar</a>';
                    return $btn;
                
                })
                ->rawColumns(['action'])
                ->make(true); 
          //  }
            
        }
        return view('canchas');//,compact('products')
    }
    /**     * Store a newly created resource in storage.     *     * @param  \Illuminate\Http\Request  $request     * @return \Illuminate\Http\Response     */
    public function store(Request $request)
    {
        dd($request);
        /*
        Product::updateOrCreate(['id' => $request->product_id],
                                ['name' => $request->name]);
        return response()->json(['success'=>'Producto guardado con éxito.']);
        */
        $data = User::select('users.id','name')
                        ->get() ;  
        
        return view('canchasporid');
    }
    public function edit($id)
    {
        //$product = Product::find($id);
        //$book = User::find($id);
        //return response()->json($book);
        //dd($id);
        //return View::make('canchasporid',compact('id',$id));//->with('id',$id)
        $var = 'canchasid.index/'.$id;
        return redirect($var);//->with('id',$id)
    }
    /**     * Remove the specified resource from storage.     *     * @param  \App\Product  $product     * @return \Illuminate\Http\Response     */
    public function destroy($id)
    {
        //User::find($id)->delete();
        //return response()->json(['success'=>'Producto borrado con éxito.']);
        //return view('home');
    }
    public function pdf(){
        $productos = User::all();
        $pdf = PDF::loadView('descargar-productos',compact('Canchas'));//,compact('productos')
        return $pdf->stream('listado.pdf');
        //return $pdf->download('listado.pdf');
    }
    public function inde(Request $request)
    {//si quiero poner una condicion como estoy buscando lo que en realidad hago es prohibir la vista a quienes no sean canchero, que no es lo que quiero, lo que quiero es que solo me liste los cancheros
        if ($request->ajax()) {
            //if($request->user()->hasRole('cliente')){
            //$roles=$request->user()->hasRole('canchero') ? 'canchero' : 'visita';
            $data = User::select('users.id','name')->join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_id','2')->get() ;            
            //$roles = User::latest()->getRole();
            //$request->user()->hasRole('canchero') ? $data = User::latest()->get() : null;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                               $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="editbtn btn-primary btn-sm editProduct">Ver</a>';
                    //$btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"         data-id="'.$row->id.'"     data-original-title="Delete"class="btn btn-danger btn-sm deleteProduct">Borrar</a>';
                    return $btn;
                
                })
                ->rawColumns(['action'])
                ->make(true); 
          //  }
            
        }
        return view('canchas');//,compact('products')
    }
    public function retHome(Request $request){
        return view('home');
    }
     public function show($id)
    {
        // get the nerd
        //$nerd = Nerd::find($id);

        // show the view and pass the nerd to it
        //return View::make('nerds.show')
            //->with('nerd', $nerd);
    }
    
}
    