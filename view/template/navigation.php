<?php
    $numLinks = getConfig('numLinkNavigator', 4);

?>
<div class="row">

<div class="col-md-12">
            <ul class="pagination pagination-round pagination-outline-danger pagination-sm flex-sm-wrap" style="justify-content: center;">
            <li class="page-item<?= $page ==1 ?' disabled':'' ?> ">
                <a class="page-link" href="<?="$pageUrl?$navOrderByQueryString&page=".($page-1)?>">Pagina  Precedente</a></li>
            
            
                <?php
                $startValue = $page - $numLinks;
                    $startValue = $startValue < 1 ? 1 : $startValue;
                    for($i =$startValue;$i<$page;$i++):?>
                    <li class="page-item">
                        <a class="page-link" href="<?="$pageUrl?$navOrderByQueryString&page=$i"?>"><?=$i?></a></li>

                <?php
                    endfor;
                ?>
                    
                <li class="page-item active">
                    <a class="page-link disabled"  style="cursor:default;"><?=$page?></a></li>
    
                <?php
                    $startValue = $page + 1;
                    $startValue = $startValue < 1 ? 1 : $startValue;
                    $endValue = ($page + $numLinks);
                    $endValue = min($endValue,$numPages);

                    for($i =$startValue;$i<=$endValue;$i++):?>
                    <li class="page-item">
                        <a class="page-link" href="<?="$pageUrl?$navOrderByQueryString&page=$i"?>"><?=$i?></a></li>

                <?php
                    endfor;
                ?>
            <li class="page-item<?= $page ==$numPages ?' disabled':'' ?>"><a class="page-link " href="<?="$pageUrl?$navOrderByQueryString&page=".($page+1)?>">Pagina Successiva</a></li>
            </ul>
            <ul class="pagination pagination-round pagination-outline-danger pagination-sm flex-sm-wrap" style="justify-content: center;">
            <li class="page-item">
                <a class="page-link disabled"  style="cursor:default;">Pagina <?=$page?> di <?=$numPages?> </a></li> 
           
            </li>
           
            <li class="page-item">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><svg class="icon icon-sm icon-primary"><use xlink:href="svg/sprite.svg#it-pencil"></use></svg></div>
                        </div>
                        <label for="jumpToPage" style="color:#5b6f82;">Vai alla Pagina</label>
                        <input type="number" class="form-control"max="<?=$numPages?>" min="1" value="<?=$page?>" id="jumpToPage" style="text-align:center;">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" id="jumpBtn">Vai</button>
                        </div>
                    </div>
                </div>
            </li>
            
            </ul>
           
</div>
</div>

