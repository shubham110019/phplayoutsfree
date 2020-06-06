<?php
include "include/header.php";
?>

  <!-- Main Sidebar Container -->
 <?php
 include "include/sidebar.php";
 

if(isset($_POST["submit"]))
{
$title  = $_POST['title'];
$url = $_POST['url'];
$file = $_POST['file'];
$file2 = $_POST['file2'];
$themecat  = $_POST['themecat'];
$date5   = $_POST['date5'];
$url2  = $_POST['url2'];
$text2 = $_POST['text2'];


$query2 = "INSERT INTO themeall (title, `theme_url`, `theme_image`,`liveurl`, `theme_file`, `theme_cat`, `text2`, `date`) VALUES ('$title','$url','$file','$url2','$file2','$themecat','$text2','$date5')";
$resrun=$conn->query($query2); 
		
		
		$mess= "<div class='alert alert-success alert-dismissible fade show' role='alert' >
			  <strong>insert</strong> 
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
            <h1>Add Theme</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Add Theme</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
	  <div class="col-md-12 ">
	   <?= isset($mess)?$mess:'' ?> 
	   </div>
        <div class="col-md-8 ">
          <div class="card card-primary">
            <div class="card-header" style="background: #343a40 !important;">
              <h3 class="card-title">Add Theme</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
			<form action="" method="post" class="row" enctype="multipart/form-data">
              <div class="form-group col-md-6">
                <label for="inputName">Theme Title</label>
                <input type="text" id="themetitle" class="form-control" placeholder="Theme Title" name="title">
              </div>
			  
			  <div class="form-group col-md-6">
                <label for="inputName">Live url</label>
                <input type="text" id="url" class="form-control" placeholder="Live Url" name="url" >
              </div>
			  
			   
			  
			
			   <div class="form-group col-md-6" >
                <label for="inputName">Image</label>
                <input type="text" class="form-control" name="file" id="imgInp" placeholder="image url" >
              </div>
			  
			   <div class="form-group col-md-6" >
                <label for="inputName">theme file</label>
                <input type="text"  class="form-control" name="file2"  placeholder="theme download url">
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
			  
			  <div class="form-group col-md-6" style="display:none">
                <label for="inputName">Date</label>
                <input type="text"  class="form-control" name="date5" value="<?php echo date('d / m / Y'); ?>">
              </div>
			  
			  <div class="form-group col-md-6">
                <label for="inputName">Page Url</label>
                <input type="text" id="inputName" class="form-control" placeholder="Page Url" name="url2">
              </div>
			  
			  
			  <div class="col-md-12 form-group">
			   <label for="inputName">Theme Category</label>
				<textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="text2">
						  <b>TEMPLATE INFORMATION:</b>
						  <br><br>

<p><b>Template Name :</b> Inclusive a Corporate Category Bootstrap Responsive Web Template.</p>

<p><b>License :</b> Life Time Free License Under Creative Commons Attribution 3.0 Unported. Unlimited Use, you can help & support us (W3Layouts, a Non-Profit) by donations or you should keep link to our website.
</p>

<p>
<b>Compatible Browsers :</b> Google Chrome, Firefox, Safari, IE 10, Opera etc.
</p>
<p>
<b>Source Files included :</b> HTML files (.html), Style Sheets (.css), Images (.jpg/.png/.gif),
</p>


<p><b>High Resolution :</b> Yes.</p>

<p><b>Features:</b>

 Bootstrap Framework,

HTML5 & CSS3,

100% Responsive,

Icons based on Font Awesome,

Google Fonts used,

Simple & Easy to Use/Customize,

Clean and Professional design,

And much more…
</p>

<p><b>Images :</b> Pexels</p>

						  </textarea>
			  
			  </div>
			  
			  <div class="form-group col-md-12">
				<input type="submit" name="submit" class="btn btn-info" value="Submit">
			  </div>
             
			 </form>
           
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
		
		<div class="col-md-4 text-center">
		<img id="blah" src="#" class="img-fluid"/>
		
		</div>
       
      </div>
     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php
 include "include/footer.php";
 ?>
 
 <script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
 </script>

 <script>
 	$(document).ready(function(){
	$('#themetitle').blur(function(){
	var theme = $('#themetitle').val();
	var url = theme.replace(/\s+/g, "-");
	$('#url').val(url);
	});
 	});
 </script>