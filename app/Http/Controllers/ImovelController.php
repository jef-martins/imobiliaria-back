<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imovel;
use Illuminate\Support\Facades\DB;

class ImovelController extends Controller
{

    public function add(Request $request){
        try{
            $imovel = new Imovel;

            $imovel->referencia = $request->referencia;
            $imovel->preco = $request->preco;
            $imovel->area = $request->area;
            $imovel->areaConstruida = $request->areaConstruida;
            $imovel->descricao = $request->descricao;
            $imovel->idEstado = $request->idEstado;
        
            $imovel->save();

            return ['imovel' => 200, 'idImovel' => $imovel->idImovel];
        }
        catch(\Exception $erro){
            return ['imovel' => 'erro', 'detalhes' ->$erro];
        }
    }

    public function list(){
        $imovel = new Imovel;
        
        return $imovel->all();
    }

    public function select($id){
        $imovel = new Imovel;
        
        return $imovel->find($id);
    }

    public function update(Request $request, $id){
        try{
            $imovel = new Imovel;
            $imovel = $imovel->find($id);

            $imovel->referencia = $request->referencia;
            $imovel->preco = $request->preco;
            $imovel->area = $request->area;
            $imovel->areaConstruida = $request->areaConstruida;
            $imovel->descricao = $request->descricao;
            $imovel->idEstado = $request->idEstado;
        
            $imovel->save();

            return ['imovel' => 'atualizado', 'idImovel' => $imovel->idImovel];
        }
        catch(\Exception $erro){
            return ['imovel' => 'erro', 'detalhes' ->$erro];
        }
    }

    public function delete($id){
        try{
            $imovel = new Imovel;
            $imovel = $imovel->find($id);
        
            $imovel->delete();

            return ['imovel' => 'excluído'];
        }
        catch(\Exception $erro){
            return ['imovel' => 'erro', 'detalhes' ->$erro];
        }
    }
}
