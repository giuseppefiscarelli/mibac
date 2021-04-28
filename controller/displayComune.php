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
  $search1a = getParam ('search1a','');                
  $comune = getParam('comune','');
  $codCat = getCodCat($comune);
 
  //$codA = $codCat["codiceComuneAlpha"];
          $params =[
            'orderBy' => $orderBy, 
            'orderDir'=> $orderDir,
            'recordsPerPage' =>$recordsPerPage,
            'search1' => $search1,
            'page' => $page,
            'cod'=> $codCat["codiceComuneAlpha"],
            'comune'=>$comune
          ];

          $orderByParams = $orderByNavigatorParams = $params;
          unset($orderByParams['orderBy']);
          unset($orderByParams['orderDir']);
          unset($orderByNavigatorParams['page']);
          $orderByQueryString = http_build_query($orderByParams,'&amp;');
          $navOrderByQueryString = http_build_query($orderByNavigatorParams,'&amp;');
         
          //var_dump($codCat);
        
          $tab= getTabComuni($params);
          $total = countTabComuni( $params);
          $numPages= ceil($total/$recordsPerPage);
          
            require 'view/comune/comune.php';
          
       