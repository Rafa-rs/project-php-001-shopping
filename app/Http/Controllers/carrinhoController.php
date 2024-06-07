<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade;

class carrinhoController extends Controller
{
    public function carrinhoList()
    {
        $itens= CartFacade::getContent();
        //dd($itens);
        return view('site.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request){
        CartFacade::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => abs($request->qnt),
            'attributes' => array(
                'image' => $request->img
            )
        ]);

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado no carrinho com sucesso!');

    }

    public function removeCarrinho(Request $request){

        CartFacade::remove($request->id);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto removido do carrinho com sucesso!');
    }

    public function atualizaCarrinho(Request $request){

        CartFacade::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity)
            ]
        ]);
        
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto do carrinho atualizado com sucesso!');
    }

    public function limparCarrinho(Request $request){

        CartFacade::clear();

        return redirect()->route('site.carrinho')->with('aviso', 'O seu carrinho está vazio!');

    }
}
