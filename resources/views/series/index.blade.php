@extends('layout')

@section('cabecalho')
    Series
@endsection

@section('conteudo')
    <!-- se a variavel mensagem nao estiver vazia exibe -->
    @if(!empty($mensagem))
        <div class="alert alert-success">
            {{$mensagem}}
        </div>
    @endif

    <a href="{{route('form_criar_serie')}}" class="btn btn-dark mb-2">Adicionar</a>
        <ul class="list-group">
            <!-- laço de repeticao pra pegar series no banco -->
            @foreach($series as $serie)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$serie->nome}}
                    
                    <span class="d-flex">
                        <a href="/series/{{$serie->id}}/temporadas" class="btn btn-info btn-sm mr-1">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                        
                        <form method="post" action="/series/remover/{{ $serie->id }}"
                            onsubmit="return confirm('Tem certeza?')">
                            @csrf
                            @method('DELETE') <!-- alterar metodo da requisicao: pra quando quiser usar delete nas rotas-->
                            <button class="btn btn-danger btn-sm">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
@endsection
