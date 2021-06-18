<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;

class FotoController extends Controller
{
    public function add(Request $request){
        try{
            $foto = new Foto;

            $foto->url = $request->url;
            $foto->idImovel = $request->idImovel;
        
            $foto->save();

            return ['status' => 'salvo'];
        }
        catch(\Exception $erro){
            return ['status' => 'erro', 'detalhes' ->$erro];
        }
    }

    public function list(){
        $foto = new Foto;
        
        return $foto->all();
    }

    public function select($id){
        $foto = new Foto;
        
        return $foto->find($id);
    }

    public function update(Request $request, $id){
        try{
            $foto = new Foto;
            $foto = $foto->find($id);

            $foto->url = $request->url;
            $foto->idImovel = $request->idImovel;
        
            $foto->save();

            return ['status' => 'atualizado'];
        }
        catch(\Exception $erro){
            return ['status' => 'erro', 'detalhes' ->$erro];
        }
    }

    public function delete($id){
        try{
            $foto = new Foto;
            $foto = $foto->find($id);
        
            $foto->delete();

            return ['status' => 'excluído'];
        }
        catch(\Exception $erro){
            return ['status' => 'erro', 'detalhes' ->$erro];
        }
    }
}
