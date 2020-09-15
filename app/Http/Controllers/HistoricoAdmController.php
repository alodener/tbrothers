<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use DB;

class HistoricoAdmController extends Controller
{
    //Iniciar tela
    public function iniciar(){

        $id_user = Auth()->user()->id;

        $agendamento = DB::select('SELECT  * FROM events WHERE status = "cancelado" OR status = "finalizado"');
  
        return view('historicoadm', compact('agendamento'));

    }
}
