<?php


namespace App\Services\Interfaces;


use App\User;

interface VoucherService
{
    public function createVoucher(User $user);
}
