<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsActive {

    public function handle(Request $request, Closure $next) {
        if (auth()->check() && !auth()->user()->is_active) {
            auth()->logout();
            return response()->json([
                        'success' => false,
                        'message' => 'Your account has been deactivated.'
                            ], 403);
        }

        return $next($request);
    }

}
