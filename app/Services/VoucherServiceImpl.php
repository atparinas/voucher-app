<?php


namespace App\Services;


use App\User;
use App\Voucher;
use Illuminate\Support\Facades\DB;

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


    public function deleteVoucher(User $user, $voucherId)
    {
        try {

            // Use the relationship for querying the voucher to ensure that
            // the voucher ID passed in the parameter belongs to the correct User
            $voucher = $user->vouchers()->where('id', $voucherId)->first();

            $voucher->delete();

            return [
                'success' => true
            ];

        }catch (\Exception $exception){

            return [
                'success' => false,
                'error' => $exception
            ];

        }
    }

    public function getVoucherCountPerMinute()
    {
        return DB::select("select
                from_unixtime(round(unix_timestamp(vouchers.created_at) /60) * 60) as createdDate,
                count(id) as numberOfVouchers
                from vouchers
                group by
                createdDate
                order by createdDate asc");
    }
}
