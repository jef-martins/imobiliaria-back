<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comodo;
use Illuminate\Support\Facades\DB;


class ComodoController extends Controller
{
    public function add(Request $request){
        try{
            $comodo = new Comodo;

            $comodo->descricao = $request->descricao;
            $comodo->qtd = $request->qtd;
            $comodo->idImovel = $request->idImovel;
        
            $comodo->save();

            return ['comodo' => 200, 'idFoto' => $comodo->idComodo];
        }
        catch(\Exception $erro){
            return ['comodo' => 'erro', 'detalhes' ->$erro];
        }
    }

    public function list(){
        $comodo = new Comodo;
        
        return $comodo->all();
    }

    public function select($id){

        $comodo = DB::table('comodos')
            ->where('idImovel', $id)
            ->orderBy('descricao', 'desc')
            ->get();
        return $comodo;
    }

    public function update(Request $request, $id){
        try{
            $comodo = new Comodo;
            $comodo = $comodo->find($id);

            $comodo->descricao = $request->descricao;
            $comodo->qtd = $request->qtd;
            $comodo->idImovel = $request->idImovel;
        
            $comodo->save();

            return ['comodo' => 'atualizado', 'idFoto' => $comodo->idComodo];
        }
        catch(\Exception $erro){
            return ['comodo' => 'erro', 'detalhes' ->$erro];
        }
    }

    public function delete($id){
        try{
            $comodo = new Comodo;
            $comodo = $comodo->find($id);
        
            $comodo->delete();

            return ['comodo' => 'excluído'];
        }
        catch(\Exception $erro){
            return ['comodo' => 'erro', 'detalhes' ->$erro];
        }
    }
}
