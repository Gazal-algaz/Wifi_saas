<?php
namespace App\Payment;

interface GatewayInterface {
    public function pay($amount);
}
