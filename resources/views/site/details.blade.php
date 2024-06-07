@extends('site.layout')
@section('title', 'Datalhes')
@section('conteudo')

<br>
<div class="container">
    <div class="row">
        <div class="col col-lg-6">
            <img src="{{ $produto->image }}" class="img-fluid">
        </div>

        <div class="col col-lg-6">
            <h4>{{ $produto->nome }}</h4>
            <h4>R$ {{ number_format($produto->preco, 2, ',', '.') }}</h4>
            <p>{{ $produto->descricao }}</p>
            <p>Postado por: {{ $produto->user->firstName }}</p>
            <span>Categoria: {{ $produto->categoria->nome}}</span>
            <br>
            <br>
            <form action="{{ route('site.addCarrinho') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <input type="hidden" name="name" value="{{ $produto->nome }}">
                <input type="hidden" name="price" value="{{ $produto->preco }}">
                <input type="number" name="qnt" min="1" value="1">
                <input type="hidden" name="img" value="{{ $produto->imagem }}">
                <button class="btn btn-success">Comprar</button>
            </form>
        </div>

    </div>
    
</div>

@endsection