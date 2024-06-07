@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')
<br>
<div class="container">
    
    @if ($mensagem = Session::get('sucesso'))
    
        <div class="card text-bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Parabéns!</h5>
                <p class="card-text">{{ $mensagem }}</p>
            </div>
        </div>

    @endif

    @if ($mensagem = Session::get('aviso'))
    
        <div class="card text-bg-info mb-3">
            <div class="card-body">
                <h5 class="card-title">Atenção!</h5>
                <p class="card-text">{{ $mensagem }}</p>
            </div>
        </div>

    @endif

    @if ($itens->count() == 0)

        <div class="card text-bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Seu carrinho está vazio!</h5>
                <p class="card-text">Aproveite as promoções para reaizar as suas compras.</p>
            </div>
        </div>
        
    @else
    
        <h3>Seu carrinho possui: {{ $itens->count() }} produtos.</h3>
        <div class="row justify-content-md-center">

            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($itens as $item)
                    <tr>
                    <td><img class="rounded float-start" alt="" src="{{ $item->attributes->image }}"></td>
                    <td>{{ $item->name }}</td>
                    <td>R$ {{ number_format($item->price, 2, ',', '.') }}</td>

                    {{-- Btn Atualizar --}}
                    <form action="{{ route('site.atualizaCarrinho') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <td>
                            <input class="form-control" style="width: 100px" type="number" name="quantity" min="1" value="{{ $item->quantity }}">
                        </td>
                    <td>
                        <button class="btn btn-primary btn-sm" style="width: 50px"><i class="bi bi-arrow-clockwise"></i></button>
                    </form>  
                        {{-- Btn Remover --}}
                        <form action="{{ route('site.removeCarrinho') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button class="btn btn-danger btn-sm" style="width: 50px"><i class="bi bi-trash3"></i></button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    
    @endif
    <br>
    <h5>Valor total: R$ {{ number_format(Darryldecode\Cart\Facades\CartFacade::getTotal(),2,',','.') }}</h5>
    <br>
    <div class="container">
        <a class="btn btn-outline-primary btn-sm" href="{{ route('site.index') }}" style="width: 200px">Continuar comprando <i class="bi bi-cart4"></i></a>
        <a class="btn btn-outline-danger btn-sm" href="{{ route('site.limparCarrinho') }}" style="width: 100px">Limpar <i class="bi bi-trash"></i></a>
        <button type="button" class="btn btn-outline-success btn-sm" style="width: 100px">Finalizar <i class="bi bi-cart-check"></i></button>
    </div>
   
</div>


@endsection