
 
    <h4 style="color:#06c;text-align:center;">Beni di interesse culturale della Regione <?=$reg?></h4>
    <div class="row">
        <div class="col-lg-6 col-12" id="provSelect" >
            <div class="bootstrap-select-wrapper" style="margin-top: 30px;padding: 0px 30px 0px 30px;">
                <label style="color: #06c;">Provincia</label>
                    <select title="Scegli una provincia" id="search5" name="search5" class="form-control" data-live-search="true">
                        <option value="" >Tutte le province</option> 
                    </select>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <button style="float:right;margin-left:10px;" id="toggleBtn" class="btn btn-primary  btn-icon" onclick="showChart()"><i class="fa fa-line-chart" aria-hidden="true"></i> Mostra grafico</button>
            <button style="float:right;margin-left:10px;display:none;" id="switchBtn" class="btn btn-success  btn-icon" onclick="toggleChart()"><i class="fa fa-line-chart" aria-hidden="true"></i> Cambia grafico</button>
        </div>

    </div>
    <div class="row" >
            
            

    </div>
    <div class="row" style="margin-top: 10px;">
        <div id="divTable" class="col-12 set-transition">
            <div class="row">   
                <span class="badge badge-secondary">Totale Beni <b><?=$total?></b></span>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="Grid3Table data-table" id="dataTable" >
                        <thead>
                            <tr class="Grid3HeaderRow">
                            <!-- <th class="Grid3HeaderCell">Id Bene</th>-->
                                <th></th>
                                <th class="Grid3HeaderCell">Ente</th>
                                <th class="Grid3HeaderCell">Denominazione</th>
                                <th class="Grid3HeaderCell">Indirizzo</th>
                                <th class="Grid3HeaderCell">Action</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align:middle;">
                            <?php
                                    $thumb=1;
                                foreach($tab as $t){
                                    $ente= getEnte($t['id_ente']);
                                    $comune = $t['cod_istat_comune']?getComune( $t['cod_istat_comune']):'';
                                    $indirizzo= $t['denominazione_stradale']?$t['denominazione_stradale'].', '.$t['n_civico']:'Indirizzo non definito';
                                
                                    ?>
                            <tr class="Grid3Row">
                                <!-- <td class="Grid3HeaderCell"><?=$t['id_bene']?></td>-->
                                <td class="Grid3HeaderCell">  <div class="it-thumb"><img src="img/demo<?=$thumb?>.jpg" width="100px" alt="image alt" title="<?=$t['denominazione']?>"></div></td>
                                <td class="Grid3HeaderCell" style="max-width:300px;"><?=$ente['denominazione']??'Non Definito'?></td>
                            
                                <td class="Grid3HeaderCell" style="max-width:400px;"><?=$t['denominazione']?></td>
                                <td class="Grid3HeaderCell"><?=$indirizzo?> <?=$t['chilometro']?'KM '.$t['chilometro']:''?>
                                <br><?=$t['cap']?$t['cap']." - ":''?><?=$comune?$comune['comune']:''?> - <?=$t['siglaProvincia']?> </td>
                                <td class="Grid3HeaderCell" style="width: 103px;">
                            
                                    <a title="Visualizza Scheda bene"href="bene.php?id=<?=$t['id_bene']?>">
                                    <svg class="icon icon-success bg-light" ><use xlink:href="svg/sprite.svg#it-files"></use></svg> 
                                    </a>
                                    <a title="Scarica Scheda bene"href="#" onclick="down(<?=$t['id_bene']?>);">
                                    <svg class="icon icon-danger bg-light" ><use xlink:href="svg/sprite.svg#it-download"></use></svg> 
                                    </a>
                                    </td>
                            </tr>
                            <?php  
                            $thumb++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
                <?php require_once 'view/template/navigation.php';?>    
        </div>
        <div class="col-6" id="mainChart" style="display:none;">
            <canvas id="chart1" width="400" height="400"></canvas>
        </div>

              
    </div>
          
  