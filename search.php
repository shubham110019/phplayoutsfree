<!DOCTYPE html>
<html>
<head>
	<title>layoutsfree</title>
<?php

include "include/header.php";
?>

	<?php
	
	$search=$_POST['search'];
	
	$sqlsearch="";
	$ressearch=$conn->query($sqlsearch);
	
	
	?>

<div class="main2 p-3">
	<div class="container-fluid">
		<div class="row ptb-20">
			<div class="col-md-12">
				<h2 class="tilte-text">Searching for: <?= $search ?></h2>
				<div class="line"></div>
			</div>
		</div>

		<div class="row">
			
			<?php
	while($row=$ressearch->fetch_assoc())
	{
	?>
			<div class="col-md-4">			
				<div class="card ">
					<a href="templates.html">
				  <div class="view overlay">
				    <img class="card-img-top" src="img/interior-decor-386x241.jpg"
				      alt="Card image cap">
				   
				  </div>
				  <div class="card-body">
				    <p class="card-text"><b>Interior Decor</b></p>	
				  </div>
				</a>
				</div>
			</div>
	<?php
	}
	?>
			
		</div>

		<div class="row">
			<div class="col-md-12 text-center">
			<nav aria-label="Page navigation example">
			  <ul class="pagination pg-blue ml-auto">
			    <li class="page-item ">
			      <a class="page-link" tabindex="-1">Previous</a>
			    </li>
			    <li class="page-item"><a class="page-link">1</a></li>
			    <li class="page-item active">
			      <a class="page-link">2 <span class="sr-only">(current)</span></a>
			    </li>
			    <li class="page-item"><a class="page-link">3</a></li>
			    <li class="page-item ">
			      <a class="page-link">Next</a>
			    </li>
			  </ul>
			</nav>
		</div>
		</div>
	</div>

</div>





<?php
include "include/footer.php";
?>
