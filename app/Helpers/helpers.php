<?php
// @Depinazul
namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Helper
{

    // We use this Helper to format the IDs of our documents.

    // public static function FolioGenerator($model, $trow, $length = 4, $prefix, $branchKey){

    //     $data = $model::orderBy($trow,'desc')->first(); //Get the last Record

    //     if(!$data){
    //         $folio_length = $length-1;
    //         $last_folio = '1';
    //     }else{

    //         $prefixLength = 7 + strlen($prefix) + strlen($branchKey);
    //         $suffixLength = -5; // -20XX

    //         $code = substr($data->$trow, $prefixLength,$suffixLength); //Get the last code, WITHOUT all the code extra
    //         $code = intval($code);
    //         $actual_last_number = ($code*1)/1; // Delete the 0 in the Code
    //         $increment_last_number = $actual_last_number + 1;
    //         $last_number_length = strlen($increment_last_number);

    //         $folio_length = $length - $last_number_length;
    //         $last_folio = $increment_last_number;
    //     }

    //     $zeros = '';
    //     for ($i=0; $i < $folio_length; $i++) {
    //         $zeros .= '0';
    //     }

    //     $actualYear = date("Y");

    //          // MPEO-CM-SUC1-000000-2023
    //     return 'MPEO-'.$prefix.'-'.$branchKey.'-'.$zeros.$last_folio.'-'.$actualYear;
    // }

    public static function FolioGenerator($model, $trow, $length = 4, $prefix, $branchKey) {
        // Obtener el último ID de la base de datos
        $lastId = $model::orderBy('id', 'desc')->value('id');

        // Si no hay registros, establecer el ID inicial en 1
        if (!$lastId) {
            $incrementedNumber = 1;
        } else {
            // Incrementar el último ID en 1
            $incrementedNumber = $lastId + 1;
        }

        // Asegurarse de que el número de folio tenga una longitud máxima de 5 dígitos con ceros a la izquierda
        $formattedNumber = str_pad($incrementedNumber, 5, '0', STR_PAD_LEFT);

        // Obtener el año actual
        $actualYear = date("Y");

        // Generar el folio único
        $folio = 'MPEO-' . $prefix . '-' . $branchKey . '-' . $formattedNumber . '-' . $actualYear;

        return $folio;
    }

    public static function GetUserArea()
    {
        $area = Auth::user()?->org4empleado?->org3Puesto?->org2Area ? Auth::user()?->org4empleado?->org3Puesto?->org2Area : 'Sin Cargo';
        return $area;
    }

    public static function FakeFolioGenerator($length, $prefix){
        $random_folio = Str::random($length);
        $random_folio = strtoupper($random_folio);
        return '&' . $prefix . '-' . $random_folio;
    }

    public static function GetUserSede(){
        $sede = Auth::user()?->org4empleado?->org3Puesto?->org2Area?->org1Sede ? Auth::user()?->org4empleado?->org3Puesto?->org2Area?->org1Sede : 'ND';
        return $sede;
    }

    public static function GetSpecificUserSede($user){
        $sede = $user?->org4empleado?->org3Puesto?->org2Area?->org1Sede ? Auth::user()?->org4empleado?->org3Puesto?->org2Area?->org1Sede : 'ND';
        return $sede;
    }

}
