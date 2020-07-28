<?php


namespace App\Services\Interfaces;


use App\User;

interface VoucherService
{
    public function createVoucher(User $user);

    public function deleteVoucher(User $user, $voucherId);

    public function getVoucherCountPerMinute();
}
