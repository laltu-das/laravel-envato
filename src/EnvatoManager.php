<?php

namespace Laltu\LaravelEnvato;

class EnvatoManager
{
    public function validateEnvatoPurchase($purchaseKey) {
        return true;
    }

    public function checkInstall()
    {
        return false;
    }

    public function verify()
    {
        return false;
    }
}
