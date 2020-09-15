@extends('adminlte::page')

@section('title', 'The Brothers')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <p class="mb-0">Olá  <b><?php $n = auth()->user()->name; echo $n;  ?> </b> Bem vindo!</p>
      </div>
      <div class="card-body" style="margin-left: 30px;">
        <div class="row">
        @forelse($agendado as $ag)
          <div class="col-lg-3">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">

                <h3>{{$ag->CONTA}}</h3>
                <p>Agendados</p>
                
              </div>

            </div>
          </div>
          @empty
             <p>Não Há Agendamentos</p>
         @endforelse
         @forelse($andamento as $an)
          <div class="col-lg-3">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>{{$an->CONTA}}</h3>
                <p>Em andamento</p>
              </div>

            </div>
          </div>
          @empty
             <p>Não Há Agendamentos</p>
         @endforelse
         @forelse($finalizado as $fi)
          <div class="col-lg-3">
            <!-- small box -->
            <div class="small-box bg-black">
              <div class="inner">
               
                <h3>{{$fi->CONTA}}</h3>
                <p>Finalizados</p>
              </div>

            </div>
          </div>
          @empty
             <p>Não Há Agendamentos</p>
         @endforelse
         @forelse($cancelado as $ca)
          <div class="col-lg-3">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>{{$ca->CONTA}}</h3>
                <p>Cancelados</p>
              </div>

            </div>
          </div>
          @empty
             <p>Não Há Agendamentos</p>
         @endforelse
        </div>

      </div>
    </div>
  </div>
@stop
