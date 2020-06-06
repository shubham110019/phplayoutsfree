
<!DOCTYPE html>
<html>
<head>
	<title>layoutsfree</title>


<?php

include "include/header.php";
	
$limit = 4;
$sql = "SELECT COUNT(id) FROM themeall";  
$rs_result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit); 
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
		
		
		<div id="target-content" class="row">loading...</div>

	
		
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



			
	

		<div class="row">
			<div class="col-md-12 text-center">

<ul class="pagination">
                    <?php 
					if(!empty($total_pages)){
						for($i=1; $i<=$total_pages; $i++){
								if($i == 1){
									?>
								<li class="pageitem active" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" data-id="<?php echo $i;?>" class="page-link" ><?php echo $i;?></a></li>
															
								<?php 
								}
								else{
									?>
								<li class="pageitem" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" class="page-link" data-id="<?php echo $i;?>"><?php echo $i;?></a></li>
								<?php
								}
						}
					}
								?>
					</ul>
		</div>
		</div>
	</div>

</div>






<?php
include "include/footer.php";
?>
	
	<script>
	$(document).ready(function() {
		$("#target-content").load("pagination.php?page=1");
		$(".page-link").click(function(){
			var id = $(this).attr("data-id");
			var select_id = $(this).parent().attr("id");
			$.ajax({
				url: "pagination.php",
				type: "GET",
				data: {
					page : id
				},
				cache: false,
				success: function(dataResult){
					$("#target-content").html(dataResult);
					$(".pageitem").removeClass("active");
					$("#"+select_id).addClass("active");
					
				}
			});
		});
    });
</script>
