<?php
session_start();
require_once 'functions.php';



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
    require_once 'controller/displayBene.php';
?>   
        
</div>
     
<!--End Dashboard Content-->

<?php
    require_once 'view/template/footer.php';
?>
<script>
function report(id){
        
    
        var url = 'report/report/report.php?id='+id+'&type=I';
        window.open(url,"Stampa");
       
    
    }
function down(id){
    

    var url = 'report/report/report.php?id='+id+'&type=D';
    window.open(url,"Stampa");
    

}

  
  
$(document).ready(function() {

  $(".owl-carousel").owlCarousel();
  var owl = $('.owl-carousel');

owl.trigger('play.owl.autoplay',[8000])


});

</script>
</body>
</html>    