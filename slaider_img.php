<?php
include("session.php");
include("functions.php");
global $kol_swich;global $target;global $index;
	conection();
	kol_switch();
	$file_types = array('png', 'jpg', 'jpeg', 'xlsx', 'xls', 'doc', 'docx', 'pdf', 'csv');	
	if(isset($_POST['upload'])){
		if($kol_swich == 12){
			$_SESSION['massage'] = "Больше загрузить нельZя";
			redirect_to("slaider_img.php");
		}
		$target = "images/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
		$image1 = validate_type_file($image);
			if(($image == null) || (!in_array( $image1, $file_types))) {
				$_SESSION["errors"] = "Вы не выбрали объект или объект не подходит по типу.";
			redirect_to("slaider_img.php");
			}
		$sql = "INSERT INTO images (image) VALUES ('$image')";
		$result = mysqli_query($db, $sql); 
		move_uploaded_file($_FILES['image']['tmp_name'], $target);
		$_SESSION["massage"] = "Объект был успешно создан.";
		redirect_to("slaider_img.php");
		} 
		


?> 

<?php
			


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
<p>Редактирование слайдера</p>

<ul id="hide_deletw_btn" type="none">
<?php $sql = "SELECT * FROM images ORDER BY id";
    $result = mysqli_query($db, $sql);
     while($row = mysqli_fetch_array($result)){
   


			
    echo "<li><div class=\"output_img_for_adm\"><article><img src='images/".$row['image']."'></article></div>"; ?> 
 <a href="delete_img.php?id=<?php echo urlencode($row['id']); ?>" onclick="return confirm('Are u sure?');" ><div id="gmb"><span>x</span></div></a>
	</div>
     

<form method="post" action="edit_img.php?id=<?php echo urlencode($row["id"]); ?>" enctype="multipart/form-data" >
<?php	
	echo "<div class=\"file-upload\">";
	echo "<label>";
	echo "<input type=\"file\" name=\"image\" id=\"uploaded-file\" >";
	echo "<span>Выберите файл</span>";
	echo "</label>";	
	echo "<div id=\"file-name\"></div></div>";


	echo "<div class=\"btn_send_file_on_server\">";
	echo "<label>";
	echo "<input type=\"submit\" name=\"update\" value=\"Обновить картинку\">";
	echo "<span><div class=\"btn_send_file_label\"></div></span>";
	echo "</label></li>";



    echo "</form>"; ?>
   <?php }    echo "</ul>" ?>
			


	<div id="slaider_form_adm">
	<form method="post" action="slaider_img.php" enctype="multipart/form-data" >
	<div id="position_for_main_file">
	<div id="main_add_file">
	<label>
<input type="file" name="image" id="add_img_to_slaider" multiple="true"  onchange="preview(this.value)" />
	<span>Добавить элемент в слайдер</span></label></div>

	<div id="btn_send_main_file">
	<label>
	<input type="submit" name="upload" value="Загрузить картинку" id="btt_upload_main_form"> 
	<span>jghfdbnm</span></label></div>
	</div>
	<img id="previewImg1" />
    </form></div><br/><br/><br/><br/><br/>
   
	
	
<?php
echo massage();
echo errors();
?>

<script type="text/javascript">
	function onFileSelect(e) {
  	var 
    f = e.target.files[0], 
    reader = new FileReader,
    place = document.getElementById("previewImg1"); 
 	 reader.readAsDataURL(f);
 	 reader.onload = function(e) { 
    place.src = e.target.result;
 	 }
	};
	if(window.File && window.FileReader && window.FileList && window.Blob) {
  	document.querySelector("#add_img_to_slaider").addEventListener("change", onFileSelect, false);
	}
	
	</script> 

</body>
</html>