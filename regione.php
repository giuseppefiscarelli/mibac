<?php
session_start();
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:index.php');
  exit;
}

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
    require_once 'controller/displayRegione.php';
?>   
         
</div>
     
<!--End Dashboard Content-->

<?php
    require_once 'view/template/footer.php';
?>

<script>
$(document).ready(function() {

$('#nav-vertical-tab-bg1-tab').addClass('active');

$('#nav-vertical-tab-bg1').addClass( 'active show' );

tab1(); 


 



 
});
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
            // value: [12000000, 11800000, 11600000, 11000000, 10800000, 10800000,10800000, 10700000, 10700000, 10200000, 10200000, 10000000],

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
                text: 'Distribuzione dei Beni per Provincia'
            },
            legend: {
                display: false,
                
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
        console.log(label);
        search1 = $('#search1').val();
        search2 = $('#search2').val();
        search3 = $('#search3').val();
        window.location.href="provincia.php?prov="+label+"&search1="+search1+"&search2="+search2+"&search3="+search3+"&idReg=<?=$reg?>";
    }
); 
var getDataChart1 = function() {
       
    tipo = $('#search1').val()
            da = $('#search2').val()
            a=$('#search3').val()
        cod = <?=$regione['id']?>;
        $("#search5 option:not(:first)").remove();
        $.ajax({
            type: "GET",
            data:{cod:cod,tipo:tipo,da:da,a:a},
            url: "controller/updateChart.php?action=getChartreg",
            dataType: "json",
            success: function(data) {
           console.log(data);
           $.each(data, function(k,v){
               //console.log(k,v)
              
               label = v.CPRVDEN;
               value = v.numero_beni;
               $("#search5").append("<option value='"+label+"'>"+label+" ("+value+")</option>");
               myChart1.data.labels.push(label);
               myChart1.data.datasets[0].data.push(value);
           })
          
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

$("#chart2").click( 
    function(evt){
       test=myChart2.getElementsAtEvent(evt)
        console.log(test);
    }
);
}
$('#nav-vertical-tab-bg1-tab').on('shown.bs.tab', function(){
        tab1();
    });

    $(document).ready(function() {
        $('#nav-vertical-tab-bg1-tab').addClass('active');
        $('#nav-vertical-tab-bg1').addClass( 'active show' );
        tab1();   
    }); 
    
    $('#search5').on('change',function(){
          label = $(this).val();

        if(label.length>0){
            search1 = $('#search1').val();
            search2 = $('#search2').val();
            search3 = $('#search3').val();
                
            window.location.href="provincia.php?prov="+label+"&search1="+search1+"&search2="+search2+"&search3="+search3+"&idReg=<?=$reg?>";
        }
          
            

          
      })   
</script>
</body>
</html>    