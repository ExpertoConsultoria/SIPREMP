<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Memorandum;
use App\Models\ReporteCM;
use App\Models\User;
use App\Models\Vales_compra;
use stdClass;

class ApiController extends Controller
{
    public function trayAlert($user_id)
    {
        $filtrados = [];

        $user = User::find($user_id);

        if ($user->hasRole('N5:18A:F')) {
            $memorandums = Memorandum::select('memo_fecha', 'memo_folio', 'memo_asunto', 'memo_creation_status', 'solicitante_id')
                ->where('memo_creation_status', 'Enviado')
                ->whereNull('token_aceptacion')
                ->whereNull('motivo_rechazo')
                ->get();

            foreach ($memorandums as $memorandum) {
                if ($memorandum->solicitante->hasAnyRole(['N6:17A', 'N7:GS:17A'])) {
                    array_push($filtrados, $memorandum);
                }
            }

            if (count($filtrados)) {
                return 'Tienes solicitudes pendientes a Revisar';
            }
        } else if ($user->hasRole('N4:SEGE')) {
            $memorandums = Memorandum::select('memo_fecha', 'memo_folio', 'memo_asunto', 'memo_creation_status', 'solicitante_id', 'destinatario')
                ->where('memo_creation_status', 'Validado')
                ->where('pass_filter', 1)
                ->whereNull('token_aceptacion')
                ->whereNull('motivo_rechazo')
                ->get();

            foreach ($memorandums as $memorandum) {
                if ($memorandum->solicitante->hasAnyRole(['N6:17A', 'N7:GS:17A', 'N5:18A:F']) && $memorandum->destinatario === "Servicos Generales") {
                    array_push($filtrados, $memorandum);
                }
            }

            if (count($filtrados)) {
                return 'Tienes solicitudes pendientes a Revisar';
            }
        } else if ($user->hasRole('N3:UNTE')) {

            $vales = Vales_compra::select('fecha', 'folio', 'justificacion', 'creation_status', 'id_usuario')
                ->where('creation_status', 'Enviado')
                ->where('pass_filter', 0)
                ->whereNull('motivo_rechazo')
                ->whereNull('token_disp_ppta')
                ->whereNull('token_autorizacion')
                ->whereNull('token_rev_val')
                ->whereNotNull('token_solicitante')
                ->get();

            foreach ($vales as $vale) {
                if ($vale->solicitante->hasAnyRole(['N6:17A', 'N7:GS:17A', 'N5:18A:F', 'N4:SEGE'])) {
                    array_push($filtrados, $vale);
                }
            }

            if (count($filtrados)) {
                return 'Tienes vales pendientes a Revisar';
            }
        } else if ($user->hasRole('N2:CP')) {

            $vales = Vales_compra::select('fecha', 'folio', 'justificacion', 'creation_status', 'id_usuario')
                ->where('creation_status', 'Validado')
                ->where('pass_filter', 1)
                ->whereNull('motivo_rechazo')
                ->whereNull('token_disp_ppta')
                ->whereNull('token_autorizacion')
                ->whereNotNull('token_rev_val')
                ->whereNotNull('token_solicitante')
                ->get();

            foreach ($vales as $vale) {
                if ($vale->solicitante->hasAnyRole(['N6:17A', 'N7:GS:17A', 'N5:18A:F', 'N4:SEGE'])) {
                    array_push($filtrados, $vale);
                }
            }

            if (count($filtrados)) {
                return 'Tienes vales pendientes a Revisar';
            }
        } else if ($user->hasRole('N1:DA')) {

            $vales = Vales_compra::select('fecha', 'folio', 'justificacion', 'creation_status', 'id_usuario')
                ->where('creation_status', 'Presupuestado')
                ->where('pass_filter', 1)
                ->where('pass_cp', 1)
                ->whereNull('motivo_rechazo')
                ->whereNull('token_autorizacion')
                ->whereNotNull('token_disp_ppta')
                ->whereNotNull('token_rev_val')
                ->whereNotNull('token_solicitante')
                ->get();

            foreach ($vales as $vale) {
                if ($vale->solicitante->hasAnyRole(['N6:17A', 'N7:GS:17A', 'N5:18A:F', 'N4:SEGE'])) {
                    array_push($filtrados, $vale);
                }
            }

            if (count($filtrados)) {
                return 'Tienes vales pendientes a Revisar';
            }
        }
    }

    public function rejectionAlert($user_id)
    {

        $alertsRejected = new stdClass;
        $alertsRejected->folios = [];
        // $alertsRejected->message = '';

        $memorandums = Memorandum::where('solicitante_id', $user_id)
            ->where('memo_creation_status', 'Rechazado')
            ->where('pending_review', 1)
            ->whereNotNull('motivo_rechazo')
            ->whereNull('token_aceptacion')
            ->get();

        if (count($memorandums)) {
            foreach ($memorandums as $memorandum) {
                array_push($alertsRejected->folios, $memorandum->memo_folio);
            }
        }

        return $alertsRejected;

    }

    public function acceptanceAlert($user_id)
    {

        $alertsAccepted = new stdClass;
        $alertsAccepted->folios = [];
        // $alertsAccepted->message = '';

        $memorandums = Memorandum::where('solicitante_id', $user_id)
            ->where('memo_creation_status', 'Validado')
            ->where('pending_review', 1)
            ->whereNull('motivo_rechazo')
            ->whereNull('token_aceptacion')
            ->get();

        if (count($memorandums)) {
            foreach ($memorandums as $memorandum) {
                array_push($alertsAccepted->folios, $memorandum->memo_folio);
            }
        }

        return $alertsAccepted;

    }

