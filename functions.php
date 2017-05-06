<?php 
function redirect_to($new_location) {
	header("Location: " . $new_location);
	exit;
}

function conection() {
global $db;
$db = mysqli_connect("localhost", "root", "loveis", "photos_v2_0");	
return $db;	
}


function check_file_type($file){
    $current_file_type = substr(strrchr($file['image'], '.'), 1);
    return $current_file_type; 
}

function validate_type_file($file) {
$file_types = array('png', 'jpg', 'jpeg', 'xlsx', 'xls', 'doc', 'docx', 'pdf', 'csv');	
$current_file_type = substr(strrchr($file, '.'), 1);
return $current_file_type;
}

  function session_type($session_type){
   session_start();
   if ($session_type = 'errors'){
   return  $_SESSION['$session_type'] = 'Ошибка';
    } else {
    if($session_type = 'complate'){
    		return $_SESSION['$session_type'] = 'Все работает';
    	}
    }
    return $_SESSION['$session_type'] = 'Все работает';
    }



  function confirm_query ($result_set){
if (!$result_set) {
  die ("Database query failed.");
}
 }

 function find_img_by_id ($img_id) {
     global $db;
     $safe_img_id = mysqli_real_escape_string($db, $img_id); 
    $sql = "SELECT * ";
$sql .= "FROM images ";
$sql .= "WHERE id = {$safe_img_id} ";
$sql .= "LIMIT 1";
$result = mysqli_query($db, $sql);
  confirm_query($result);
  if ($img = mysqli_fetch_assoc ($result)){
    return $img;
  } else {
    return null;
  }   
  }








function slaider_main() {
  global $kol_swich;
  global $result;
  global $db;
  echo "<div class=\"all\">";
  echo "<input checked type=\"radio\" name=\"respond\" id=\"desktop\">";
  echo "<article id=\"slider\">";
  echo "<input checked type=\"radio\" name=\"slider\" id=\"switch1\">";
  for ($i=0; $i <= $kol_swich; $i++) { 
    for ($j=2; $j <= $kol_swich; $j++) 
    echo "<input type=\"radio\" name=\"slider\" id=\"switch{$j}\">";
    }
  $sql = "SELECT * FROM images ORDER BY id";
    $result = mysqli_query($db, $sql);
    echo "<div id=\"slides\">";
    echo "<div id=\"overflow\">";
    echo "<div class=\"image\">";
    while($row = mysqli_fetch_array($result)){
    echo "<article><img src='images/".$row['image']."'></article>";
    }
    echo "</div></div></div>";
    ///////////////////////////
    echo "<div id=\"controls\">";
    for($i=1; $i<=$kol_swich; $i++){
    echo "<label for=\"switch{$i}\"></label>";
    }
    echo "</div>";
    //////////////////////////
    echo "<div id=\"active\">";
    for($i=1; $i<=$kol_swich; $i++){
    echo "<label for=\"switch{$i}\"></label>";
    }  echo "</div>"; 
    echo "</article></div>";
  }


function kol_switch(){
  global $db;
  global $sql;
  global $kol_swich;
  global $kol_swich_not_last;
  $sql = "SELECT * FROM images ";
    $result = mysqli_query($db, $sql);
    while($row = mysqli_fetch_array($result)){
    $kol_swich++;
    }
    $kol_swich_not_last = $kol_swich -1;
}
















 
    

?>