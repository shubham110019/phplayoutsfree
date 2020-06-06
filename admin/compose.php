<?php

include "include/header.php";
?>

  <!-- Main Sidebar Container -->
  <?php
	include "include/sidebar.php";
	
 $mailid=$_GET['id'];

$sqlmail="SELECT * FROM mailall WHERE id='$mailid'";
$resmail=$conn->query($sqlmail);

$viewmail=$resmail->fetch_assoc();
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Compose</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Compose</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
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
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Compose New Message</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <input class="form-control" placeholder="To:" value="<?= $viewmail['email']?>">
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Subject:" value="<?= $viewmail['subject']?>">
                </div>
                <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 500px">
                    <br> <br>
                    </textarea>
                </div>
               
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
			
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 <?php
	include "include/footer.php";
 ?>
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>

