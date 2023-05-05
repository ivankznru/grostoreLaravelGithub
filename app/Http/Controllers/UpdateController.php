<?php

namespace App\Http\Controllers;

use DB;

class UpdateController extends Controller
{
    # init update 
    public function init()
    {
        return view('update.init');
    }

    # update complete
    public function complete()
    {
        // v2.0.0
        if (env('APP_VERSION') == 'v1.0.0' || env('APP_VERSION') == 'v1.5.0' || env('APP_VERSION') == 'v1.5.1') {
            try {
                $sql_path = base_path('alterQueries/v200.sql');
                DB::unprepared(file_get_contents($sql_path));
                writeToEnvFile('APP_VERSION', 'v2.0.0');
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        // v2.1.0
        if (env('APP_VERSION') == 'v2.0.0') {
            try {
                writeToEnvFile('APP_VERSION', 'v2.1.0');
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        cacheClear();
        $oldRouteServiceProvider        = base_path('app/Providers/RouteServiceProvider.php');
        $setupRouteServiceProvider      = base_path('app/Providers/SetupServiceComplete.php');
        copy($setupRouteServiceProvider, $oldRouteServiceProvider);
        return view('update.complete');
    }
}
