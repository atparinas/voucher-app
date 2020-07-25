<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\VoucherCollection;
use App\Http\Resources\VoucherResource;
use App\Services\Interfaces\VoucherService;
use App\User;
use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserVoucherController extends Controller
{

    protected $voucherService;

    public function __construct(VoucherService $voucherService)
    {
        $this->middleware('auth:sanctum');
        $this->voucherService = $voucherService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {

        $userId = Auth::user()->id;

        $vouchers = Voucher::where('user_id', $userId)
                         ->orderBy('created_at', 'desc')
                        ->paginate(5);


        return response()->json(new VoucherCollection($vouchers));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $user = Auth::user();


        if ($user->vouchers->count() >= 10){
            abort(Response::HTTP_BAD_REQUEST, "You already have 10 vouchers. Can't create more");
        }

        $voucher = $this->voucherService->createVoucher($user);

        if($voucher == null){
            abort(Response::HTTP_INTERNAL_SERVER_ERROR, "Error Creating Voucher");
        }

        return response()->json(new VoucherResource($voucher), Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($voucherId)
    {


        $user = Auth::user();

        $deleteResults = $this->voucherService->deleteVoucher($user, $voucherId);

        if(!$deleteResults['success']){

            abort(Response::HTTP_INTERNAL_SERVER_ERROR, $deleteResults['error']);
        }

        return response([],Response::HTTP_NO_CONTENT);

    }

}
