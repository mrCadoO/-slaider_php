<?php include("functions.php"); conection(); ?>
<?php 


     
    $current_img = find_img_by_id($_GET["id"]) ;
   	if(!$current_img){
	redirect_to("slaider_img.php");
   	}
	$id =$current_img["id"];
	 

$sql = "DELETE FROM images WHERE id = {$id} LIMIT 1";
$result = mysqli_query($db, $sql);
		redirect_to("slaider_img.php");
	
 
 ?>