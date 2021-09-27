<?php

//var_dump($_SESSION);
if(!empty($_SESSION['message'])){
 
    $message = $_SESSION['message'];
    $alertType = $_SESSION['loggedin'] ? 'success':'danger';
    
    require 'view/template/message.php';
    unset($_SESSION['message'],$_SESSION['success']);
  }
  $reg = getParam('reg','');
  $regione = getCodReg($reg);
         
  if($regione['id'] < 10){
    $regione['id'] ='0'.$regione['id'];
  };
  $orderDir = getParam('orderDir', 'DESC');
  $orderBy = getParam('orderBy', 'id_bene');
  $recordsPerPage = getParam('recordsPerPage', getConfig('recordsPerPage'));
  $recordsPerPageOptions = getConfig ('recordsPerPageOptions',[5,10,15,20,50]);
  $search2 = getParam ('search2','1990-01');
  $search3 = getParam ('search3',date("Y-m"));                       
  $params =[
    'orderBy' => $orderBy, 
    'orderDir'=> $orderDir,
    'recordsPerPage' =>$recordsPerPage,
    'search1' => $search1,
    'search2' => $search2,
    'search3' => $search3,
    'page' => $page,
    'cod'=> $regione['id'],
    'reg' => $reg
    
  ];
  //$codA = $codCat["codiceComuneAlpha"];
          
        
          $orderByParams = $orderByNavigatorParams = $params;
          unset($orderByParams['orderBy']);
          unset($orderByParams['orderDir']);
          unset($orderByNavigatorParams['page']);
          $orderByQueryString = http_build_query($orderByParams,'&amp;');
          $navOrderByQueryString = http_build_query($orderByNavigatorParams,'&amp;');
         
          
          
       
          $tab = getTabRegioni($params);
          $total = countTabRegioni( $params);
          $numPages= ceil($total/$recordsPerPage);
        
        
           


            require 'view/regione/regione.php';
          