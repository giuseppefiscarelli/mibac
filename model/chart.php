<?php
function dataMinima(){
  
    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];
    $result=[];
    $sql ='SELECT min(data_provvedimento) FROM fr_bene ';
   // echo $sql;
    $res = $conn->query($sql);
    
    if($res && $res->num_rows){
      $result = $res->fetch_assoc();
      $data = $result['min(data_provvedimento)'];
    }
  return $data;

}
function chart1( array $params = []){

    /**
     * @var $conn mysqli
     */

        $conn = $GLOBALS['mysqli'];
        $tipo = array_key_exists('tipo', $params) ? $params['tipo'] : '';
        $tipo = $conn->escape_string($tipo);
        $da = array_key_exists('da', $params) ? $params['da'] : '';
        $da = $conn->escape_string($da);
        $da= $da."-01";
        $da = date("Y-m-d", strtotime($da));
        $a = array_key_exists('a', $params) ? $params['a'] : '';
        $a = $conn->escape_string($a);
        $a= $a."-31";
        $a = date("Y-m-d", strtotime($a));;
       
        $records = [];

        

      $sql="select r.Descrizione, q.numero_beni from FrameworkRegione r,";
      $sql.=" (	select codiceRegione, count(*) as numero_beni from FR_bene where 1=1 ";
      if($tipo){
        $sql.="and tipo_bene = '$tipo' ";
      }
      if($da && $a){
        $sql .= "and data_provvedimento >= '$da' and data_provvedimento <= '$a' ";
      }
      $sql.=" group by codiceRegione) q ";
      $sql .=" where q.codiceRegione = r.ID ";       

        $res = $conn->query($sql);
        if($res) {

          while( $row = $res->fetch_assoc()) {
              $records[] = $row;
              
          }

        }

    return $records;

}
function chart3( array $params = []){

  /**
   * @var $conn mysqli
   */

      $conn = $GLOBALS['mysqli'];
      $tipo = array_key_exists('tipo', $params) ? $params['tipo'] : '';
      $tipo = $conn->escape_string($tipo);
      $da = array_key_exists('da', $params) ? $params['da'] : '';
      $da = $conn->escape_string($da);
      $da= $da."-01";
      $da = date("Y-m-d", strtotime($da));
      $a = array_key_exists('a', $params) ? $params['a'] : '';
      $a = $conn->escape_string($a);
      $a= $a."-31";
      $a = date("Y-m-d", strtotime($a));;
     
      $records = [];

      

    $sql="select n.id_natura,n.descrizione, q.numero_beni from BT_natura_bene_p n,";
    $sql.=" (	select id_natura, count(*) as numero_beni from FR_bene where 1=1 ";
    if($tipo){
      $sql.="and tipo_bene = '$tipo' ";
    }
    if($da && $a){
      $sql .= "and data_provvedimento >= '$da' and data_provvedimento <= '$a' ";
    }
    $sql.=" group by id_natura) q ";
    $sql .=" where q.id_natura = n.id_natura ";       
   
      $res = $conn->query($sql);
      if($res) {

        while( $row = $res->fetch_assoc()) {
            $records[] = $row;
            
        }

      }

  return $records;

}
function getCodReg($cod){
      /**
   * @var $conn mysqli
   */

  $conn = $GLOBALS['mysqli'];
  $result=[];
  $sql ="SELECT id FROM frameworkregione WHERE Descrizione = '$cod'";
  //echo $sql;
  $res = $conn->query($sql);
  
  if($res && $res->num_rows){
    $result = $res->fetch_assoc();
    
  }
  return $result;

}
function getCodNat($cod){
    /**
  * @var $conn mysqli
  */

  $conn = $GLOBALS['mysqli'];
  $result=[];
  $sql ="SELECT id_natura FROM bt_natura_bene_p WHERE descrizione = '$cod'";
  //echo $sql;
  $res = $conn->query($sql);

  if($res && $res->num_rows){
  $result = $res->fetch_assoc();

  }
  return $result;

}
function getNatura($tipo){

    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];
    $tipo??null; 
    $records = [];
    $sql = 'SELECT distinct(bt_natura_bene_p.id_natura),bt_natura_bene_p.descrizione
    FROM bt_natura_bene_p
    INNER JOIN fr_bene
    ON bt_natura_bene_p.id_natura = fr_bene.id_natura';
    if($tipo){
      $sql .= " where bt_natura_bene_p.tipo_bene = '$tipo' ";
    }
 // echo $sql;die;
    $res = $conn->query($sql);
    if($res) {
      while( $row = $res->fetch_assoc()) {
          $records[] = $row;
      }
    }
  return $records;
}
function getCodProv($cod){
    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];
    $result=[];
    $sql ="SELECT * FROM frameworkprovincia WHERE CPRVDEN = '$cod'";
    //echo $sql;
    $res = $conn->query($sql);

    if($res && $res->num_rows){
      $result = $res->fetch_assoc();
      
    }
    return $result;

}
function chartreg( array $params = []){

    /**
     * @var $conn mysqli
     */

        $conn = $GLOBALS['mysqli'];
        $cod = array_key_exists('cod', $params) ? $params['cod'] : '';
        $conn = $GLOBALS['mysqli'];
        $tipo = array_key_exists('tipo', $params) ? $params['tipo'] : '';
        $tipo = $conn->escape_string($tipo);
        $da = array_key_exists('da', $params) ? $params['da'] : '';
        $da = $conn->escape_string($da);
        $da= $da."-01";
        $da = date("Y-m-d", strtotime($da));
        $a = array_key_exists('a', $params) ? $params['a'] : '';
        $a = $conn->escape_string($a);
        $a= $a."-31";
        $a = date("Y-m-d", strtotime($a));;
       
        $records = [];

        

     // $sql="select r.Descrizione, q.numero_beni from FrameworkRegione r, (	select codiceRegione, count(*) as numero_beni from FR_bene where 1=1 group by codiceRegione) q where q.codiceRegione = r.ID ";       
      $sql="select p.CPRVDEN, q.numero_beni from FrameworkProvincia p, (	select siglaProvincia, count(*) as numero_beni from FR_bene where codiceRegione = $cod ";
      if($tipo){
        $sql.="and tipo_bene = '$tipo' ";
      }
      if($da && $a){
        $sql .= "and data_provvedimento >= '$da' and data_provvedimento <= '$a' ";
      }
      
      
      $sql .= " group by siglaProvincia) q where q.siglaProvincia = p.CPRVCOD";
    //  echo $sql;die;
        $res = $conn->query($sql);
        if($res) {

          while( $row = $res->fetch_assoc()) {
              $records[] = $row;
              
          }

        }

    return $records;

}
function chartprov( array $params = []){

    /**
     * @var $conn mysqli
     */

        $conn = $GLOBALS['mysqli'];
        $prov = array_key_exists('prov', $params) ? $params['prov'] : '';
        $tipo = array_key_exists('tipo', $params) ? $params['tipo'] : '';
        $tipo = $conn->escape_string($tipo);
        $da = array_key_exists('da', $params) ? $params['da'] : '';
        $da = $conn->escape_string($da);
        $da= $da."-01";
        $da = date("Y-m-d", strtotime($da));
        $a = array_key_exists('a', $params) ? $params['a'] : '';
        $a = $conn->escape_string($a);
        $a= $a."-31";
        $a = date("Y-m-d", strtotime($a));;
        $records = [];

        

      $sql ="select c.comune, q.numero_beni from FrameworkComune c, (	select cod_istat_comune, count(*) as numero_beni from FR_bene where siglaProvincia = '$prov' ";
      if($tipo){
        $sql.="and tipo_bene = '$tipo' ";
      }
      if($da && $a){
        $sql .= "and data_provvedimento >= '$da' and data_provvedimento <= '$a' ";
      }
      
      
      $sql .=" group by cod_istat_comune) q where q.cod_istat_comune = c.codiceComuneAlpha";
     // echo $sql;die;
        $res = $conn->query($sql);
        if($res) {

          while( $row = $res->fetch_assoc()) {
              $records[] = $row;
              
          }

        }

    return $records;

}
function getCodCat($cod){
  /**
  * @var $conn mysqli
  */

    $conn = $GLOBALS['mysqli'];
    $result=[];
    $sql ="SELECT * FROM frameworkcomune WHERE comune = '$cod'";
    //echo $sql;
    $res = $conn->query($sql);

    if($res && $res->num_rows){
    $result = $res->fetch_assoc();

    }
  return $result;

}
function getTabComuni( $params){

  /**
   * @var $conn mysqli
   */
  $conn = $GLOBALS['mysqli'];
  $search1 = array_key_exists('search1a', $params) ? $params['search1a'] : '';
  $search1 = $conn->escape_string($search1);
  $cod = array_key_exists('cod', $params) ? $params['cod'] : '';
  $cod = $conn->escape_string($cod);
  $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'id_bene';      
  $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';
  $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
  $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
  $start =$limit * ($page -1);
      

     
      $records = [];

      

      $sql ="SELECT * from fr_bene where cod_istat_comune = '$cod'";
    
      $sql .= " ORDER BY $orderBy  $orderDir LIMIT $start, $limit";

      //echo $sql;

      $res = $conn->query($sql);
      if($res) {

        while( $row = $res->fetch_assoc()) {
            $records[] = $row;
            
        }

      }

  return $records;
 

}
function countTabComuni( $params){

  /**
   * @var $conn mysqli
   */
  //var_dump($params);
  $conn = $GLOBALS['mysqli'];
  $search1 = array_key_exists('search1', $params) ? $params['search1'] : '';
  $search1 = $conn->escape_string($search1);
  $cod = array_key_exists('cod', $params) ? $params['cod'] : '';
  $cod = $conn->escape_string($cod);
  $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'id_bene';      
  $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';
  $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
  $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
  $start =$limit * ($page -1);
      

     
      $total = 0;

      

      $sql ="SELECT count(*) as total from fr_bene  where cod_istat_comune = '$cod'";
    

     

      $res = $conn->query($sql);
      if($res) {

       $row = $res->fetch_assoc();
       $total = $row['total'];
      }

  return $total;

}
function getComune($cod){
  /**
   * @var $conn mysqli
   */
  $conn = $GLOBALS['mysqli'];
  $result = 0;
  $sql ="SELECT * from frameworkcomune where codiceComuneAlpha = '$cod'";
  $res = $conn->query($sql);
  if($res && $res->num_rows){
    $result = $res->fetch_assoc();
    
  }
  return $result;

}
function getTabNatura( $params){

  /**
   * @var $conn mysqli
   */
  $conn = $GLOBALS['mysqli'];
  $search1 = array_key_exists('search1a', $params) ? $params['search1a'] : '';
  $search1 = $conn->escape_string($search1);
  $cod = array_key_exists('cod', $params) ? $params['cod'] : '';
  $cod = $conn->escape_string($cod);
  $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'id_bene';      
  $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';
  $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
  $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
  $start =$limit * ($page -1);
      

     
      $records = [];

      

      $sql ="SELECT * from fr_bene where id_natura = $cod";
    
      $sql .= " ORDER BY $orderBy  $orderDir LIMIT $start, $limit";

      //echo $sql;

      $res = $conn->query($sql);
      if($res) {

        while( $row = $res->fetch_assoc()) {
            $records[] = $row;
            
        }

      }

  return $records;

}
function countTabNatura( $params){

  /**
   * @var $conn mysqli
   */
  //var_dump($params);
  $conn = $GLOBALS['mysqli'];
  $search1 = array_key_exists('search1', $params) ? $params['search1'] : '';
  $search1 = $conn->escape_string($search1);
  $cod = array_key_exists('cod', $params) ? $params['cod'] : '';
  $cod = $conn->escape_string($cod);
  $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'id_bene';      
  $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';
  $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
  $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
  $start =$limit * ($page -1);
      

     
      $total = 0;

      

      $sql ="SELECT count(*) as total from fr_bene where id_natura = $cod";
    

     

      $res = $conn->query($sql);
      if($res) {

       $row = $res->fetch_assoc();
       $total = $row['total'];
      }

  return $total;

}
function getEnte($id){
    
    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];
    $result=[];
    $sql ='SELECT * FROM ente WHERE id_ente = '.$id;
    //echo $sql;
    $res = $conn->query($sql);
    
    if($res && $res->num_rows){
      $result = $res->fetch_assoc();
      
    }
  return $result;
}

