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
        factory(\App\User::class, 5)->create()
            ->each(function ($user){
               $voucherCount = rand(1, 10);

                print "Creating {$voucherCount} Voucher ... \n";
                factory(\App\Voucher::class, $voucherCount)->create(['user_id' => $user->id]);
                sleep(60);

//               for ($i=0; $i <= $voucherCount; $i++){
//                   print "Creating Voucher ... \n";
//                   factory(\App\Voucher::class)->create(['user_id' => $user->id]);
//                   sleep(60);
//               }
            });
    }
}
