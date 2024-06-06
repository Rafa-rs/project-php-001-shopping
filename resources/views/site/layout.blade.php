<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) <!-- chamada do Bootstrap pelo Vinte -->
    
    <title>Produtos</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark border-body" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Shopping</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('site.index')}}">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categorias
                </a>
                <ul class="dropdown-menu">
                  @foreach($categoriasMenu as $categoriasM)
                  <li><a class="dropdown-item" href="{{ route('site.categoria', $categoriasM->id) }}">{{ $categoriasM->nome }}</a></li>
                  @endforeach
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('site.carrinho') }}">Carrinho
                  <span class="badge text-bg-danger">
                    {{ Darryldecode\Cart\Facades\CartFacade::getContent()->count() }}
                    <span class="visually-hidden">Itens</span>
                  </span>
                </a>
              </li>
                            
            </ul>
          </div>
        </div>
    </nav>
    
    @yield('conteudo')
   
</body>
</html>