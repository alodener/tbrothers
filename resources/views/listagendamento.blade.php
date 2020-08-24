@extends('adminlte::page')


@section('content_header')
<link href="{{asset('vendor/calendar/lib/main.css')}}" rel='stylesheet' />
<link href="{{asset('vendor/calendar/css/style.css')}}" rel='stylesheet' />
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

<!-- Modal -->
<div class="modal fade" id="modalCalendar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
      <form action="/listagendamento" method="post" id="agendamentoForm">
      {{ csrf_field() }}
          <div class="form-group">
          <label for="cliente" class="col-form-label">Cliente</label>
            <input type="text" name="cliente" class="form-control" id=cliente disabled>
            <input type="text" name="id" hidden>
            <label for="data-init" class="col-form-label">Data/Hora | Inicial</label>
            <input type="datetime-local" class="form-control" id="data-init" name="data-init">
            <label for="data-fim" class="col-form-label">Data/Hora | Final </label>
            <input type="datetime-local" class="form-control" id="data-fim" name="data-fim">
          </div>
          <div class="form-group">
          <label for="barba">Barbeiro</label>
            <input type="text" class="form-control" id="barbeiro" name="barbeiro">
          </div>
          <div class="form-group">
            <label for="barba">Serviço</label>
            <input type="text" class="form-control" id="servico" name="servico">
          </div>
          <div class="modal-footer">
                    <button type="submit" id="salvar" class="btn btn-success" disabled>Salvar</button>
        <button type="button" id="editar" class="btn btn-primary" onClick="habilitarCampos()">Editar</button>

        </form>
        <div> 
        <form action="/listagendamento" method="post">
        {{ csrf_field() }}
        <input type="text" name="acao" id="acao" value="cancelar" hidden>
        <button type="submit" id="Cancelar" class="btn btn-danger">Cancelar</button>
        </form>
        </div>
          <div> 
        <form action="/listagendamento" method="post">
        {{ csrf_field() }}
        <input type="text" name="acao" id="acao" value="atender" hidden>
        <button type="submit" id="abrir" class="btn btn-primary">Atender</button>
        </form>
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
        
        
      </div>

    </div>
  </div>
</div>
<!--  FIM  -->

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div id='wrap'>
                <div div id='calendar-wrap'>
                    <div id="calendar" data-route-load-events="{{ route('routeLoadEvents') }}" >
                    </div>
                        </div>

            </div>
        </div>
    </div>
</div>
<script>

  function habilitarCampos(){
  document.getElementById("data-init").removeAttribute('disabled', 'disabled'); // Habilitar
  document.getElementById("data-fim").removeAttribute('disabled', 'disabled'); // Habilitar
  document.getElementById("barbeiro").removeAttribute('disabled', 'disabled'); // Habilitar
  document.getElementById("servico").removeAttribute('disabled', 'disabled'); // Habilitar
  document.getElementById("salvar").removeAttribute('disabled', 'disabled'); // 
  document.getElementById("editar").setAttribute('disabled', 'disabled'); // Habilitar
}
  function resetBot(){
    document.getElementById("cliente").setAttribute('disabled', 'disabled'); // Habilitar
    document.getElementById("data-init").setAttribute('disabled', 'disabled'); // Habilitar
    document.getElementById("data-fim").setAttribute('disabled', 'disabled'); // Habilitar
    document.getElementById("barbeiro").setAttribute('disabled', 'disabled'); // Habilitar
    document.getElementById("servico").setAttribute('disabled', 'disabled'); // Habilitar
    document.getElementById("salvar").setAttribute('disabled', 'disabled'); // 
    document.getElementById("editar").removeAttribute('disabled', 'disabled'); // Habilitar
  }
 
 
</script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></scritp>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>


<script src="{{asset('vendor/calendar/js/script.js')}}"></script> 
<script src="{{asset('vendor/calendar/lib/main.js')}}"></script> 

<script src="{{asset('vendor/calendar/js/calendar.js')}}"></script>



@stop