    public function approvedAlert($user_id)
    {

        $alertsAccepted = new stdClass;
        $alertsAccepted->folios = [];
        // $alertsAccepted->message = '';

        $memorandums = Memorandum::where('solicitante_id', $user_id)
            ->where('memo_creation_status', 'Aprobado')
            ->where('pending_review', 1)
            ->whereNull('motivo_rechazo')
            ->whereNotNull('token_aceptacion')
            ->get();

        if (count($memorandums)) {
            foreach ($memorandums as $memorandum) {
                array_push($alertsAccepted->folios, $memorandum->memo_folio);
            }
        }

        return $alertsAccepted;

    }

    public function RCMAlert() // Reportes Compra Menor
    {

        $reportsAlert = new stdClass;
        $reportsAlert->folios = [];
        // $reportsAlert->message = '';

        $reports = ReporteCM::where('has_been_sent', 1)
            ->where('pending_review', 1)
            ->get();

        if (count($reports)) {
            foreach ($reports as $report) {
                array_push($reportsAlert->folios, $report->rcm_folio);
            }
        }

        return $reportsAlert;

    }

    public function VMProgressAlert($user_id) // Vale-Memorandum Progress
    {
        $alertsAccepted = new stdClass;
        $alertsAccepted->folios = [];

        $memorandums = Memorandum::where('solicitante_id', $user_id)
            ->where('memo_creation_status', 'Aprobado')
            ->where('pass_filter', 1)
            ->whereNull('motivo_rechazo')
            ->whereNotNull('token_aceptacion')
            ->get();

        if (count($memorandums)) {
            $memoFolios = $memorandums->pluck('memo_folio')->toArray();

            $vales = Vales_compra::whereIn('folio_solicitud', $memoFolios)
                ->where('pending_review', 1)
                ->where('id_usuario', $user_id)
                ->whereNotNull('folio_solicitud')
                ->get();

            if (count($vales)) {
                foreach ($memorandums as $memorandum) {
                    array_push($alertsAccepted->folios, $memorandum->memo_folio);
                }
            }
        }

        return $alertsAccepted;
    }

    public function rejectionAlertVale($user_id)
    {
        $alertsRejected = new stdClass;
        $alertsRejected->folios = [];

        $vales = Vales_compra::where('id_usuario', $user_id)
            ->where('creation_status', 'Rechazado')
            ->where('pending_review', 1)
            ->whereNotNull('motivo_rechazo')
            ->get();

        if (count($vales)) {
            foreach ($vales as $vale) {
                if (isset($vale->folio_solicitud)) {
                    $alertsRejected->folios[] = [
                        'type' => 'folio_solicitud',
                        'value' => $vale->folio_solicitud,
                    ];
                } else {
                    $alertsRejected->folios[] = [
                        'type' => 'folio',
                        'value' => $vale->folio,
                    ];
                }
            }
        }

        return $alertsRejected;
    }

    public function acceptanceAlertUT($user_id)
    {

        $alertsAccepted = new stdClass;
        $alertsAccepted->folios = [];
        // $alertsAccepted->message = '';

        $vales = Vales_compra::where('id_usuario', $user_id)
            ->where('creation_status', 'Validado')
            ->where('pass_filter', 1)
            ->where('pending_review', 1)
            ->whereNotNull('token_solicitante')
            ->whereNotNull('token_rev_val')
            ->whereNull('token_disp_ppta')
            ->whereNull('token_autorizacion')
            ->get();

        if (count($vales)) {
            foreach ($vales as $vale) {
                array_push($alertsAccepted->folios, $vale->folio);
            }
        }

        return $alertsAccepted;

    }

    public function acceptanceAlertCP($user_id)
    {

        $alertsAccepted = new stdClass;
        $alertsAccepted->folios = [];
        // $alertsAccepted->message = '';

        $vales = Vales_compra::where('id_usuario', $user_id)
            ->where('creation_status', 'Presupuestado')
            ->where('pass_cp', 1)
            ->where('pass_filter', 1)
            ->where('pending_review', 1)
            ->whereNotNull('token_solicitante')
            ->whereNotNull('token_rev_val')
            ->whereNotNull('token_disp_ppta')
            ->whereNull('token_autorizacion')
            ->get();

        if (count($vales)) {
            foreach ($vales as $vale) {
                array_push($alertsAccepted->folios, $vale->folio);
            }
        }

        return $alertsAccepted;

    }

    public function acceptanceAlertDA($user_id)
    {

        $alertsAccepted = new stdClass;
        $alertsAccepted->folios = [];
        // $alertsAccepted->message = '';

        $vales = Vales_compra::where('id_usuario', $user_id)
            ->where('creation_status', 'Aprobado')
            ->where('pass_cp', 1)
            ->where('pass_filter', 1)
            ->where('pending_review', 1)
            ->whereNotNull('token_solicitante')
            ->whereNotNull('token_rev_val')
            ->whereNotNull('token_disp_ppta')
            ->whereNotNull('token_autorizacion')
            ->get();

        if (count($vales)) {
            foreach ($vales as $vale) {
                array_push($alertsAccepted->folios, $vale->folio);
            }
        }

        return $alertsAccepted;

    }

}
