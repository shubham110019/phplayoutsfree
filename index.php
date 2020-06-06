
<!DOCTYPE html>
<html>
<head>
	<title>layoutsfree</title>


<?php

include "include/header.php";

$limit = 9;  
if (isset($_GET["page"])) {
	$page  = $_GET["page"]; 
	} 
	else{ 
	$page=1;
	};  
$start_from = ($page-1) * $limit;  
$result = mysqli_query($conn,"SELECT * FROM themeall ORDER BY id DESC LIMIT $start_from, $limit");
?>

<div class="main">
	
	<!-- Jumbotron -->
<div class="" style="background: #232c3c;">
  <div class="text-white  container" >
    <div class="py-5">

    	<div class="row">
    		<div class="col-md-8 text-center offset-md-2">
  <h2 class="card-title h2 my-4 py-2 header-title" >Build amazing websites with <br> our free website templates</h2>
      <p class="subtitle">Choose from our collection of 3822 free templates designed for business, industry and personal website needs. Launch your website today.</p>
      <br>

 
    
    	<input type="text" placeholder="Search" class="searchinput">

    		</div>
    		

    	</div>

   
    
     

    </div>
  </div>
</div>
<!-- Jumbotron -->
</div>

<div class="main2 p-3">
	<div class="container-fluid">
		<div class="row ptb-20">
			<div class="col-md-12">
				<h2 class="tilte-text">Latest Templates</h2>
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
              $pagLink .= "<li class='page-item'><a class='page-link' href='index.php?page=".$i."'>".$i."</a></li>";	
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