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
  $idReg = getParam('idReg');                       

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
          $prov = getParam('prov','');
          $provincia = getCodProv($prov);
          //var_dump($provincia);
          $params =[
              'cod' => $provincia['CPRVCOD']
              
            ];
          
         // $totalUsers= countUsers($params);
         // $numPages= ceil($totalUsers/$recordsPerPage);
         // $users = getUsers($params);
          //var_dump($users);
          if(isUserSuadmin()){
           


            require 'view/provincia/provincia.php';
          }
          if(isUserAdmin()){
           
            


            require 'view/provincia/provincia.php';
          }
          if(isUserUser()){
            require 'view/provincia/provincia.php';

          }
       