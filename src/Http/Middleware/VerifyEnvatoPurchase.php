<?php

namespace Laltu\LaravelEnvato\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laltu\LaravelEnvato\Facades\LaravelEnvato;

class VerifyEnvatoPurchase
{
    public function handle(Request $request, Closure $next)
    {
        // 1. Retrieve Envato purchase key (e.g., from database, config, or user input)
        $purchaseKey = config('app.envato_purchase_key'); // Adjust how you fetch the key
//dd('k');
        // 2. Validate the purchase key (you'll need an Envato API client implementation)
        if (!LaravelEnvato::validateEnvatoPurchase($purchaseKey)) {
            // Handle invalid purchase key (e.g., redirect to purchase form, show error)
            return redirect()->route('envato.verify')->with('error', 'Invalid Envato purchase key.');
        }

        return $next($request);
    }
}
