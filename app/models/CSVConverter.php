<?php

class CSVConverter{
    public static function downloadCSV($array){
        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename=\"output.csv\"");
        header("Pragma: no-cache");
        header("Expires: 0");

        $output = fopen("php://output", "w");
        // fputcsv($output, array_keys());
        $headerSet = false;
        foreach ($array as $row) : 
            if($headerSet == false){
                $headerSet = true;
                fputcsv($output, array_keys($row));
            }
            fputcsv($output, $row);
        endforeach;
        fclose($output);
    }

    // public static function CSVToArray(){

    // }
}

?>