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
            'quantity' => $request->qnt,
            'attributes' => array(
                'image' => $request->img
            )
        ]);
    }
}
