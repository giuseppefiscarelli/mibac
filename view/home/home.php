


<div class="bd-example-tabs">

  <div class="row">
    <div class="col-2 col-md-2" style="background-color: #0066cc;color: white;">
      
      <h5 class="no_toc" style="font-weight: bold;">Beni di Interesse culturale</h5>
    
      <div class="nav nav-tabs nav-tabs-vertical nav-dark"  id="nav-vertical-tab-bg" role="tablist" aria-orientation="vertical" style="background-color: #0066cc;">
        <a class="nav-link " id="nav-vertical-tab-bg1-tab" data-toggle="tab" href="#nav-vertical-tab-bg1" role="tab" aria-controls="nav-vertical-tab-bg1" aria-selected="true">Per Collocazione geografica</a>
        <a class="nav-link" id="nav-vertical-tab-bg2-tab" data-toggle="tab" href="#nav-vertical-tab-bg2" role="tab" aria-controls="nav-vertical-tab-bg2" aria-selected="false">Per Natura</a>
        <a class="nav-link disabled" id="nav-vertical-tab-bg3-tab" data-toggle="tab" href="#nav-vertical-tab-bg3" role="tab" aria-controls="nav-vertical-tab-bg3" aria-selected="false">Per Ufficio di Competenza</a>
       
      </div>
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
                      <input class="form-control " id="search2" name="search2"type="month" value="<?=$search2?>" min="<?=$search2?>" max="<?=$search3?>"placeholder="inserisci la data in formato gg/mm/aaaa">
                      <label for="date1" >Periodo DA</label>
                  </div>
              </div>
          </li>
          <li><div class="it-datepicker-wrapper"  style="padding: 0px 30px 0px 30px;">
                  <div class="form-group">
                      <input class="form-control " id="search3" name="search3" min="<?=$search2?>" type="month" value="<?=$search3?>"placeholder="inserisci la data in formato gg/mm/aaaa">
                      <label for="date2">Periodo A</label>
                  </div>
              </div>
          </li>
          
          <li>
              <button id="searchBtn" class="btn btn-info btn-block"  style="background-color: #e6e6e6 !important;">Ricerca</button>
          </li>
          <li>
              <a class="btn btn-success btn-block" id="csvBtn" style="background-color: #e6e6e6 !important;">cvs</a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="col-10 col-md-10">
      <div class="tab-content" id="nav-vertical-tab-bgContent">
        <div class="tab-pane p-3 fade " id="nav-vertical-tab-bg1" role="tabpanel" aria-labelledby="nav-vertical-tab-bg1-tab"><?php require_once 'tab/tab1.php'; ?></div>
        <div class="tab-pane p-3 fade" id="nav-vertical-tab-bg2" role="tabpanel" aria-labelledby="nav-vertical-tab-bg2-tab"><?php require_once 'tab/tab2.php'; ?></div>
        <div class="tab-pane p-3 fade" id="nav-vertical-tab-bg3" role="tabpanel" aria-labelledby="nav-vertical-tab-bg3-tab"><?php require_once 'tab/tab3.php'; ?></div>
      </div>
    </div>
  </div>
</div>