<?php

namespace App\Listeners;

use App\Mail\WelcomeEmail;
use App\Services\Interfaces\VoucherService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RewardVoucher
{

    protected $voucherService;

    /**
     * Create the event listener.
     *
     * @param VoucherService $voucherService
     */
    public function __construct(VoucherService $voucherService)
    {
        $this->voucherService = $voucherService;
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $voucher = $this->voucherService->createVoucher($event->user);

        if($voucher !== null){

            try {

                Mail::to($event->user)->send(new WelcomeEmail($voucher));

            }catch (\Exception $exception){

                Log::error($exception);
            }


        }
    }
}
