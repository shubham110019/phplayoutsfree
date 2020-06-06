<?php
include "include/header.php";
$limit = 5;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM themeall ORDER BY id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($conn, $sql);  
?>

<?php  
while ($row = mysqli_fetch_array($rs_result)) {  
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
   
