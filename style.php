<style type="text/css">
<?php
for ($i=1; $i <$kol_swich ; $i++) { 
echo "#switch{$i}:checked ~ #active label:nth-child({$i}),";	
}
echo "#switch{$kol_swich}:checked ~ #active label:nth-child({$kol_swich}){
	background: #18a3dd;
	border-color: #18a3dd !important;
}";
?>


#switch1:checked ~ #controls label:nth-child(<?php echo $kol_swich; ?>), 
<?php 
for ($i=2; $i < $kol_swich ; $i++) {
$a1 = $i-1;
 echo "#switch{$i}:checked ~ #controls label:nth-child({$a1}),";
} ?>
#switch<?php echo $kol_swich; ?>:checked ~ #controls label:nth-child(<?php echo $kol_swich_not_last; ?>){
	background: url('prev.png') no-repeat; /*заливка фона картинкой без повторений*/
	float: left;
	margin: 0 0 0 -84px; /*сдвиг влево*/
	display: block;
	height: 68px;
	width: 68px;
}
#switch1:checked ~ #controls label:nth-child(2), 
<?php 
for ($i=2; $i < $kol_swich ; $i++) { 
	$a3 = $i+1;
	echo "#switch{$i}:checked ~ #controls label:nth-child({$a3}),";
}
?>
#switch<?php echo $kol_swich; ?>:checked ~ #controls label:nth-child(1){
	background: url('next.png') no-repeat; /*заливка фона картинкой без повторений*/
	float: right;
	margin: 0 -84px 0 0; /*сдвиг вправо*/
	display: block;
	height: 68px;
	width: 68px;
}
#switch1:checked ~ #slides .image{
	margin-left: 0;
}
<?php
for ($i=2; $i <= $kol_swich ; $i++) { 
	$s1 = ($i-1)*100;
	echo "#switch{$i}:checked ~ #slides .image{
	margin-left: -{$s1}%; }";
}
?></style>