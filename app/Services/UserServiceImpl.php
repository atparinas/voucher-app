<?php


namespace App\Services;


use Illuminate\Support\Facades\DB;

class UserServiceImpl implements Interfaces\UserService
{

    public function getAllUsers()
    {
        return DB::select("SELECT users.name,  count(vouchers.code) as vouchersCount
                            FROM users
                            LEFT JOIN vouchers on vouchers.user_id = users.id
                            group by users.name");
    }
}
