<?php

include "include/header.php";
?>

  <!-- Main Sidebar Container -->
  <?php
	include "include/sidebar.php";
  ?>
  
 <?php
 
 $mess='';
 $mailid=$_GET['id'];

$sqlmail="SELECT * FROM mailall WHERE id='$mailid'";
$resmail=$conn->query($sqlmail);

$viewmail=$resmail->fetch_assoc();

 $sqlupdate2="UPDATE mailall SET read=2 WHERE id='$mailid'";
 $resupdate2=$conn->query($sqlupdate2);
 
 if(isset($_POST['reply']))
 {
	  echo "<script>window.location.href='compose.php?id=".$viewmail['id']."';</script>";
 }
 if(isset($_POST['delete']))
 {
	 $sqldelete="DELETE FROM mailall WHERE id='$mailid'";
	 
	 if ($resdelete=$conn->query($sqldelete)) {
    $mess= "Record deleted successfully";
	} else {
    $mess= "Error deleting record: " . mysqli_error($conn);
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
		<div class="col-md-12 text-center" style="padding:10px;">
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
          <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Read Mail</h3>

              <div class="card-tools">
                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5><?= $viewmail['subject']?></h5>
                <h6>From: <?= $viewmail['email']?>
                  <span class="mailbox-read-time float-right"><?= $viewmail['date']?></span></h6>
              </div>
           
             
              <div class="mailbox-read-message">
				<?= $viewmail['msg']?>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            
            <!-- /.card-footer -->
            <div class="card-footer">
              <div class="float-right">
				<form method="post">
			  
                <button type="submit" class="btn btn-default" name="reply"><i class="fas fa-reply"></i> Reply</button>
              </div>
              <button type="submit" class="btn btn-default" name="delete"><i class="far fa-trash-alt"></i> Delete</button>
              <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
			  </form>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 <?php 
 include "include/footer.php";
 ?>