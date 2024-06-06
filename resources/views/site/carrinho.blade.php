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
                        <input class="form-control" style="width: 100px" type="number" name="quantity" value="{{ $item->quantity }}">
                    </td>
                  <td>
                    <button class="btn btn-primary btn-sm">Atualizar</button>
                  </form>  
                    {{-- Btn Remover --}}
                    <form action="{{ route('site.removeCarrinho') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <button class="btn btn-secondary btn-sm">Deletar</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
        </table>
        
     </div>
    <br>
    <div class="container">
        <button type="button" class="btn btn-primary btn-sm">Continuar</button>
        <a class="btn btn-danger btn-sm" href="{{ route('site.limparCarrinho') }}">Limpar</a>
        <button type="button" class="btn btn-success btn-sm">Finalizar</button>
    </div>
   
</div>


@endsection