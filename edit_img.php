<?php include("functions.php");
	  include("session.php");
 conection(); ?>
 <?php 
    $current_img = find_img_by_id($_GET["id"]) ;
   	if(!$current_img){
   		$_SESSION["massage"] = "Была осуществлена атака на сайт, все администраторы будут оповещенны";
	redirect_to("slaider_img.php");
   	}
	$id =$current_img["id"];


   	if(isset($_POST['update'])){
   		
	$file_types = array('png', 'jpg', 'jpeg', 'xlsx', 'xls', 'doc', 'docx', 'pdf', 'csv');	
	$target = "images/".basename($_FILES['image']['name']);
	$image = $_FILES['image']['name'];
	$image1 = validate_type_file($image);
	if(($image == null) || (!in_array( $image1, $file_types))) {
		$_SESSION["massage"] = "Вы не выбрали объект или объект не подходит по типу.";
	redirect_to("slaider_img.php");
	}
	
	$sql  ="UPDATE images SET ";
	$sql .= "image = '{$image}' ";
	$sql .= "WHERE id = {$id} ";
	$sql .= "LIMIT 1 "; 
	$result = mysqli_query($db, $sql);
	move_uploaded_file($_FILES['image']['tmp_name'], $target);
	$_SESSION["massage"] = "Объект был успешно обновлен.";
	redirect_to("slaider_img.php");
	} 
	

	

	


?>
 
