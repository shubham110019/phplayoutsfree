<?php
include "include/header.php";
?>

  <!-- Main Sidebar Container -->
 <?php
 include "include/sidebar.php";
 
 
 if(isset($_POST['submit']))
{
	
	
	$cat=$_POST['cat'];
	
	$mess='';
	
	$sqlview2="SELECT * FROM themecat WHERE catname='$cat'";
	$resview2=$conn->query($sqlview2);
	$ress=$resview2->fetch_assoc();
	
	if($resview2->num_rows == 1)
	{
		$mess= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
			  <strong>already data insert</strong> 
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
			  </button>
		</div>";
	}
	
	else{	
			$query="INSERT INTO themecat (catname) VALUES ('$cat')";
			 mysqli_query($conn,$query);
		  
			
			 
			  $mess= "<div class='alert alert-success alert-dismissible fade show' role='alert' >
			  <strong>insert</strong> 
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
			  </button>
		</div>";
  
	}
	
}
 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Add Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
	  <div class="col-md-8 offset-md-2">
	   <?= isset($mess)?$mess:'' ?> 
	   </div>
        <div class="col-md-8 offset-md-2">
          <div class="card card-primary">
            <div class="card-header" style="background: #343a40 !important;">
              <h3 class="card-title">Add Category</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
			<form method="post">
              <div class="form-group">
                <label for="inputName">Category Title</label>
                <input type="text" id="inputName" class="form-control" placeholder="Category Title" name="cat">
              </div>
			  
			  <div class="form-group">
				<input type="submit" name="submit" class="btn btn-info" value="Submit">
			  </div>
             
			 </form>
           
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
       
      </div>
     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php
 include "include/footer.php";
 ?>