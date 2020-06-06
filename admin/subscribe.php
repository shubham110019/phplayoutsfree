<?php

include "include/header.php";
?>
  <!-- Main Sidebar Container -->
 <?php
 include "include/sidebar.php";
 

 

 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>subscribes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">subscribes</li>
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

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
					
                    <th>Email</th>
					<th>Ip</th>
                    <th>date</th>
                   
                    
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  $sql="SELECT * FROM sub ORDER BY id DESC ";
				  $res=$conn->query($sql);
				  while($row=$res->fetch_assoc())
				  {
				  ?>
                  <tr>
                    <td><?= $row['id']?></td>
                    <td><?= $row['email']?></td>
					 <td><?= $row['ip']?></td>
					<td><?= $row['date']?></td>
                    
                    
                 
                  </tr>
				  <?php
				  }
				  ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                        <th>Id</th>
					
                    <th>Email</th>
					<th>Ip</th>
                    <th>date</th>
                   
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