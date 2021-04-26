<div class="row">


          <div class="col-lg-6 col-12" id="locSelect" >
              <div class="bootstrap-select-wrapper" style="margin-top: 30px;padding: 0px 30px 0px 30px;">
                  <label style="color: #06c;">Regione</label>
                      <select title="Scegli una regione" id="search5" name="search5" class="form-control" data-live-search="true">
                          <option value="" >Tutte le regioni</option>
                          
                        
                      </select>
              </div>
          </div>
         
   
         
</div>




<div class="row" >
    <div class="col-6" id="mainChart">
    
          <button class="btn btn-success  btn-icon" onclick="toggleChart()"><i class="fa fa-pie-chart" aria-hidden="true"></i></button>
       
     <canvas id="chart1" width="400" height="400"></canvas>
    </div>
    <div class="col-1"></div>
    <div class="col-5" id="mainChart2">
    <canvas id="chart2" width="400" height="400"></canvas>
    </div>

</div>