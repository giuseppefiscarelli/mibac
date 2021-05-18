<body class="affix-parent">
   <div class="it-header-center-wrapper ">
        <div class="container-fluid" style="    margin-top: -36px;">
          <div class="row">
            <div class="col-12 position-static">
              <div class="it-header-center-content-wrapper">
                <div class="it-brand-wrapper pl-0">
                  <a href="#" class="">
                    <img src="images/mibac.png" alt="Home" style="width: 148px;">
                    <div class="it-brand-text" style="margin-left:24px;">
                      <h2 class="no_toc" style="font-size: 35px;
                                                font-family: sans-serif;">Sistema Informativo Beni Tutelati</h2>
                      <h3 class="no_toc d-none d-md-block" style="font-size: 0.75em!important;">DIREZIONE GENERALE ARCHEOLOGIA, BELLE ARTI E PAESAGGIO</h3>
                    </div>
                    <div class="it-brand-text" style="margin-left:50px;">
                      <h2 class="no_toc">SITO DI FRUIZIONE</h2>
                    </div>
                  </a>
                 
                </div>
<?php
if (isUserLoggedin()){?>
                <div class="it-header-slim-right-zone">      
                  <div class="nav-item dropdown">
                  <button type="button" class="btn btn-prymary dropdown-toggle" style="background-color: #e6e6e6 !important;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span><?=$_SESSION['userData']['nome']." ".$_SESSION['userData']['email']?></span>
                    
                  </button>
                   
                    <div class="dropdown-menu">
                      <div class="row">
                          <div class="col-12">
                            <div class="link-list-wrapper">
                                <ul class="link-list">
                              
                              
                                <li onclick="logout.submit();">
                                    <form id="logout" class="form" role="form" method="post" action="verify-login.php">
                                        <input type="hidden" name="action" value="logout">
                                        <a class="list-item" href="#"><span>Logout</span></a>
                                                
                                    </form>
                                </li>
                                </ul>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
<?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>


<!--
      <div class="it-header-wrapper fixed-top">
          <div class="it-nav-wrapper">
              <div class="row mx-0">              
                  <div class="col px-0">
                      <div class="it-header-center-wrapper it-small-header pl-0" style="height: 75px;">
                          <div class="container-fluid">
                              <div class="row">
                                  <div class="col-12 px-0"> 
                                      <div class="it-header-center-content-wrapper">
                                          <div class="it-brand-wrapper">
                                                  <img id="ctl00_imageLogo" class="icon" src="./images/mibac.png" alt="MiC" style="margin-top: 10px;">
                                                  <div class="it-brand-text">
                                                      <h2 class="no_toc main-logo">
                                                          <span id="ctl00_lblLogo">Sistema Informativo Beni Tutelati</span></h2>
                                                      <h3 class="no_toc d-none d-lg-block ivam-logo-subtitle">
                                                          <span id="ctl00_lblLogoMini">DIREZIONE GENERALE ARCHEOLOGIA, BELLE ARTI E PAESAGGIO</span></h3>
                                                  </div>
                                              </a>
                                          </div>
                                          <div class="it-right-zone">
                                              <div class="it-search-wrapper">
                                                  <span class="d-none d-md-block text-right"><b class="d-none d-lg-block">
                                                      <span id="ctl00_lblNomeUtente">BRUNI RAFFAELLA</span></b>
                                                      <span id="ctl00_lblRuolo">COMUNE DI PINCOPALLO<br>Utente esterno Scrittura (VIC, Alienazione, GesMo, Funzioni Generali)</span>
                                                      <div id="ctl00_pnlLogout">

                                                          <a href="http://localhost:49390/FE/actLogout.aspx" class="d-block">Logout</a>
                                                      
                                                      </div>
                                                  </span>
                                                  <a id="ctl00_hplOmino" class="search-link rounded-icon" aria-label="Account" title="Scelta ruolo" href="http://localhost:49390/FE/actOmino.aspx"><svg class="icon">
                                                          <use xlink:href="/svg/sprite.svg#it-user"></use></svg></a>
                                                  
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="it-header-navbar-wrapper">
                          
                      </div>
                  </div>
              </div>
          </div>
      </div>
-->


<style>
  .nav-tabs.nav-dark .nav-item.show .nav-link, .nav-tabs.nav-dark .nav-link.active {
      background-color: #e6e6e6;
      color: #000000;
      border-bottom: 2px solid #00fff7;
  }

  .bootstrap-select-wrapper>label {
   
    color: #e3e4e6;
    
}
label {
   
    color: #e6e6e6;
}
</style>






























<!--
      <div class="header-flag container-fluid d-print-none">
        <div class="row">
          <div class="col-4 bg-success pt-1"></div>
          <div class="col-4 neutral-1-bg-a1 pt-1"></div>
          <div class="col-4 bg-danger pt-1"></div>
        </div>
      </div>
      <div class="it-header-center-wrapper it-small-header" style="height:40px;">
        <div class="container">
          <div class="row">
            <div class="col-12">
              
                  
                    <div class="it-brand-text">
                      <h3 class="no_toc" style="color:white;text-align:center;">BENI TUTELEATI - Sito di Fruizione</h3>
                    
                    </div>
            
            </div>
          </div>
        </div>
      </div>
      <div class="header-flag container-fluid d-print-none">
        <div class="row">
          <div class="col-4 bg-success pt-1"></div>
          <div class="col-4 neutral-1-bg-a1 pt-1"></div>
          <div class="col-4 bg-danger pt-1"></div>
        </div>
      </div>
      -->
  <!-- Modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModalLong">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Accedi ad area riservata</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <svg class="icon">
              <use xlink:href="svg/sprite.svg#it-close"></use>
          </svg>
        </button>
      </div>
      <form style="margin-top:40px" action="verify-login.php" method="post">
      <div class="modal-body">
      
            <input type="hidden" name="_csrf" value="<?=$token?>">
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="email" name="email"aria-describedby="emailHelp" placeholder="Inserisci email">
                <small id="emailHelp" class="form-text text-muted">PEC utilizzata per la richiesta.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>
            
              
        
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-primary btn-sm" type="button" data-dismiss="modal">Annulla</button>
        <button class="btn btn-primary btn-sm" type="submit">Accedi</button>
      </div>
      </form>
    </div>
  </div>
</div>
        