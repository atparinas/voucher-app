<?php

namespace Tests\Feature;

use App\Services\FileServiceImpl;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FileServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testCanProduceCSV()
    {

        $users = factory(User::class, 5)->create();
        $headers = ['id', 'name'];

        $fileService = new FileServiceImpl();

        $data = $fileService->exportToCsv($headers, $users);

        dd($data);

    }
}
