<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 20)->create()
            ->each(function ($user){
               $voucherCount = rand(1, 10);

               factory(\App\Voucher::class, $voucherCount)->create(['user_id' => $user->id]);

            });
    }
}
