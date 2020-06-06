<?php

include "include/header.php";
?>
  <!-- Main Sidebar Container -->
 <?php
 include "include/sidebar.php";
 
 if(isset($_POST['deletecat']))
 {
	 $catid=$_POST['catid'];
	 
	 $sqldelete="DELETE FROM themecat WHERE id='$catid'";
	 $req=$conn->query($sqldelete);
	 
	 $mess= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
			  <strong>Data Delete</strong> 
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
			  </button>
		</div>";
	 
 }
 
 if(isset($_POST['editcat']))
 {
	  $catid2=$_POST['catid2'];
	  $catedit=$_POST['catedit'];
	  
	  $sqledit="UPDATE themecat SET catname='$catedit' WHERE id='$catid2'";
	  $resedit=$conn->query($sqledit);
	  
	  
	   $mess= "<div class='alert alert-success alert-dismissible fade show' role='alert' >
			  <strong>Update</strong> 
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
			  </button>
		</div>";
	  
	 
 }
 
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">view category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
		
		<div class="col-md-12">
		 <?= isset($mess)?$mess:'' ?> 
		</div>
          <div class="col-12">
            

            <div class="card">
              <div class="card-header text-right">

				<a href="add-cat.php" class="btn btn-info">Add category</a>
				
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Totla Theme</th>
                   
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  $sql="SELECT * FROM themecat";
				  $res=$conn->query($sql);
				  while($row=$res->fetch_assoc())
				  {
				  ?>
                  <tr>
                    <td><?= $row['id']?></td>
                    <td><?= $row['catname']?>
                    </td>
                    <td></td>
                    <td> 
					<a href="#edit<?= $row['id']?>"  class="btn btn-dark" data-toggle="modal">Edit</a>
					<a href="#exampleModal<?= $row['id']?>" class="btn btn-danger" data-toggle="modal"> Delete</a>
					</td>
                 
                  </tr>
				  <?php
				  }
				  ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Totla Theme</th>
                   
                    <th>Status</th>
                   
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
    <!-- Edit modal -->
  
  <?php
				  $sql="SELECT * FROM themecat";
				  $res=$conn->query($sql);
				  while($row=$res->fetch_assoc())
				  {
				  ?>
  <div class="modal fade" id="edit<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#343a40;color:white;">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form method="post">
       <div class="form-group">
		<label for="exampleInputEmail1">Category Title</label>
		<input type="text" class="form-control"  placeholder="Category Title" value="<?= $row['catname']?>" name="catedit">
		<input type="text" name="catid2" value="<?= $row['id']?>" style="display:none;">
	  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		
		
		
		
        <button type="submit" class="btn btn-info" name="editcat">Submit</button>
		</form>
      </div>
    </div>
  </div>
</div>

 <?php
				  }
				  ?>

<!-- Edit modal -->
  
    <!-- delete modal -->
  
  <?php
				  $sql="SELECT * FROM themecat";
				  $res=$conn->query($sql);
				  while($row=$res->fetch_assoc())
				  {
				  ?>
  <div class="modal fade" id="exampleModal<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#343a40;color:white;">
        <h5 class="modal-title" id="exampleModalLabel">Delete Category <?= $row['id']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p>Are you sure about this ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		
		<form method="post">
		<input type="text" name="catid" value="<?= $row['id']?>" style="display:none;">
		
        <button type="submit" class="btn btn-danger" name="deletecat">Delete</button>
		</form>
      </div>
    </div>
  </div>
</div>

 <?php
				  }
				  ?>

<!-- delete modal -->
 <?php
include "include/footer.php";
?>
