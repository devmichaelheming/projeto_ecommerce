<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = user::all();

        return view('admin.usuarios.index',[
            'users' => $users
        ]);
    }
    public function viewCadastrar()
    {
        return view('admin.usuarios.cadastrarUsuario');
    }

    public function cadastrar(Request $request)
    {
        $verific_email = DB::table('users')->where('email', $request['email'])->count() == 1;

        if($verific_email == "true") {
            return redirect()->route('admin.usuarios')->with('invalido', 'E-Mail já existente!');
        } else{
            $db = New user();
            $db->name = $request->input('name');
            $db->email = $request->input('email');
            $db->password = $request->input('password');
            $db->save();

            return redirect()->route('admin.usuarios')->with('mensagem', 'Usúario cadastrado com sucesso!');
        }
    }

    public function editar(Request $request, $id)
    {
        // $user = user::all();
        // foreach ($user as $users) {
        //     if(Auth::user()->peditar_usuario == 0){
        //         return redirect()->route('admin')->with('mensagem', 'Você não tem permissão para acessar esta página!');
        //     }else{
                $db = user::find($id);
                return view('admin.usuarios.editarUsuario',[
                    'id' => $id,
                    'name' => $db['name'],
                    'email' => $db['email'],
                    'password' => $db['password'],
                ]); 
        //     }
        // }
    }

    public function editarSalvar(Request $request, $id)
    {
        $db = user::find($id);

        $dados = $request->all();
        
        // $db['id_cliente'] = $db['id_cliente'];
        $db['name'] = $dados['name'];
        $db['email'] = $dados['email'];
        $db['password'] = $dados['password'];

        $db->save();

        return redirect()->route('admin.usuarios')->with('mensagem', 'Usuário atualizado com sucesso!');
    }
    public function confirm(Request $request, $id)
    {
        $db = user::find($id);
        return view('admin.usuarios.confirmDelete', [
            'id' => $id,
        ]);
    }

    public function remover(request $request)
    {
        $user = user::find($request->id);
        $user->delete();

        return redirect()->route('admin.usuarios')->with('invalido', 'O Usuários foi deletado com sucesso!');
    }
}
