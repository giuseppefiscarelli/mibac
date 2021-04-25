<ul class="link-list">
        <li>
          <h3 class="no_toc">Filtri</h3>
        </li>
        <li>
            <div class="bootstrap-select-wrapper" style="margin-top: 30px;padding: 0px 30px 0px 30px;">
                <label>Tipo Bene</label>
                    <select title="Scegli una opzione" class="form-control" id="search1" name="search1">
                        <option value="" <?=$search1==null?'selected':''?>>Tutti</option>
                        <option value="M">Mobile</option>
                        <option value="I">Immobile</option>
                    </select>
            </div>
        </li>
        <li><div class="it-datepicker-wrapper"  style="margin-top: 30px;padding: 0px 30px 0px 30px;margin-bottom: -30px;">
                <div class="form-group">
                    <input class="form-control " id="search2" name="search2"type="month" value="<?=$search2?>"placeholder="inserisci la data in formato gg/mm/aaaa">
                    <label for="date1">Periodo DA</label>
                </div>
            </div>
        </li>
        <li><div class="it-datepicker-wrapper"  style="padding: 0px 30px 0px 30px;">
                <div class="form-group">
                    <input class="form-control " id="search3" name="search3" min="" type="month" value="<?=$search3?>"placeholder="inserisci la data in formato gg/mm/aaaa">
                    <label for="date2">Periodo A</label>
                </div>
            </div>
        </li>
        <li>
            <button class="btn btn-primary btn-block" id="searchBtn" onclick="">Ricerca</button>
        </li>
        
      </ul>