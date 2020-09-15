<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use DB;
use App\Event;
use DateTime;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    //Iniciar tela
    public function iniciar(){

        return view('agendamento');
    }

    //Salvar um Novo Agendamento 
    public function novoAgendamento(Request $request){
        //Atribuir 1 hora a mais para o fim do atendimento.
        $data = $request->input('data');
        $dataFim = $request->input('data');
        $dtInit = Carbon::create($data);
        $dtFim = Carbon::create($dataFim);
        $dtFim->add(1,'hour');
        $barbeiro = $request->input('barbeiro');
        $servico = $request->input('servico');

 
        $user_name = Auth()->user()->name;
        $agendamento = new Event();
        $agendamento->title = $user_name;
        $agendamento->start = $data;
        $agendamento->end = $dtFim;
        $agendamento->color = "#93ec54";
        $agendamento->barbeiro = $barbeiro;
        $agendamento->servico = $servico;
        $agendamento->status = "agendado";
        $agendamento->save();

        return redirect('/agendamento')->with('message', 'Agendamento Realizado');



    }

    public function update(Request $request){

        $acao = $request->input('acao');
        
        if($acao == "atender"){
            $NewStatus = "em atendimento";
            $NewColor = "#fff80f";
            $idEvent = $request->input('id');
            $updateEvent = DB::table('events')->where('Id', $idEvent)->update(['status' => $NewStatus, 'color' => $NewColor]);
            return redirect('/listagendamento')->with('message', 'Agendamento Alterado');
            

        }else if($acao == "cancelar"){
            $NewStatus = "cancelado";
            $NewColor = "#ed0707";
            $idEvent = $request->input('id');
            $updateEvent = DB::table('events')->where('Id', $idEvent)->update(['status' => $NewStatus, 'color' => $NewColor]);
            return redirect('/listagendamento')->with('message', 'Agendamento Alterado');
            
        
        }else if($acao == "finalizar"){
            $NewStatus = "finalizado";
            $NewColor = "#000000";
            $idEvent = $request->input('id');
            $updateEvent = DB::table('events')->where('Id', $idEvent)->update(['status' => $NewStatus, 'color' => $NewColor]);
            return redirect('/listagendamento')->with('message', 'Agendamento Alterado');
        }
        
        $idEvent = $request->input('id');
        $cliente = $request->input('cliente');
        $dataInit = $request->input('data-init');
        $dataFim = $request->input('data-fim');
        $barbeiro = $request->input('barbeiro');
        $servico = $request->input('servico');
        $status = $request->input('status');
        $dtInit = Carbon::create($dataInit);
        $dtFim = Carbon::create($dataFim);

       $updateEvent = DB::table('events')->where('Id', $idEvent)->update(['start' => $dtInit, 'end' => $dtFim, 'barbeiro' => $barbeiro, 'servico' => $servico, 'status' => $status]);
    
        return redirect('/listagendamento')->with('message', 'Agendamento Alterado');

    }

    public function agendamentoCliente(){
        
        $name_user = Auth()->user()->name;

        $agendamento = DB::select('SELECT  * FROM events WHERE  title = "'.$name_user.'" AND status in ("agendado","em atendimento")');
  
        return view('agendamentocliente', compact('agendamento'));

    }

    public function historicoCliente(){
        
        $name_user = Auth()->user()->name;

        $agendamento = DB::select('SELECT  * FROM events WHERE title = "'.$name_user.'" AND status in("cancelado","finalizado")');
  
        return view('historicocliente', compact('agendamento'));

    }

    
}
