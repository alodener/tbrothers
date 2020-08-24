@extends('adminlte::page')

@section('title', 'The Brothers')

@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop


@section('content')
<script>
  setTimeout(function () {
		$('#message').hide(); // "foo" é o id do elemento que seja manipular.
	}, 3500); // O valor é representado em milisegundo
</script>

@if(Session::has("message"))
<div id="message" class="alert alert-success"><a href='#' class='close' data-dismiss='alert'
    aria-label='close'>&times;</a>
  <strong>Sucesso</strong>
  <p>
    {{ Session::get('message') }} com sucesso.
  </p>

</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card text-center">
        <div class="card-header">
        <h4>Faça seu Agendamento!</h4>
        </div>
            <div class="card-body">
                
                <form action="/agendamento" method="post">
                {{ csrf_field() }}
                    <label for="barbeiro">Selecione o seu Barbeiro</label>
                        <div class="input-group mb-3">
                        <select class="custom-select" id="barbeiro" name="barbeiro"> 
                                <option selected>---</option>
                                <option value="Markinhos">Markinhos</option>
                                <option value="Victor Denner">Victor Denner</option>
                                <option value="Outros">O outro</option>
                             </select>
                        </div>
                    <label for="data">Escolha a data e Hora</label>
                        <div class="input-group mb-3">
                            <input type="datetime-local" name="data" class="form-control">
                        </div>
                    <label for="servico">Qual serviço?</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="servico" name="servico">
                                <option selected>---</option>
                                <option value="Corte degradê">Corte degradê</option>
                                <option value="Corte + Barba">Corte + Barba</option>
                                <option value="Barba">Barba</option>
                             </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Agendar!</button>
                </form>
            </div>
        </div>
    </div>        
</div>

       
@stop