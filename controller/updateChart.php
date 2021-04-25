<?php
session_start();
require_once '../functions.php';
$action = getParam('action','');
require '../model/chart.php';
$params = $_GET;
switch ($action){
    
    case 'getChart1':
      $data = $_REQUEST;
      $res = chart1($data);
      echo json_encode($res);
    break; 
    
    case 'getCsv':
      $data = $_REQUEST;
      $res = chart1($data);
      echo json_encode($res);
    break; 
    case 'getChart3':
      $data = $_REQUEST;
      $res = chart3($data);
      echo json_encode($res);
    break; 

    case 'getTrend1':
      $data = $_REQUEST;
      $res = getTrend($data);
      echo json_encode($res);
    break;
    case 'getChartreg':
        $data = $_REQUEST;
        
       
       
        $res = chartreg($data);
        echo json_encode($res);
      break; 
      case 'getChartprov':
        $data = $_REQUEST;
        
       
       
        $res = chartprov($data);
        echo json_encode($res);
      break; 

      case 'datatable':
        $res=getTabComuni(03016124);
        $json['data'] = $res;
        echo json_encode($json);
      break;

      case 'getNatura':
        $tipo = $_REQUEST['tipo'];
        $res=getNatura($tipo);

        echo json_encode($res);
      break;  
}