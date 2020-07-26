<?php


namespace App\Services\Interfaces;


interface FileService
{
    public function exportToCsv($headers, $collections);
}
