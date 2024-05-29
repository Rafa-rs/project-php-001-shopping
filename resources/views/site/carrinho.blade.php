@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')
<br>
<div class="container"> 
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
                  <td><input class="form-control" style="width: 100px" type="number" name="quantity" value="{{ $item->quantity }}"></td>
                  <td>
                    <button type="button" class="btn btn-primary btn-sm">Refresh</button>
                    <button type="button" class="btn btn-secondary btn-sm">Delete</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
        </table>
        
     </div>
    <br>
    <div class="container">
        <button type="button" class="btn btn-primary btn-sm">Continuar</button>
        <button type="button" class="btn btn-danger btn-sm">Limpar</button>
        <button type="button" class="btn btn-success btn-sm">Finalizar</button>
    </div>
   
</div>


@endsection