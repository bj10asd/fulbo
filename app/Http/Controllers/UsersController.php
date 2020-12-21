<?php
namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use DataTables;

class UsersController extends Controller
{
    /**     * Display a listing of the resource.     *     * @return \Illuminate\Http\Response     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            //$data = Product::latest()->get();
            $data = Users::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                               $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="editbtn btn-primary btn-sm editProduct">Editar</a>';
                    //$btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"         data-id="'.$row->id.'"     data-original-title="Delete"class="btn btn-danger btn-sm deleteProduct">Borrar</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('canchasporid');//,compact('categories')
    }
    /**     * Store a newly created resource in storage.     *     * @param  \Illuminate\Http\Request  $request     * @return \Illuminate\Http\Response     */
    public function store(Request $request)
    {
        //Product::updateOrCreate(['id' => $request->product_id],
        Users::updateOrCreate(['id' => $request->product_id],
                                ['cat_name' => $request->name, 'detail' => $request->detail]);
        return response()->json(['success'=>'Categoria guardado con éxito.']);
    }
    /**     * Show the form for editing the specified resource.     *     * @param  \App\Product  $product     * @return \Illuminate\Http\Response     */
    public function edit($id)
    {
        //$product = Product::find($id);
        $category = Users::find($id);
        return response()->json($category);
    }
    /**     * Remove the specified resource from storage.     *     * @param  \App\Product  $product     * @return \Illuminate\Http\Response     */
    public function destroy($id)
    {
        //Product::find($id)->delete();
        Users::find($id)->delete();
        return response()->json(['success'=>'Producto borrado con éxito.']);
    }
}
    