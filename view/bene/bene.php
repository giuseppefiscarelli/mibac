


<div class="bd-example-tabs">
  <div class="row">
  <div class="col-2 col-md-2" style="background-color: #0066cc;color: white;">
      <div class="link-list-wrapper"><ul class="link-list"> <li>
          <h3 class="no_toc" style="color:white;font-size:14px;">Beni di Interesse culturale</h3>
        </li></ul></div>
      <div class="nav nav-tabs nav-tabs-vertical nav-dark" id="nav-vertical-tab-bg" role="tablist" aria-orientation="vertical" style="font-size:14px;">
       <a class="nav-link" style="text-align: right;" href="javascript: history.back()" ><svg class="icon"><use xlink:href="svg/sprite.svg#it-chevron-left"></use></svg> Indietro</a>
   <!--       <a class="nav-link" style="text-align: right;" href="provincia.php?prov=<?=$desprov?>&idReg=<?=$regione?>&search1=<?=$search1??''?>&search2=<?=$search2??''?>&search3=<?=$search3??''?>" ><svg class="icon"><use xlink:href="svg/sprite.svg#it-chevron-left"></use></svg> Torna alla Provincia di <?=$desprov?></a>
-->
        <a class="nav-link"  href="home.php" style="text-align: right;"><svg class="icon"><use xlink:href="svg/sprite.svg#it-burger"></use></svg> Torna alla Pagina Principale</a>
        <a class="nav-link"  href="index.php" style="text-align: right;"><svg class="icon"><use xlink:href="svg/sprite.svg#it-pa"></use></svg> Torna alla Home Page</a>
 
 
       
      </div><!--
      <hr>
                <div class="link-list-wrapper">
                <ul class="link-list"> 
                    <li>
                    <h3 class="no_toc" style="color:white;">Filtri</h3>
                    </li>
                    <li>
                        <div class="bootstrap-select-wrapper" style="margin-top: 30px;padding: 0px 30px 0px 30px;">
                            <label>Tipo Bene</label>
                            <select title="Scegli una opzione" id="search1" name="search1" class="form-control">
                                    <option value="" <?=$search1==null?'selected':''?>>Tutti</option>
                                    <option value="M" <?=$search1=='M'?'selected':''?>>Mobile</option>
                                    <option value="I" <?=$search1=='I'?'selected':''?>>Immobile</option>
                                </select>
                        </div>
                    </li>
                    <li><div class="it-datepicker-wrapper"  style="margin-top: 30px;padding: 0px 30px 0px 30px;margin-bottom: -30px;">
                            <div class="form-group">
                                <input class="form-control it-date-datepicker" id="date1" type="month"value="<?=$search2?>"placeholder="inserisci la data in formato gg/mm/aaaa" style="font-size: 0.75rem;">
                                <label for="date1">Periodo DA</label>
                            </div>
                        </div>
                    </li>
                    <li><div class="it-datepicker-wrapper"  style="padding: 0px 30px 0px 30px;">
                            <div class="form-group">
                                <input class="form-control it-date-datepicker" id="date2" type="month" value="<?=$search3?>"placeholder="inserisci la data in formato gg/mm/aaaa" style="font-size: 0.75rem;">
                                <label for="date2">Periodo A</label>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button class="btn btn-info btn-block" style="background-color: #e6e6e6 !important;">Ricerca</button>
                    </li>
                    
                </ul>
                </div>-->
    </div>
    <div class="col-10 col-md-10">
      <div class="tab-content" id="nav-vertical-tab-bgContent">
        <div class="tab-pane p-3 fade active show" id="nav-vertical-tab-bg1" role="tabpanel" aria-labelledby="nav-vertical-tab-bg1-tab"><?php require_once 'tab\tab1.php'; ?></div>
       
      </div>
    </div>
  </div>
</div>