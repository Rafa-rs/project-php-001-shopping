@extends('site.layout')
@section('title', 'Home')
@section('conteudo')
<br>
<div class="container"> 

    <div class="row justify-content-md-center">

        @foreach ($produtos as $produto)

        
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ $produto->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $produto->nome }}</h5>
                    <p class="card-text">{{ Str::limit($produto->descricao, 30) }}</p>
                    
                    @can('verProduto', $produto)
                    <a href="{{ route('site.details', $produto->slug) }}" class="btn btn-primary">Ver</a>
                    @endcan
                
                </div>
            </div>
        </div>     
        
    
        @endforeach

               
    </div>
    <br>
    <div class="container">
        {{ $produtos->links() }}
    </div>
   
</div>


@endsection