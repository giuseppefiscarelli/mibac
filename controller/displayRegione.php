<?php

//var_dump($_SESSION);
if(!empty($_SESSION['message'])){
 
    $message = $_SESSION['message'];
    $alertType = $_SESSION['loggedin'] ? 'success':'danger';
    
    require 'view/template/message.php';
    unset($_SESSION['message'],$_SESSION['success']);
  }
  $search2 = getParam ('search2','1990-01');
  $search3 = getParam ('search3',date("Y-m"));                       

          $params =[
            'orderBy' => $orderBy, 
            'orderDir'=> $orderDir,
            'recordsPerPage' =>$recordsPerPage,
            'search1' => $search1,
            'search2' => $search2,
            'search3' => $search3,
            'page' => $page
          ];

          $orderByParams = $orderByNavigatorParams = $params;
          unset($orderByParams['orderBy']);
          unset($orderByParams['orderDir']);
          unset($orderByNavigatorParams['page']);
          $orderByQueryString = http_build_query($orderByParams,'&amp;');
          $navOrderByQueryString = http_build_query($orderByNavigatorParams,'&amp;');
          $reg = getParam('reg','');
          $regione = getCodReg($reg);
          //var_dump($regione['id']);
          $params =[
              'cod' => $regione['id']
              
            ];
          
         // $totalUsers= countUsers($params);
         // $numPages= ceil($totalUsers/$recordsPerPage);
         // $users = getUsers($params);
          //var_dump($users);
          if(isUserSuadmin()){
           


            require 'view/regione/regione.php';
          }
          if(isUserAdmin()){
           
            


            require 'view/regione/regione.php';
          }
          if(isUserUser()){
            require 'view/regione/regione.php';

          }
       