<?php

include "include/header.php";
?>
  <!-- Main Sidebar Container -->
 <?php
 include "include/sidebar.php";
 
 if(isset($_POST['deletecat']))
 {
	 $catid=$_POST['catid'];
	 
	 $sqldelete="DELETE FROM themeall WHERE id='$catid'";
	 $req=$conn->query($sqldelete);
	 
	 $mess= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
			  <strong>Data Delete</strong> 
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
            <h1>View Theme</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">view Theme</li>
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

				<a href="add-theme.php" class="btn btn-info">Add Theme</a>
				
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
					
                    <th>Title</th>
					<th>Image</th>
                    <th>date</th>
                   
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  $sql="SELECT * FROM themeall";
				  $res=$conn->query($sql);
				  while($row=$res->fetch_assoc())
				  {
				  ?>
                  <tr>
                    <td><?= $row['id']?></td>
                    <td><?= $row['title']?>
                    </td>
					<td>  <a href="<?= $row['theme-image']?>" data-toggle="lightbox" data-title="<?= $row['title']?>" data-gallery="gallery">
					
					<img src="<?= $row['theme-image']?>" style="height:40px;" class="img-fluid mb-2" />
					</a>
					</td>
					<td><?= $row['date']?></td>
                    
                    <td> 
					<a href="<?= $row['liveurl']?>" class="btn btn-info" target="_blank">View</a>
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
					<th>Image</th>
                    <th>date</th>
                   
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
  
  <?php
  
 if(isset($_POST['edittheme']))
{
$themeid =$_POST['themeid'];	

$title  = $_POST['title'];
$url = $_POST['url'];
$file = $_POST['file'];
$file2 = $_POST['file2'];
$themecat  = $_POST['themecat'];

$url2  = $_POST['url2'];
$text2 = $_POST['text2'];


$sqledit="UPDATE themeall SET title='$title',theme-url='$url',liveurl='$url2',theme-image='$file',theme-file='$file2',theme-cat='$themecat',text2='$text2' WHERE id='$title'";
$resedit=$conn->query($sqledit);


	$mess= "<div class='alert alert-success alert-dismissible fade show' role='alert' >
			  <strong>update</strong> 
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
			  </button>
		</div>";
	
}
  ?>
    <!-- Edit modal -->
  
  <?php
				  $sql="SELECT * FROM themeall";
				  $res=$conn->query($sql);
				  while($row=$res->fetch_assoc())
				  {
				  ?>
  <div class="modal fade" id="edit<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header" style="background:#343a40;color:white;">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form method="post" class="row" >
	  
		<input type="text" name="themeid" value="<?= $row['id']?>" >
              <div class="form-group col-md-6">
                <label for="inputName">Theme Title</label>
                <input type="text" id="themetitle" class="form-control" placeholder="Theme Title" name="title" value="<?= $row['title']?>">
              </div>
			  
			  <div class="form-group col-md-6">
                <label for="inputName">Page url</label>
                <input type="text" id="url" class="form-control" placeholder="Live Url" name="url" value="<?= $row['theme-url']?>">
              </div>
			  
			   
			  
			
			   <div class="form-group col-md-6" >
                <label for="inputName">Image</label>
                <input type="text" class="form-control" name="file" id="imgInp" placeholder="image url" value="<?= $row['theme-image']?>">
              </div>
			  
			   <div class="form-group col-md-6" >
                <label for="inputName">theme file</label>
                <input type="text"  class="form-control" name="file2"  placeholder="theme download url" value="<?= $row['theme-file']?>">
              </div>
			  
			   <div class="form-group col-md-6" >
                <label for="inputName">Theme Category</label>
				 <select class="custom-select " name="themecat">
					<option selected>Choose...</option>
				<?php
				$sqlcat="SELECT * FROM themecat";
				$rescat=$conn->query($sqlcat);
				while($rowcat=$rescat->fetch_assoc())
				{
				?>
              
				 
					<option value="<?= $rowcat['id']?>"><?= $rowcat['catname']?></option>
					<?php
				}
					?>
				  </select>
              </div>
			  
			
			  <div class="form-group col-md-6">
                <label for="inputName">theme view Url</label>
                <input type="text" id="inputName" class="form-control" placeholder="Page Url" name="url2" value="<?= $row['liveurl']?>">
              </div>
			  
			  
			  <div class="col-md-12 form-group">
			   <label for="inputName">Theme Category</label>
				<textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="text2">
						 <?= $row['text2']?>
						  </textarea>
			  
			  </div>
			  
		
             
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		
		
		<input type="submit" name="edittheme" class="btn btn-info" value="Edit">
		
       
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
				  $sql="SELECT * FROM themeall";
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
<script>
 	$(document).ready(function(){
	$('#themetitle').blur(function(){
	var theme = $('#themetitle').val();
	var url = theme.replace(/\s+/g, "-");
	$('#url').val(url);
	});
 	});
 </script>