
<?php

session_start();
require_once 'functions.php';

if(isUserLoggedin()){
    
         header('Location: home.php'); 
     
    exit;
}


$bytes= random_bytes(32);
$token = bin2hex($bytes);
$_SESSION['csrf']= $token;



require_once 'view/template/top.php';

?>

  <body>
  <style>
  
  body::after {
  content: "";
  background:  url(images/apollo-e-dafne.jpg);
  background-size: cover;
  opacity: 0.5;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;
  z-index: -1;   
}
  </style>
    <div class="container my-4">
    </div>      
           
  
                  <!-- Modal -->
 
                  <div class="modal fade" tabindex="-1" role="dialog" id="exampleModalLong"  data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                        <div class="row">
                        <img src="images/logo.svg" alt="Ministero della cultura" style="width: 60%;">
                        </div>
                        <div class="row">
                        <h5 class="modal-title">area riservata</h5>
                        </div>
                        
                          
                        </div>
                        <form style="margin-top:40px" action="verify-login.php" method="post">
                        <div class="modal-body">
                       
                              <input type="hidden" name="_csrf" value="<?=$token?>">
                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" class="form-control" id="email" name="email"aria-describedby="emailHelp" placeholder="Inserisci email">
                                  
                                </div>
                                <div class="form-group">
                                  <label for="password">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                              
                                
                          
                        </div>
                        <div class="modal-footer">
                         
                          <button class="btn btn-primary btn-sm" type="submit">Accedi</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
        
        <?php

//var_dump($_SESSION);
if(!empty($_SESSION['message'])){
    
    $message = $_SESSION['message'];
    $alertType ='danger';
    
    require 'view/template/message.php';
    unset($_SESSION['message'],$_SESSION['success']);
  } 
      ?>
     
      
     
   <!-- JS -->
<script src="assets/js/bootstrap-italia.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.js"></script>

<script type="text/javascript">
        $( document ).ready(function() {
            $('#message').delay(3000).fadeOut();
            $('#exampleModalLong').modal('show');

        });
       
</script> 

 
    </body>
</html>