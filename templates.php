<!DOCTYPE html>
<html>
<head>
	<title>layoutsfree</title>

<?php

include "include/header.php";
?>

<?php

$url=$_GET['url'];

$sqltemp="SELECT * FROM themeall WHERE theme_url='$url'";
$restemp=$conn->query($sqltemp);

$temp=$restemp->fetch_Assoc();

$sqlcat="SELECT * FROM themecat WHERE id='".$temp['theme_cat']."'";
$rescat=$conn->query($sqlcat);
$viewcat=$rescat->fetch_assoc();

?>

<div class="submenu">
	<div class="container">
		<div class="row">
			<ul class="submenu2">
				<li><a href="index.php">Home</a></li>
				<li><a href="category.php?id=<?= $viewcat['id']?>"><?= $viewcat['catname']?></a></li>
				
				<li><a href="#"><?= $temp['title']?></a></li>
			</ul>
		</div>
	</div>
</div>

<div class="main p-50">
	<div class="container-fluid">
		<div class="row">

			<div class="col-md-8">

					<!-- Card -->
				<div class="card card-cascade wider reverse z-depth-1">

				  <!-- Card image -->
				  <div class="view view-cascade overlay">
				    <img class="card-img-top" src="<?= $temp['theme_image']?>"
				      alt="Card image cap">
				    <a href="#!">
				      <div class="mask rgba-white-slight"></div>
				    </a>
				  </div>

				  <!-- Card content -->
				  <div class="card-body card-body-cascade text-center">

					<a href="#view" data-toggle="modal" class="btn btn-info viewdemo"><i class="far fa-eye"></i> View Demo</a>
				  </div>

				</div>
				<!-- Card -->

			</div>
			<div class="col-md-4 p-10">
				<br>
				
				<h2 class="tem-h2"><?= $temp['title']?></h2>
				<p class="date"><?= $temp['date']?></p>


				<div class="pricetab z-depth-1">
						<div class="card">
							<h4 class="chooseplan"> Choose your Plan</h4>
							<div class="card-body">

								<div class="form-check">
								  <input type="checkbox" class="form-check-input" id="materialChecked2" checked>
								  <label class="form-check-label" for="materialChecked2">Starter</label>
								</div>

							</div>

							<a href="#exampleModalCenter"  class="dwdbtn" data-toggle="modal" ><i class="fas fa-download"></i> Free Download</a>

						</div>

				</div>
				
				<br>
				
				<div class="ads text-center">
				<a href="#">
					<img src="https://thumbs.gfycat.com/BigheartedPerfumedDragon-size_restricted.gif"/>
					</a>
				</div>
			</div>

		</div>
	</div>
</div>


<div class="mainsame p-50">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h2 class="tilte-text">Latest Templates</h2>
				<div class="line"></div>
				<br>
			</div>
		</div>
		<div class="row">

			<div class="owl-carousel owl-theme">
			    <div class="item">
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
			   
			</div>
		</div>

	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">

  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  <div class="modal-dialog modal-dialog-centered" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?= $temp['title']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php
include "include/footer.php";
?>