
<?php
 //  header('Location: home.php'); 

session_start();
require_once 'functions.php';
/*
if(isUserLoggedin()){
    
         header('Location: home.php'); 
     
    exit;
}
*/
/*
$bytes= random_bytes(32);
$token = bin2hex($bytes);
$_SESSION['csrf']= $token;
*/
require_once 'headerInclude.php';
//require_once 'view/template/top.php';

?>
<style>
.nav-tabs.nav-dark.nav-tabs-vertical .nav-item.show .nav-link, .nav-tabs.nav-dark.nav-tabs-vertical .nav-link.active {
    border-right-color: #ffffff;
    border-bottom: none;
}
.nav-tabs.nav-dark .nav-link:hover {
  color: #ffffff;
}
.nav-tabs.nav-dark .nav-link:hover .icon {
    fill:  #ffffff;
}
</style>
  <body>

<div class="container-fluid">

    <div class="bd-example-tabs">

      <div class="row">
        <div class="col-2 col-md-2" style="background-color: #0066cc;color: white;">
          
          <div class="link-list-wrapper"><ul class="link-list"> <li>
                <h3 class="no_toc" style="color:white;">Beni di Interesse culturale</h3>
              </li></ul></div>
          
            <div class="nav nav-tabs nav-tabs-vertical nav-dark"  id="nav-vertical-tab-bg" role="tablist" aria-orientation="vertical" style="background-color: #0066cc;">
              <a class="nav-link"  href="home.php" > Per Collocazione geografica</a>
              <a class="nav-link"  href="natura.php" >Per Natura</a>
              
              <a class="nav-link disabled" id="nav-vertical-tab-bg3-tab" data-toggle="tab" href="#nav-vertical-tab-bg3" role="tab" aria-controls="nav-vertical-tab-bg3" aria-selected="false">Per Ufficio di Competenza</a>
            
            </div>
            
          </div>
          <div class="col-10 col-md-10">
            <div class="tab-content" id="nav-vertical-tab-bgContent">
              <div class="tab-pane p-3 fade active show" id="nav-vertical-tab-bg1" role="tabpanel" aria-labelledby="nav-vertical-tab-bg1-tab">
              
                <div class="row">
                  <div class="col-12 ">
                    <!--start card-->
                    <div class="card-wrapper">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Introduzione</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                      </div>
                    </div>
                    <!--end card-->
                  </div>
                  <div class="col-12 ">
                    <!--start card-->
                    <div class="card-wrapper">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Finalità</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                      </div>
                    </div>
                    <!--end card-->
                  </div>
                  <div class="col-12 ">
                    <!--start card-->
                    <div class="card-wrapper">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Faq</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                          <p class="font-italic" style="font-size: 14px;">Testo in corsivo.</p>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                          <p class="font-italic" style="font-size: 14px;">Testo in corsivo.</p>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                          <p class="font-italic" style="font-size: 14px;">Testo in corsivo.</p>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                          <p class="font-italic" style="font-size: 14px;">Testo in corsivo.</p>
                        </div>
                      </div>
                    </div>
                    <!--end card-->
                  </div>
                </div>
              
              </div>
              
            </div>
          </div>
        </div>
      </div>

    </div>      
 </div>          
  
                  <!-- Modal -->

      
     
   <!-- JS -->
<script src="assets/js/bootstrap-italia.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.js"></script>



 
    </body>
</html>