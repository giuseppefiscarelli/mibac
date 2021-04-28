<?php

//var_dump($_SESSION);
if(!empty($_SESSION['message'])){
 
    $message = $_SESSION['message'];
    $alertType = $_SESSION['loggedin'] ? 'success':'danger';
    
    require 'view/template/message.php';
    unset($_SESSION['message'],$_SESSION['success']);
  }
  $orderDir = getParam('orderDir', 'DESC');
  $orderBy = getParam('orderBy', 'id_bene');
  $recordsPerPage = getParam('recordsPerPage', getConfig('recordsPerPage'));
  $recordsPerPageOptions = getConfig ('recordsPerPageOptions',[5,10,15,20,50]);
  $roletype = getConfig ('roletype'.'');
  //$ambMenu = getAmbiente();
  $search1 = getParam ('search1','');
  $page =getParam ('page',1);
  $search2 = getParam ('search2','');
  $search3 = getParam ('search3',''); 
  $nat = getParam('nat','');   
  $natura = getCodNat($nat);                   

          $params =[ 
            'orderBy' => $orderBy, 
            'orderDir'=> $orderDir,
            'recordsPerPage' =>$recordsPerPage,
            'search1' => $search1,
            'search2' => $search2,
            'search3' => $search3,
            'page' => $page,
            'nat'=>$nat,
            'cod'=> $natura['id_natura']
          ];

          $orderByParams = $orderByNavigatorParams = $params;
          unset($orderByParams['orderBy']);
          unset($orderByParams['orderDir']);
          unset($orderByNavigatorParams['page']);
          $orderByQueryString = http_build_query($orderByParams,'&amp;');
          $navOrderByQueryString = http_build_query($orderByNavigatorParams,'&amp;');
          $tab= getTabNatura($params);
          $total = countTabNatura( $params);
          $numPages= ceil($total/$recordsPerPage);
         
        
            require 'view/natura/natura.php';
          
      