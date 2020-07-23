<?php

namespace Tests\Feature;

use App\Services\VoucherServiceImpl;
use App\User;
use App\Voucher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VoucherServiceTest extends TestCase
{
    use RefreshDatabase;


    public function testCanCreateVoucher()
    {
        $user = factory(User::class)->create();

        $voucherService = new VoucherServiceImpl();

        $voucher = $voucherService->createVoucher($user);

        dd($voucher);

        $this->assertInstanceOf(Voucher::class, $voucher);

    }



}
