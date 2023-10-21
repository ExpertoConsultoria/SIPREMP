<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use stdClass;

use App\Models\Memorandum;
use App\Models\User;


class ApiController extends Controller
{
    public function trayAlert($role){
        if($role === 'N5:18A:F'){

            $filtrados = [];

            $memorandums = Memorandum::select('memo_fecha','memo_folio','memo_asunto','memo_creation_status','solicitante_id')
                ->where('memo_creation_status','Enviado')
                ->whereNull('token_aceptacion')
                ->whereNull('motivo_rechazo')
                ->get();

            foreach ($memorandums as $memorandum) {
                if($memorandum->solicitante->roles[0]->name === 'N7:GS:17A' || $memorandum->solicitante->roles[0]->name === 'N6:17A'){
                    array_push($filtrados, $memorandum);
                }
            }

            if(count($filtrados)){
                return 'Tienes solicitudes pendientes a Revisar';
            }

        }
    }

    public function rejectionAlert($user_id){

        $alertsRejected = new stdClass;
        $alertsRejected->folios = [];
        // $alertsRejected->message = '';

        $memorandums = Memorandum::where('solicitante_id',$user_id)
                        ->where('memo_creation_status','Rechazado')
                        ->where('pending_review',1)
                        ->whereNotNull('motivo_rechazo')
                        ->whereNull('token_aceptacion')
                        ->get();

        if(count($memorandums)){
            foreach ($memorandums as $memorandum) {
                array_push($alertsRejected->folios,$memorandum->memo_folio);
            }
        }

        return $alertsRejected;

    }

    public function acceptanceAlert($user_id){

        $alertsAccepted = new stdClass;
        $alertsAccepted->folios = [];
        // $alertsAccepted->message = '';

        $memorandums = Memorandum::where('solicitante_id',$user_id)
                        ->where('memo_creation_status','Validado')
                        ->where('pending_review',1)
                        ->whereNull('motivo_rechazo')
                        ->whereNull('token_aceptacion')
                        ->get();

        if(count($memorandums)){
            foreach ($memorandums as $memorandum) {
                array_push($alertsAccepted->folios,$memorandum->memo_folio);
            }
        }

        return $alertsAccepted;

    }

    public function approvedAlert($user_id){

        $alertsAccepted = new stdClass;
        $alertsAccepted->folios = [];
        // $alertsAccepted->message = '';

        $memorandums = Memorandum::where('solicitante_id',$user_id)
                        ->where('memo_creation_status','Aprobado')
                        ->where('pending_review',1)
                        ->whereNull('motivo_rechazo')
                        ->whereNotNull('token_aceptacion')
                        ->get();

        if(count($memorandums)){
            foreach ($memorandums as $memorandum) {
                array_push($alertsAccepted->folios,$memorandum->memo_folio);
            }
        }

        return $alertsAccepted;

    }
}
