<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\FileService;
use App\Services\Interfaces\UserService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    protected $userService;
    protected $fileService;

    public function __construct(UserService $userService, FileService $fileService)
    {
        $this->userService = $userService;
        $this->fileService = $fileService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = $this->userService->getAllUsers();

        return response()->json([
            'data' => $users
        ]);
    }


    public function download()
    {
        $users = $this->userService->getAllUsers();

        $headers = ['id', 'vouchersCount'];

        $file = $this->fileService->exportToCsv($headers, $users);

        if($file == null){
            abort(Response::HTTP_INTERNAL_SERVER_ERROR, "Error Creating File");
        }

        return response()->download($file);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }


}