function getTrend( array $params =[]){

    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];
       
    $tipo = array_key_exists('tipo', $params) ? $params['tipo'] : '';
    $tipo = $conn->escape_string($tipo);
    $da = array_key_exists('da', $params) ? $params['da'] : '';
    $da = $conn->escape_string($da);
    $da= $da."-01";
    $da = date("Y-m-d", strtotime($da));
    $a = array_key_exists('a', $params) ? $params['a'] : '';
    $a = $conn->escape_string($a);
    $a= $a."-31";
    $a = date("Y-m-d", strtotime($a));
   
    $records = [];





  $sql="select EXTRACT( YEAR_MONTH FROM data_provvedimento) as mese, count(*) as numero_beni from FR_bene where 1=1 ";
  if($tipo){
    $sql .="and tipo_bene = '$tipo' "; 
  }
  if($da && $a){
    $sql .= "and data_provvedimento >= '$da' and data_provvedimento <= '$a' ";
  }
   /* and data_provvedimento >= '2015-01-01' and data_provvedimento <= '2015-12-31'  -- eventuale filtro periodo
    -- <aggiungere eventuali filtri su Regione/Provincia/Natura>
    --and codiceRegione = 12      -- eventuale filtro regione (esempio "Lazio")
    --and siglaProvincia = 'LT'   -- eventuale filtro provincia (esempio "Latina")
    --and id_natura = 10001       -- eventuale filtro natura (esempio "fabbricato")*/
    $sql .="group by EXTRACT( YEAR_MONTH FROM data_provvedimento) ";
    $sql .="order by EXTRACT( YEAR_MONTH FROM data_provvedimento) asc";
  // echo $sql;die;
    $res = $conn->query($sql);
        if($res) {

          while( $row = $res->fetch_assoc()) {
            if($row['mese']){
              $corr = str_split($row['mese'],4);
              $row['mese']= $corr[0]."-".$corr[1];
            }
            
              $records[] = $row;
              
          }

        }

    return $records;


}
function getReportId( $id){

  /**
   * @var $conn mysqli
   */

      $conn = $GLOBALS['mysqli'];

     
      $result = [];

      

      $sql ="SELECT * from fr_bene where id_bene = $id";
    
     
      //echo $sql;

      $res = $conn->query($sql);

    if($res && $res->num_rows){
    $result = $res->fetch_assoc();

    }
  return $result;

}