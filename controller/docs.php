<?php
session_start();
require_once '../functions.php';
$action = getParam('action','');
require '../model/chart.php';
$params = $_GET;
switch ($action){
   case 'getCsv':



    $data = $_REQUEST;
    $res = chart1($data);
    header('Content-Type: application/csv; charset=UTF-8');
    header("Content-Disposition: attachment; filename=file.csv");
    $output = fopen("php://output", "w");
    
      foreach ($res as $row):
        fputcsv($output, $row);
        endforeach;

      fclose($output);
      return $output;
    break;


}