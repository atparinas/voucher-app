<?php


namespace App\Services;


class FileServiceImpl implements Interfaces\FileService
{

    public function exportToCsv($headers, $collections)
    {
        try {

            $data = $this->collectionToCsv($headers, $collections);


            $fileName = time() . ".csv";
            $csvFile = storage_path('app/csv/'. $fileName);
            $handle = fopen($csvFile, 'w') or die('Cannot open file:  '. $csvFile);

            fwrite($handle, $data);
            fclose($handle);

            return $csvFile;

        }catch (\Exception $exception){

            return null;
        }

    }

    private function collectionToCsv($headers, $collections){
        $data = '';

        foreach ($headers as $header){
            $data .= $header . ",";
        }

        $data .= "\n";

        foreach ($collections as $object){

            foreach ($headers as $header){
                $data .= $object->{$header} . ",";
            }

            $data .= "\n";
        }

        return $data;
    }
}
