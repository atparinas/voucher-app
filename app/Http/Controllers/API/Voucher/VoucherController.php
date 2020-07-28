<?php

namespace App\Http\Controllers\API\Voucher;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\VoucherService;
use Illuminate\Http\Request;

class VoucherController extends Controller
{

    protected $voucherService;

    public function __construct(VoucherService $voucherService)
    {
        $this->middleware('auth:admin');
        $this->voucherService = $voucherService;
    }

    public function graphs()
    {
        $graphData = $this->voucherService->getVoucherCountPerMinute();

        return response()->json(['data' => $graphData]);

    }

}
