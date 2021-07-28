<?php

namespace App\Http\Controllers\clientes\endereco;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\endereco;
use Illuminate\Support\Facades\DB;

class enderecoController extends Controller
{

    public function __construct() {
        $this->middleware('clientes');
    }

    public function index()
    {
        $this->middleware('clientes');

        $endereco = endereco::where('id_cliente', session('id'))->get();
        
        return view('clientes.endereco.endereco', [
            'endereco' => $endereco
        ]);
    }

    public function cadastrar()
    {
        return view('clientes.endereco.cadastrarEndereco');
    }

    public function cadastrarSalvar(Request $request)
    {
        $db = New endereco();

        $id = session()->get('id');

        $db->id_cliente = $id;
        $db->estado = $request->input('estado');
        $db->cidade = $request->input('cidade');
        $db->numero = $request->input('numero');
        $db->endereco = $request->input('endereco');
        $db->complemento = $request->input('complemento');
        $db->bairro = $request->input('bairro');
        $db->cep = $request->input('cep');
        $db->save();

        return redirect()->route('endereco.index')->with('mensagem', 'O endereço foi cadastrado com sucesso!');
    }

    public function editar(Request $request, $id)
    {
        // $user = user::all();
        // foreach ($user as $users) {
        //     if(Auth::user()->peditar_usuario == 0){
        //         return redirect()->route('admin')->with('mensagem', 'Você não tem permissão para acessar esta página!');
        //     }else{
                $db = endereco::find($id);
                return view('clientes.endereco.editarEndereco',[
                    'id' => $id,
                    'estado' => $db['estado'],
                    'cidade' => $db['cidade'],
                    'numero' => $db['numero'],
                    'endereco' => $db['endereco'],
                    'complemento' => $db['complemento'],
                    'bairro' => $db['bairro'],
                    'cep' => $db['cep'],
                ]); 
        //     }
        // }
    }

    public function editarSalvar(Request $request, $id)
    {
        $db = endereco::find($id);

        $dados = $request->all();
        
        // $db['id_cliente'] = $db['id_cliente'];
        $db['estado'] = $dados['estado'];
        $db['cidade'] = $dados['cidade'];
        $db['complemento'] = $dados['complemento'];
        $db['numero'] = $dados['numero'];
        $db['endereco'] = $dados['endereco'];
        $db['bairro'] = $dados['bairro'];
        $db['cep'] = $dados['cep'];

        $db->save();

        return redirect()->route('endereco.index')->with('mensagem', 'Endereço atualizado com sucesso!');
    }

    public function confirm(Request $request, $id)
    {
        $db = endereco::find($id);
        return view('clientes.endereco.confirmDelete', [
            'id' => $id,
        ]);
    }

     public function remover(request $request)
    {
        $user = endereco::find($request->id);
        $user->delete();

        return redirect()->route('endereco.index')->with('invalido', 'O endereço foi deletado com sucesso!');
    }
}
