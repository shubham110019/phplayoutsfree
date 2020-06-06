<!DOCTYPE html>
<html>
<head>
	<title>layoutsfree</title>
<?php

include "include/header.php";

$cat=$_GET['id'];
$catid=$cat;

$sqlcat="SELECT * FROM themecat WHERE id='$catid'";
$rescat=$conn->query($sqlcat);
$viewcat=$rescat->fetch_assoc();

$limit = 9;  
if (isset($_GET["page"])) {
	$page  = $_GET["page"]; 
	} 
	else{ 
	$page=1;
	};  
$start_from = ($page-1) * $limit;  
$result = mysqli_query($conn,"SELECT * FROM themeall ORDER BY id DESC LIMIT $start_from, $limit ");

?>


<div class="main2 p-3">
	<div class="container-fluid">
		<div class="row ptb-20">
			<div class="col-md-12">
				<h2 class="tilte-text">Category: <?= $viewcat['catname']?></h2>
				<div class="line"></div>
			</div>
		</div>

		<div class="row">
		
		
		<?php  
while ($row = mysqli_fetch_array($result)) {  
?>  
		
			<div class="col-md-4">			
				<div class="card ">
					<a href="<?= $base_url ?>templates.php?url=<?=$row["theme_url"] ?>">
				  <div class="view overlay">
				    <img class="card-img-top" src="<?= $row['theme_image']?>"
				      alt="Card image cap">
				   
				  </div>
				  <div class="card-body">
				    <p class="card-text"><b><?=$row["title"] ?></b></p>	
				  </div>
				</a>
				</div>
			</div>

		<?php  
};  
?> 
		



			
		</div>

		<div class="row">
			<div class="col-md-12 text-center">
			<?php  

$result_db = mysqli_query($conn,"SELECT COUNT(id) FROM themeall"); 
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 
/* echo  $total_pages; */
$pagLink = "<ul class='pagination text-center'>";  
for ($i=1; $i<=$total_pages; $i++) {
              $pagLink .= "<li class='page-item'><a class='page-link' href='category.php?id=".$cat."/page=".$i."'>".$i."</a></li>";	
}
echo $pagLink . "</ul>";  
?>
		</div>
		</div>
	</div>

</div>





<?php
include "include/footer.php";
?>