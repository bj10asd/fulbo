<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class AdminRolesController extends Controller
{
    //
    public function index(Request $request)
    {
        //dd($request->ajax());
        if ($request->ajax()) {
            $data = User::
            select('users.id','users.name','users.email','roles.name as rname','role_user.role_id')
            ->join('role_user','role_user.user_id','=','users.id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->get();
            //dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                               $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="editbtn btn-primary btn-sm editProduct">Editar</a>';
                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Delete" class="deletebtn btn-danger btn-sm deleteProduct">Borrar</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $roles['data'] = Role::get();
        return view('administrarroles')->with("roles",$roles);
    }
    public function edit($id)
    {
        $adm = User::find($id);
        $role = DB::select('select ru.role_id,ro.name from role_user ru inner join roles ro on(ro.id = ru.role_id) where ru.user_id = '.$id);
        return response()->json(['success'=>'Todo correcto','adm' => $adm,'role' => $role]);
    }
    public function store(Request $request)
    {
        $rta= DB::update('update role_user set role_id = '.$request->role_id.' where user_id = '.$request->product_id  );
        return response()->json(['success'=>'Todo correcto']);
    }
    public function destroy($id)
    {
        $rta=User::find($id)->delete();
        $rta1=DB::table('role_user')->where('user_id', $id)->delete();//elimina a este usuario de la tabla 'role_user
        return redirect()->route('administrarroles.index')->with('success','Usuario borrado con éxito.');
    }
    public function show($id){
        
        return redirect()->route('administrarroles.index')->with('success','Usuario borrado con éxito.');
     }
    
}
