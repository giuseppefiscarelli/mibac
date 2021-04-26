
<span class="badge badge-secondary">Totale Beni <b><?=$total?></b></span>  <span class="badge badge-secondary">Natura Bene <b><?=$nat?></b></span>




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
            foreach($tab as $t){
                $ente= getEnte($t['id_ente']);
                $comune = getComune( $t['cod_istat_comune']);
                $indirizzo= $t['denominazione_stradale']?$t['denominazione_stradale'].', '.$t['n_civico']:'Indirizzo non definito';

                ?>
        <tr class="Grid3Row">
            <!-- <td class="Grid3HeaderCell"><?=$t['id_bene']?></td>-->
            <td class="Grid3HeaderCell">  <div class="it-thumb"><img src="https://via.placeholder.com/50x45.png?text=120x40" alt="image alt" title="<?=$t['denominazione']?>"></div></td>
            <td class="Grid3HeaderCell"><?=$ente['denominazione']??'Non Definito'?></td>
           
            <td class="Grid3HeaderCell"><?=$t['denominazione']?></td>
            <td class="Grid3HeaderCell"><?=$indirizzo?> <?=$t['chilometro']?'KM '.$t['chilometro']:''?>
            <br><?=$t['cap']?> - <?=$comune['comune']?> - <?=$t['siglaProvincia']?> </td>
            <td class="Grid3HeaderCell">
           
                <a title="Visualizza Scheda bene"href="#" onclick="report(<?=$t['id_bene']?>);">
                   <svg class="icon icon-success bg-light" ><use xlink:href="svg/sprite.svg#it-files"></use></svg> 
                </a>
                <a title="Scarica Scheda bene"href="#" onclick="down(<?=$t['id_bene']?>);">
                   <svg class="icon icon-danger bg-light" ><use xlink:href="svg/sprite.svg#it-download"></use></svg> 
                </a>
                </td>
        </tr>
        <?php    }
        ?>
    </tbody>
  </table>
</div>

<?php
                            require_once 'view/template/navigation.php';
                                ?>