<?php

namespace App\Http\Controllers;

use App\Models\Org4Empleado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $databaseName = DB::connection()->getDatabaseName() == 'simpeo' ? 'Producción' : 'Testing';

        $info['UserName'] = $user->name;

        $empleado = $user->org4empleado;
        if($empleado)
            $info['Empleado'] = $user->org4empleado->Nombre.' '.$user->org4empleado->ApellidoPaterno.' '.$user->org4empleado->ApellidoMaterno;
        else
            $info['Empleado'] = 'N/D';


        if(!empty($user->org4empleado->org3Puesto))
            $info['Puesto'] = $user->org4empleado->org3Puesto->Puesto;
        else
            $info['Puesto'] = 'N/D';

        if(!empty($user->org4empleado->org3Puesto->org2Area))
           $info['Area'] = $user->org4empleado->org3Puesto->org2Area->AreaNombre;
        else
            $info['Area'] = 'N/D';

        if(!empty($user->org4empleado->org3Puesto->org2Area->org1Sede))
            $info['Sede'] = $user->org4empleado->org3Puesto->org2Area->org1Sede->SedeNombre;
        else
            $info['Sede'] ='N/D';

        $info['databaseName'] = $databaseName;

        return view('dashboard', compact('info'));
    }

}
