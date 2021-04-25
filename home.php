<?php
session_start();  
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:index.php');
  exit;
}
/*
require_once 'model/user.php';
$updateUrl = 'userUpdate.php';
$deleteUrl = 'controller/updateUser.php';
*/
require_once 'model/chart.php';
require_once 'headerInclude.php';

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
 <div class="container-fluid">
 <?php
    require_once 'controller/displayHome.php';
?>   
        
</div>
     
<!--End Dashboard Content-->

<?php
    require_once 'view/template/footer.php';
?>
<script type="text/javascript">
function downCsv(){
    tipo = $('#search1').val()
            da = $('#search2').val()
            a=$('#search3').val()
            var csvContent = '';
            $.ajax({
                type: "POST",
                data:{tipo:tipo,da:da,a:a},
                url: "controller/updateChart.php?action=getCsv",
                dataType: 'json',
               
                success: function(data) {
                  console.log(data)
                  var A = [['n','sqrt(n)']];  // initialize array of rows with header row as 1st item
                    for(var j=1;j<10;++j){ A.push([j, Math.sqrt(j)]) }
                    var csvRows = [];
                    for(var i=0,l=A.length; i<l; ++i){
                        csvRows.push(A[i].join(','));   // unquoted CSV row
                    }
                        var csvString = csvRows.join("\r\n");

                        var a = document.getElementById('csvBtn');
                        a.innerHTML = "Click here";
                        a.href     = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csvString);
                        a.target   = '_blank';
                        a.download = 'myFile.csv';
                        document.body.appendChild(a);
                        }
         
                
            });
}

   activeTab = 1;
      $('#search2').on('change',function(){
          set = $(this).val();
          $('#search3').val("");
          $('#search3').attr('min',set);
          console.log(set);
      })
      
       
    function tab1(){
        $('#mainChart').empty().append('<canvas id="chart1" width="400" height="400"></canvas>');
        $('#mainChart2').empty().append('<canvas id="chart2" width="400" height="400"></canvas>');
        $('#searchBtn').attr('onclick', 'tab1();');
        var ctx1 = document.getElementById('chart1').getContext('2d');
        var myChart1 = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                
                data: [],
           
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 255, 146, 0.2)',
                    'rgba(36, 255, 99, 0.2)',
                    'rgba(1, 51, 99, 0.2)',
                    'rgba(255, 160, 64, 0.2)',
                    'rgba(255, 49, 49, 0.2)',
                    'rgba(0, 251, 42, 0.2)',
                    'rgba(251, 243, 0, 0.2)',
                    'rgba(0, 251, 228, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 255, 146, 1)',
                    'rgba(36, 255, 99, 1)',
                    'rgba(1, 51, 99, 1)',
                    'rgba(255, 160, 64, 1)',
                    'rgba(255, 49, 49, 1)',
                    'rgba(0, 251, 42, 1)',
                    'rgba(251, 243, 0, 1)',
                    'rgba(0, 251, 228, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
        
            title: {
                display: true,
                text: 'Distribuzione dei Beni per Regione Geografica'
            },
            legend: {
                display: false
            
            },
        
        }
        });
       
        $("#chart1").click( 
            
            function(evt){
                console.log(evt);
            test=myChart1.getElementsAtEvent(evt);
            var clickedElementindex = test[0]["_index"];

            var value = myChart1.data.datasets[0].data[clickedElementindex];
            var label =  myChart1.data.labels[clickedElementindex];
            search1 = $('#search1').val();
            search2 = $('#search2').val();
            search3 = $('#search3').val();
                console.log(label);
                window.location.href="regione.php?reg="+label+"&search1="+search1+"&search2="+search2+"&search3="+search3;
            }
        ); 
        function getDataChart1() {  
            
            tipo = $('#search1').val()
            da = $('#search2').val()
            a=$('#search3').val()
            $("#search5 option:not(:first)").remove();
            $.ajax({
                type: "POST",
                data:{tipo:tipo,da:da,a:a},
                url: "controller/updateChart.php?action=getChart1",
                dataType: "json",
                success: function(data,index) {
                   console.log(index)
                   var A=[];
                   var csvRows = [];
                    $.each(data, function(k,v){
                        label = v.Descrizione;
                        value = v.numero_beni;
                        $("#search5").append("<option value='"+label+"'>"+label+" ("+value+")</option>");
                        myChart1.data.labels.push(label);
                        myChart1.data.datasets[0].data.push(value);
                       A.push(k);
                       csvRows.push(A[label,value]);   // unquoted CSV row
                    
                    })
                    
                  //  var A = [['n','sqrt(n)']];  // initialize array of rows with header row as 1st item
                   // for(var j=1;j<10;++j){ A.push([j, Math.sqrt(j)]) }
                    
                   // for(var i=0,l=A.length; i<l; ++i){
                  //      csvRows.push(A[i].join(','));   // unquoted CSV row
                  //  }
                        var csvString = csvRows.join("\r\n");

                        var a = document.getElementById('csvBtn');
                        a.innerHTML = "Click here";
                        a.href     = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csvString);
                        a.target   = '_blank';
                        a.download = 'myFile.csv';
                        
                        
                    $("#search5").selectpicker('refresh');
                myChart1.update();
                }
            });
        }  
       
        getDataChart1();

        var ctx2 = document.getElementById('chart2').getContext('2d');
        var myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                
                data: [],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                   
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                   
                ],
                borderWidth: 1
            }]
        },
        options: {
            
            title: {
                display: true,
                text: 'Trend Mensile del periodo Selezionato'
            },
            legend: {
                display: false,
                text:[]
                
            },
       
        
        }
        });
        function getTrend1() {  
            
            tipo = $('#search1').val()
            da = $('#search2').val()
            a=$('#search3').val()
            
            $.ajax({
                type: "POST",
                data:{tipo:tipo,da:da,a:a},
                url: "controller/updateChart.php?action=getTrend1",
                dataType: "json",
                success: function(data) {
                    $.each(data, function(k,v){
                        if(v.mese){
                            label = v.mese;
                        value = v.numero_beni;
                        myChart2.data.labels.push(label);
                        myChart2.data.datasets[0].data.push(value);
                        }
                        
                    })
                myChart2.update();
                }
            });
        }  
       
        getTrend1();
        $("#chart2").click( 
            function(evt){
            test=myChart2.getElementsAtEvent(evt)
                console.log(test);
            }
        );
    }
    function tab2(){
        $('#mainChart3').empty().append('<canvas id="chart3" width="400" height="400"></canvas>');
        $('#mainChart4').empty().append('<canvas id="chart4" width="400" height="400"></canvas>');
        $('#searchBtn').attr('onclick', 'tab2();');
        var ctx3 = document.getElementById('chart3').getContext('2d');
        var myChart3 = new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
        
                data: [],
            
                backgroundColor: [
                    'rgba(241, 185, 179, 0.9)', 
                    'rgba(223, 196, 59, 0.3)',
                    'rgba(178, 42, 192, 0.9)',
                    'rgba(145, 111, 171, 0.8)' ,
                    'rgba(252, 229, 148, 0.7)' ,
                    'rgba(254, 142, 72, 0.4)' ,
                    'rgba(35, 250, 75, 0.7)' ,
                    'rgba(155, 250, 22, 0.2)',
                    'rgba(99, 179, 129, 0.9)' ,
                    'rgba(19, 245, 81, 0)',
                    'rgba(166, 23, 39, 1)' ,
                    'rgba(155, 22, 17, 0.3)', 
                    'rgba(119, 55, 53, 0.2)' ,
                    'rgba(229, 192, 124, 0.6)', 
                    'rgba(81, 110, 252, 0.8)' ,
                    'rgba(107, 238, 98, 0.2)' ,
                    'rgba(177, 57, 179, 0)',
                    'rgba(241, 27, 42, 0.2)', 
                    'rgba(214, 234, 157, 1)' ,
                    'rgba(254, 122, 169, 1)' ,
                    'rgba(77, 131, 232, 0.4)' ,
                    'rgba(248, 235, 177, 0.4)' ,
                    'rgba(135, 204, 152, 1)' ,
                    'rgba(145, 145, 243, 0.4)', 
                    'rgba(207, 159, 8, 0.3)' ,
                    'rgba(41, 27, 135, 0.5)', 
                    'rgba(76, 35, 80, 1)' ,
                    'rgba(102, 63, 45, 0)' ,
                    'rgba(232, 164, 248, 0.8)', 
                    'rgba(21, 26, 4, 0.7)',
                    'rgba(238, 180, 6, 0.4)' ,
                    'rgba(185, 246, 88, 0.7)',
                    'rgba(212, 241, 173, 0.7)',
                    'rgba(116, 169, 10, 0.9)' ,
                    'rgba(84, 50, 249, 0.8)' ,
                    'rgba(2, 104, 97, 0)' ,
                    'rgba(42, 87, 232, 0.2)' ,
                    'rgba(218, 162, 131, 0.6)' ,
                    'rgba(164, 47, 235, 0.8)',
                    'rgba(149, 240, 191, 0.9)',
                    'rgba(98, 80, 162, 0.9)' ,
                    'rgba(2, 60, 169, 0.1)' ,
                    'rgba(125, 97, 78, 0.3)' ,
                    'rgba(199, 215, 147, 0.7)' ,
                    'rgba(173, 37, 203, 0.6)' ,
                    'rgba(48, 195, 51, 0.9)' ,
                    'rgba(222, 250, 171, 0.7)',
                    'rgba(9, 143, 159, 0.9)' ,
                    'rgba(78, 42, 27, 0.7)' ,
                    'rgba(250, 24, 199, 0.2)' ,
                    'rgba(37, 25, 22, 0.8)' ,
                    'rgba(6, 244, 186, 1)' ,
                    'rgba(19, 181, 228, 0.4)' ,
                    'rgba(8, 28, 57, 0.8)' ,
                    'rgba(110, 232, 85, 0.5)' ,
                    'rgba(56, 181, 246, 0.2)' ,
                    'rgba(237, 27, 255, 0.3)' ,
                    'rgba(45, 194, 39, 1)' ,
                    'rgba(23, 221, 52, 0.3)' ,
                    'rgba(159, 203, 113, 0.9)' ,
                    'rgba(148, 17, 205, 0.2)' ,
                    'rgba(65, 71, 221, 0.4)' ,
                    'rgba(71, 72, 157, 0.8)' ,
                    'rgba(123, 235, 7, 1)' ,
                    'rgba(193, 94, 0, 0.5)' ,
                    'rgba(254, 252, 96, 0.3)' ,
                    'rgba(255, 216, 134, 0.9)' ,
                    'rgba(71, 161, 114, 0.3)',
                    'rgba(65, 69, 64, 0.5)' ,
                    'rgba(37, 28, 114, 0.6)' ,
                    'rgba(46, 59, 205, 0.3)',
                    'rgba(215, 254, 248, 0.8)' ,
                    'rgba(120, 200, 178, 0.8)' ,
                    'rgba(2, 207, 33, 0.3)' ,
                    'rgba(20, 214, 88, 0.3)' ,
                    'rgba(15, 234, 23, 0.2)' ,
                    'rgba(245, 181, 23, 0.7)' ,
                    'rgba(123, 126, 35, 1)' ,
                    'rgba(1, 101, 49, 0.8)' ,
                    'rgba(53, 128, 8, 0.9)' ,
                    'rgba(90, 92, 9, 0.3)' ,
                    'rgba(246, 207, 31, 0.3)' ,
                    'rgba(111, 240, 85, 0.7)' ,
                    'rgba(150, 123, 62, 0.2)' ,
                    'rgba(36, 34, 149, 0.2)',
                    'rgba(15, 117, 124, 0.9)' ,
                    'rgba(231, 180, 147, 0.4)' ,
                    'rgba(122, 10, 69, 0.8)' ,
                    'rgba(247, 161, 192, 0.9)' ,
                    'rgba(173, 31, 143, 0.2)',
                    'rgba(166, 142, 236, 0.6)' ,
                    'rgba(12, 92, 202, 0.2)' ,
                    'rgba(169, 167, 124, 0.1)' ,
                    'rgba(55, 228, 29, 0.4)' ,
                    'rgba(147, 229, 75, 0.8)' ,
                    'rgba(225, 119, 219, 0.1)',
                    'rgba(164, 88, 230, 0.7)',
                    'rgba(234, 213, 45, 0)',
                    'rgba(95, 61, 121, 0)' ,
                    'rgba(77, 237, 62, 0.7)' 
                ],
                borderColor: [
                                'rgba(241, 185, 179, 1)', 
                    'rgba(223, 196, 59, 1)',
                    'rgba(178, 42, 192, 1)',
                    'rgba(145, 111, 171, 1)' ,
                    'rgba(252, 229, 148, 0.7)' ,
                    'rgba(254, 142, 72, 0.4)' ,
                    'rgba(35, 250, 75, 0.7)' ,
                    'rgba(155, 250, 22, 0.2)',
                    'rgba(99, 179, 129, 0.9)' ,
                    'rgba(19, 245, 81, 0)',
                    'rgba(166, 23, 39, 1)' ,
                    'rgba(155, 22, 17, 0.3)', 
                    'rgba(119, 55, 53, 0.2)' ,
                    'rgba(229, 192, 124, 0.6)', 
                    'rgba(81, 110, 252, 0.8)' ,
                    'rgba(107, 238, 98, 0.2)' ,
                    'rgba(177, 57, 179, 0)',
                    'rgba(241, 27, 42, 0.2)', 
                    'rgba(214, 234, 157, 1)' ,
                    'rgba(254, 122, 169, 1)' ,
                    'rgba(77, 131, 232, 0.4)' ,
                    'rgba(248, 235, 177, 0.4)' ,
                    'rgba(135, 204, 152, 1)' ,
                    'rgba(145, 145, 243, 0.4)', 
                    'rgba(207, 159, 8, 0.3)' ,
                    'rgba(41, 27, 135, 0.5)', 
                    'rgba(76, 35, 80, 1)' ,
                    'rgba(102, 63, 45, 0)' ,
                    'rgba(232, 164, 248, 0.8)', 
                    'rgba(21, 26, 4, 0.7)',
                    'rgba(238, 180, 6, 0.4)' ,
                    'rgba(185, 246, 88, 0.7)',
                    'rgba(212, 241, 173, 0.7)',
                    'rgba(116, 169, 10, 0.9)' ,
                    'rgba(84, 50, 249, 0.8)' ,
                    'rgba(2, 104, 97, 0)' ,
                    'rgba(42, 87, 232, 0.2)' ,
                    'rgba(218, 162, 131, 0.6)' ,
                    'rgba(164, 47, 235, 0.8)',
                    'rgba(149, 240, 191, 0.9)',
                    'rgba(98, 80, 162, 0.9)' ,
                    'rgba(2, 60, 169, 0.1)' ,
                    'rgba(125, 97, 78, 0.3)' ,
                    'rgba(199, 215, 147, 0.7)' ,
                    'rgba(173, 37, 203, 0.6)' ,
                    'rgba(48, 195, 51, 0.9)' ,
                    'rgba(222, 250, 171, 0.7)',
                    'rgba(9, 143, 159, 0.9)' ,
                    'rgba(78, 42, 27, 0.7)' ,
                    'rgba(250, 24, 199, 0.2)' ,
                    'rgba(37, 25, 22, 0.8)' ,
                    'rgba(6, 244, 186, 1)' ,
                    'rgba(19, 181, 228, 0.4)' ,
                    'rgba(8, 28, 57, 0.8)' ,
                    'rgba(110, 232, 85, 0.5)' ,
                    'rgba(56, 181, 246, 0.2)' ,
                    'rgba(237, 27, 255, 0.3)' ,
                    'rgba(45, 194, 39, 1)' ,
                    'rgba(23, 221, 52, 0.3)' ,
                    'rgba(159, 203, 113, 0.9)' ,
                    'rgba(148, 17, 205, 0.2)' ,
                    'rgba(65, 71, 221, 0.4)' ,
                    'rgba(71, 72, 157, 0.8)' ,
                    'rgba(123, 235, 7, 1)' ,
                    'rgba(193, 94, 0, 0.5)' ,
                    'rgba(254, 252, 96, 0.3)' ,
                    'rgba(255, 216, 134, 0.9)' ,
                    'rgba(71, 161, 114, 0.3)',
                    'rgba(65, 69, 64, 0.5)' ,
                    'rgba(37, 28, 114, 0.6)' ,
                    'rgba(46, 59, 205, 0.3)',
                    'rgba(215, 254, 248, 0.8)' ,
                    'rgba(120, 200, 178, 0.8)' ,
                    'rgba(2, 207, 33, 0.3)' ,
                    'rgba(20, 214, 88, 0.3)' ,
                    'rgba(15, 234, 23, 0.2)' ,
                    'rgba(245, 181, 23, 0.7)' ,
                    'rgba(123, 126, 35, 1)' ,
                    'rgba(1, 101, 49, 0.8)' ,
                    'rgba(53, 128, 8, 0.9)' ,
                    'rgba(90, 92, 9, 0.3)' ,
                    'rgba(246, 207, 31, 0.3)' ,
                    'rgba(111, 240, 85, 0.7)' ,
                    'rgba(150, 123, 62, 0.2)' ,
                    'rgba(36, 34, 149, 0.2)',
                    'rgba(15, 117, 124, 0.9)' ,
                    'rgba(231, 180, 147, 0.4)' ,
                    'rgba(122, 10, 69, 0.8)' ,
                    'rgba(247, 161, 192, 0.9)' ,
                    'rgba(173, 31, 143, 0.2)',
                    'rgba(166, 142, 236, 0.6)' ,
                    'rgba(12, 92, 202, 0.2)' ,
                    'rgba(169, 167, 124, 0.1)' ,
                    'rgba(55, 228, 29, 0.4)' ,
                    'rgba(147, 229, 75, 0.8)' ,
                    'rgba(225, 119, 219, 1)',
                    'rgba(164, 88, 230, 1)',
                    'rgba(234, 213, 45, 1)',
                    'rgba(95, 61, 121, 1)' ,
                    'rgba(77, 237, 62, 1)' 
                ],
                borderWidth: 1
            }]
        },
        options: {
        
            title: {
                display: true,
                text: 'Distribuzione dei Beni per Natura'
            },
            legend: {
                display: false,
                position: 'left',
            
            },
        
        }
        });
       
        $("#chart3").click( 
            
            function(evt){
                console.log(evt);
            test=myChart3.getElementsAtEvent(evt);
            var clickedElementindex = test[0]["_index"];

            var value = myChart3.data.datasets[0].data[clickedElementindex];
            var label =  myChart3.data.labels[clickedElementindex];
            search1 = $('#search1').val();
            search2 = $('#search2').val();
            search3 = $('#search3').val();
                console.log(label);
                window.location.href="natura.php?nat="+label+"&search1="+search1+"&search2="+search2+"&search3="+search3;
            }
        ); 
        function getDataChart3() {  
            
            tipo = $('#search1').val()
            da = $('#search2').val()
            a=$('#search3').val()
            $("#search4 option:not(:first)").remove();
              
             
             
            $.ajax({
                type: "POST",
                data:{tipo:tipo,da:da,a:a},
                url: "controller/updateChart.php?action=getChart3",
                dataType: "json",
                success: function(data) {
                  
                    $.each(data, function(k,v){
                        label = v.descrizione;
                        value = v.numero_beni;
                        $("#search4").append("<option value='"+label+"'>"+label+" ("+value+")</option>");
                        myChart3.data.labels.push(label);
                        myChart3.data.datasets[0].data.push(value);
                    })
                    $("#search4").selectpicker('refresh');
                myChart3.update();
                }
            });
        }  
       
        getDataChart3();

        var ctx4 = document.getElementById('chart4').getContext('2d');
        var myChart4 = new Chart(ctx4, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                
                data: [],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                   
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                   
                ],
                borderWidth: 1
            }]
        },
        options: {
            
            title: {
                display: true,
                text: 'Trend Mensile del periodo Selezionato'
            },
            legend: {
                display: false,
                
            },
        
        }
        });
        function getTrend2() {  
            
            tipo = $('#search1').val()
            da = $('#search2').val()
            a=$('#search3').val()
            
            $.ajax({
                type: "POST",
                data:{tipo:tipo,da:da,a:a},
                url: "controller/updateChart.php?action=getTrend1",
                dataType: "json",
                success: function(data) {
                    $.each(data, function(k,v){
                        if(v.mese){
                            label = v.mese;
                        value = v.numero_beni;
                        myChart4.data.labels.push(label);
                        myChart4.data.datasets[0].data.push(value);
                        }
                        
                    })
                myChart4.update();
                }
            });
        }  
       
        getTrend2();
        $("#chart4").click( 
            function(evt){
            test=myChart2.getElementsAtEvent(evt)
                console.log(test);
            }
        );
    }
    $('#nav-vertical-tab-bg1-tab').on('shown.bs.tab', function(){
        tab1();
        activeTab = 1;
        $('#natSelect').hide()
        $('#locSelect').show()
    });
    $('#nav-vertical-tab-bg2-tab').on('shown.bs.tab', function(){
       tab2();
      activeTab = 2;
      $('#natSelect').show()
      $('#locSelect').hide()

       
    });
    $('#nav-vertical-tab-bg3-tab').on('shown.bs.tab', function(){
        var ctx5 = document.getElementById('chart5').getContext('2d');
        var myChart5 = new Chart(ctx5, {
        type: 'pie',
        data: {
            labels: ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu','Lug','Ago','Set','Ott','Nov','Dic'],
            datasets: [{
                label: 'Fondo Residuo (dimostrativo)',
                data: [12000000, 11800000, 11600000, 11000000, 10800000, 10800000,10800000, 10700000, 10700000, 10200000, 10200000, 10000000],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 255, 146, 0.2)',
                    'rgba(36, 255, 99, 0.2)',
                    'rgba(1, 51, 99, 0.2)',
                    'rgba(255, 160, 64, 0.2)',
                    'rgba(255, 49, 49, 0.2)',
                    'rgba(0, 251, 42, 0.2)',
                    'rgba(251, 243, 0, 0.2)',
                    'rgba(0, 251, 228, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 255, 146, 1)',
                    'rgba(36, 255, 99, 1)',
                    'rgba(1, 51, 99, 1)',
                    'rgba(255, 160, 64, 1)',
                    'rgba(255, 49, 49, 1)',
                    'rgba(0, 251, 42, 1)',
                    'rgba(251, 243, 0, 1)',
                    'rgba(0, 251, 228, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
        
            title: {
                display: true,
                text: 'Distribuzione dei Beni per Ufficio di competenza'
            },
            legend: {
                display: true,
                position: 'left',
                onClick: function (e) {
                    e.stopPropagation();
                }
            },
        
        }
        });

        $("#chart5").click( 
            function(evt){
                console.log(evt);
            test=myChart5.getElementsAtEvent(evt)
                console.log(test);

            }
        ); 
        var ctx6 = document.getElementById('chart6').getContext('2d');
        var myChart6 = new Chart(ctx6, {
        type: 'line',
        data: {
            labels: ['2009', '2010', '2011', '2012', '2013', '2014','2015','2016','2017','2018','2019','2020'],
            datasets: [{
                
                data: [12, 11, 11, 11, 10, 9,8, 7, 11, 10, 9, 12],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 255, 146, 0.2)',
                    'rgba(36, 255, 99, 0.2)',
                    'rgba(1, 51, 99, 0.2)',
                    'rgba(255, 160, 64, 0.2)',
                    'rgba(255, 49, 49, 0.2)',
                    'rgba(0, 251, 42, 0.2)',
                    'rgba(251, 243, 0, 0.2)',
                    'rgba(0, 251, 228, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 255, 146, 1)',
                    'rgba(36, 255, 99, 1)',
                    'rgba(1, 51, 99, 1)',
                    'rgba(255, 160, 64, 1)',
                    'rgba(255, 49, 49, 1)',
                    'rgba(0, 251, 42, 1)',
                    'rgba(251, 243, 0, 1)',
                    'rgba(0, 251, 228, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            
            title: {
                display: true,
                text: 'Trend Mensile del periodo Selezionato'
            },
            legend: {
                display: false,
                
            },
        
        }
        });

        $("#chart6").click( 
            function(evt){
            test=myChart6.getElementsAtEvent(evt)
                console.log(test);
            }
        );   
    });
    $(document).ready(function() {
        $('#nav-vertical-tab-bg1-tab').addClass('active');
        $('#nav-vertical-tab-bg1').addClass( 'active show' );
        tab1();   
    });
    $('#search1').on('change',function(){
         
          if(activeTab ==1){
              tab1()
          }
          if(activeTab ==2){
              tab2()
             
          }
      })
      $('#search4').on('change',function(){
          label = $(this).val();
        
          search1 = $('#search1').val();
            search2 = $('#search2').val();
            search3 = $('#search3').val();
               
                window.location.href="natura.php?nat="+label+"&search1="+search1+"&search2="+search2+"&search3="+search3;
            

          
      })
      $('#search5').on('change',function(){
          label = $(this).val();
        if(label.length>0){
            search1 = $('#search1').val();
            search2 = $('#search2').val();
            search3 = $('#search3').val();
                
            window.location.href="regione.php?reg="+label+"&search1="+search1+"&search2="+search2+"&search3="+search3;
        }
          
            

          
      })
</script>
  
</script>

</body>
</html>    