
<h4 style="color:#06c;text-align:center;">Beni di interesse culturale del Comune di <?=$comune?></h4>
<span class="badge badge-secondary">Totale Beni <b><?=$total?></b></span> <!-- <span class="badge badge-secondary">Comune Bene <b><?=$comune?></b></span>-->




<div class="table-responsive">
  <table class="Grid3Table data-table">
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
           
                <a title="Visualizza Scheda bene"href="#" onclick="report(<?=$t['id_bene']?>);">
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
<?php
                            require_once 'view/template/navigation.php';
                                ?>