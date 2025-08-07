<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class HealthController extends Controller {

    public function check(): JsonResponse {
        $health = [
            'status' => 'ok',
            'timestamp' => now()->toISOString(),
            'services' => []
        ];

        // Check database
        try {
            DB::connection()->getPdo();
            $health['services']['database'] = 'ok';
        } catch (\Exception $e) {
            $health['services']['database'] = 'error';
            $health['status'] = 'error';
        }

        // Check cache
        try {
            Cache::put('health_check', true, 1);
            $health['services']['cache'] = Cache::get('health_check') ? 'ok' : 'error';
        } catch (\Exception $e) {
            $health['services']['cache'] = 'error';
            $health['status'] = 'error';
        }

        return response()->json($health, $health['status'] === 'ok' ? 200 : 503);
    }

}
