<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller{

    public function index(Request $request){

        // Serie::all() = traz todos os dados do banco.
        // Serie::query() = traz dados podendo ordenar e fazer consultas mais especificas.
        $series = Serie::query()->orderBy('nome')->get();

        //pengando mensagem passada por sessao
        $mensagem = $request->session()->get('mensagem');
        //removendo mensagem da sessao
        $request->session()->remove('mensagem');

        return view('series.index',compact('series', 'mensagem'));
    }

    public function create(){
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        //pegando dado do formulario por request
        $nome = $request->nome;
        //adicionando no banco
        $serie = Serie::create(['nome' => $nome]);

        //criando temporadas
        $qtdTemporadas = $request->qtd_temporadas;
        for ($i = 1; $i <= $qtdTemporadas ; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            for($j = 1; $j <= $request->ep_por_temporada; $j++){
                $temporada->episodios()->create(['numero' => $j]);
            }
        }

        //adicionando item na sessao. Flash: define o dado na sessao e dps de ser lido na proxima requisicao é excluido
        $request->session()->flash('mensagem', "$serie->nome e suas temporadas + episodios adicionada(o)s com sucesso");

        //redirecionar
        return redirect()->route('listar_series');
    }

    public function destroy(Request $request){
        Serie::destroy($request->id);
        $request->session()->flash('mensagem', "Serie removida com sucesso!");
        return redirect()->route('listar_series');
    }

}