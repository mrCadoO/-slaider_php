<?php
global $kol_swich;
include("functions.php");
	conection();
	$file_types = array('png', 'jpg', 'jpeg', 'xlsx', 'xls', 'doc', 'docx', 'pdf', 'csv');	
	if(isset($_POST['upload'])){
		$target = "images/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
		$image1 = validate_type_file($image);
			if(($image == null) || (!in_array( $image1, $file_types))) {
			redirect_to("slaider_img.php");
			}
		$sql = "INSERT INTO images (image) VALUES ('$image')";
		$result = mysqli_query($db, $sql); 
		move_uploaded_file($_FILES['image']['tmp_name'], $target);
		redirect_to("slaider_img.php");
		} 
		kol_switch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Image Upload</title>
<link rel="stylesheet" href="style.css">
<?php include("style.php");  ?>
</head>
<body>
<ul id="hide_deletw_btn" type="none">
<?php $sql = "SELECT * FROM images ORDER BY id";
    $result = mysqli_query($db, $sql);
    while($row = mysqli_fetch_array($result)){
    	


    
    echo "<li><article><img src='images/".$row['image']."'></article>"; ?> 
 <a href="delete_img.php?id=<?php echo urlencode($row['id']); ?>" onclick="return confirm('Are u sure?');" ><div id="gmb"><img src="delete.png" id="main_slaider_delete_pfoto"></div></a></li>


<form method="post" action="edit_img.php?id=<?php echo urlencode($row["id"]); ?>" enctype="multipart/form-data" >
<?php	
	echo "<input type=\"file\" name=\"image\">";
	echo "<input type=\"submit\" name=\"update\" value=\"Обновить картинку\">";
    echo "</form>"; ?>
   
   <?php  
    }  echo "</ul>" ?>



	<div id="slaider_form_adm">
	<form method="post" action="slaider_img.php" enctype="multipart/form-data" >
	<input type="file" name="image">
	<input type="submit" name="upload" value="Загрузить картинку" id="btt_upload_main_form">
    </form></div>
   
	

</body>
</html>