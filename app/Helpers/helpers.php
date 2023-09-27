<?php
// @Depinazul
namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class Helper {

    // We use this Helper to format the IDs of our documents.

    public static function FolioGenerator($model, $trow, $length = 4, $prefix){

        $data = $model::orderBy($trow,'desc')->first(); //Get the last Record

        if(!$data){
            $folio_length = $length-1;
            $last_folio = '1';
        }else{
            $code = substr($data->trow, strlen($prefix)+1); //Get the last code, WITHOUT the prefix
            $code = intval($code);
            $actual_last_number = ($code*1)/1; // Delete the 0 in the Code
            $increment_last_number = $actual_last_number + 1;
            $last_number_length = strlen($increment_last_number);

            $folio_length = $length - $last_number_length;
            $last_folio = $increment_last_number;
        }

        $zeros = '';
        for ($i=0; $i < $folio_length; $i++) {
            $zeros .= '0';
        }

        return $prefix.'-'.$zeros.$last_folio;
    }

    public static function GetUserSede(){
        $sede = Auth::user()?->org4empleado?->org3Puesto?->org2Area?->org1Sede ? Auth::user()?->org4empleado?->org3Puesto?->org2Area?->org1Sede : 'N/D';
        return $sede;
    }

}

?>
