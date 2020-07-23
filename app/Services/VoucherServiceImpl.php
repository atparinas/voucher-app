<?php


namespace App\Services;


use App\User;
use App\Voucher;

class VoucherServiceImpl implements Interfaces\VoucherService
{

    public function createVoucher(User $user)
    {
        try {
            $voucherCode = strtoupper(uniqid());

            //Check if the VoucherCode already Exist
            while(Voucher::firstWhere('code', $voucherCode) != null){
                $voucherCode = strtoupper(uniqid());
            }

            return $user->vouchers()->create([
                'code' => $voucherCode,
                'status' => Voucher::VALID
            ]);

        }catch (\Exception $exception){

            return null;
        }
    }
}
