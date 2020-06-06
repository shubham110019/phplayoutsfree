<?php

include "include/header.php";
?>
  <!-- Main Sidebar Container -->
 <?php
 include "include/sidebar.php";
 

 
 if(isset($_POST['save'])){
	$checkbox = $_POST['check'];
	for($i=0;$i<count($checkbox);$i++){
	$del_id = $checkbox[$i]; 
	mysqli_query($conn,"DELETE FROM mailall WHERE id='".$del_id."'");
	 $mess= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
			  <strong>Data Delete</strong> 
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
			  </button>
		</div>";
}
}

 

 ?>
<style>

.bg-secondary {
    background-color: #d2d5d966 !important;
}
.bg-secondary, .bg-secondary > a {
   
    color: black !important;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mailbox</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Mailbox</li>
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
		
		 <div class="col-md-3">
            <a href="mailview.php" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Folders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="mailview.php" class="nav-link">
                      <i class="fas fa-inbox"></i> Inbox
					  
					    <?php
				$sql="select count('id') from mailall";
				$result=$conn->query($sql);
				$rowtotal=mysqli_fetch_array($result);
				
				echo " <span class='badge bg-primary float-right'>$rowtotal[0] </span>";
				
			  ?>
                    
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-envelope"></i> Sent
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-file-alt"></i> Drafts
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-filter"></i> Junk
                      <span class="badge bg-warning float-right">65</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-trash-alt"></i> Trash
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          
          </div>
		  
          <div class="col-9">
            

            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
			  <form method="post" action="">
			  <div class="col-md-12 text-right" style="padding:10px;">
				<button type="submit" class="btn btn-success" name="save">DELETE</button>
			  </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th><input type="checkbox" id="checkAl"></th>
					
                    <th>Name</th>
					<th>Email</th>
                    <th>date</th>
                   
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  $sql="SELECT * FROM mailall";
				  $res=$conn->query($sql);
				  $i=0;
				  while($row=$res->fetch_assoc())
				  {
				  ?>
                  <tr <?php
					if($row['read'] == 2)
					{
						echo "class='bg-secondary'";
					}
					else{
						echo "class=''";
					}
				  ?>>
                    <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["id"]; ?>"> <?= $row['id']?></td>
                    <td><?= $row['name']?></td>
					<td> <?= $row['email']?></td>
					<td><?= $row['date']?></td>
                    
                    <td> 
					<a href="read-mail.php?id=<?= $row['id']?>" class="btn btn-info" >Read</a>
					
					<a href="#exampleModal<?= $row['id']?>" class="btn btn-danger" data-toggle="modal"> Delete</a>
					</td>
                 
                  </tr>
				  <?php
				  $i++;
				  }
				  ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th><input type="checkbox" id="checkAl"> </th>
                    <th>Title</th>
					<th>Image</th>
                    <th>date</th>
                   
                    <th>Status</th>
                   
                  </tr>
                  </tfoot>
                </table>
				</form>
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
 
 <script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>