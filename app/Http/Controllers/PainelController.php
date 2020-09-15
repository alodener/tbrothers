<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PainelController extends Controller
{
    //
    public function agendamentoPainel(){

        $agendado = DB::select('SELECT  COUNT(*) AS CONTA FROM events WHERE status = "agendado"');
        $andamento = DB::select('SELECT COUNT(*) AS CONTA FROM events WHERE status = "em andamento"');
        $finalizado = DB::select('SELECT  COUNT(*) AS CONTA FROM events WHERE status = "finalizado"');
        $cancelado = DB::select('SELECT  COUNT(*) AS CONTA  FROM events WHERE status = "cancelado"');
        return view('painel', compact('agendado','andamento','finalizado','cancelado'));
    }
}
