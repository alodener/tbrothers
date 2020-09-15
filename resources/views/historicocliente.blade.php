@extends('adminlte::page')

@section('title', 'The Brothers')

@section('content_header')
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h3>Histórico de Agendamento</h3>
                </div>
             
                    {{ csrf_field() }}
                    <div class="card-body table-responsive p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Data</th>
                      <th>Barbeiro</th>
                      <th>Status</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($agendamento as $c)
                    <tr>
                      <td>{{$c->start}}</td>
                      <td>{{$c->barbeiro}}</td>
                      @if($c->status == 'finalizado')
                     <td><span class="badge bg-info">{{$c->status}}</span></td> 
                     @endif
                     @if($c->status == 'cancelado')  
                     <td><span class="badge bg-danger">{{$c->status}}</span></td>
                     @endif
                      <td><button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-info{{$c->Id}}">Detalhes</button></td>
                    </tr>
                        <!-- INICIO MODAL -->
<div class="modal fade" id="modal-info{{$c->Id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <h4 class="modal-title">Detalhes de Agendamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
              <div>
              <div>
              Cliente:
                <input type="text" name="class" class="form-control" value="{{$c->title}}" readonly="readonly">
              </div>
              </div>
              <div class="form-row">
              <div class="col">
              Barbeiro:
                <input type="text" name="class" class="form-control" value="{{$c->barbeiro}}" readonly="readonly">
              </div>
              <div class="col">
              Serviço:
                <input type="text" name="tipo" class="form-control" value="{{$c->servico}}" readonly="readonly">
              </div>
              </div>
              <div class="form-row">
              <div class="col">
                Valor do Serviço:
                <input type="text" class="form-control" name="valor" value="R$25,00" readonly="readonly">
                </div>
                <div class="col">
                Data de Agendamento:
                <input type="text" class="form-control" name="tempo" value="{{$c->start}}" readonly="readonly">
                </div>
                </div>
                <div class="col-xs-4">
                Status de Agendamento:
                <input type="text" class="form-control" name="tempo" value="{{$c->status}}" readonly="readonly">
                </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
                    @empty
                <p>Não Há dados.</p>
                @endforelse
                  </tbody>
                </table>
              
              </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
@stop
