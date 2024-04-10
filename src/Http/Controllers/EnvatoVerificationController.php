<?php

namespace Laltu\LaravelEnvato\Http\Controllers;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Session;
use Laltu\LaravelEnvato\Facades\LaravelEnvato;

class EnvatoVerificationController
{
    public function index()
    {
        return inertia('Verification');
    }

    public function verify(Request $request)
    {
        $verificationResult = LaravelEnvato::envato()->verify($request->purchase_code);

        if ($verificationResult->isVerified()) {
            // Successful verification
            // Store purchase code (securely, ideally in the database)
            Session::flash('success', 'Envato purchase key verified successfully!');
            return redirect()->route('dashboard'); // Or any relevant route
        } else {
            // Failed verification
            Session::flash('error', 'Invalid Envato purchase key.');
            return redirect()->back()->withInput();
        }
    }
}
