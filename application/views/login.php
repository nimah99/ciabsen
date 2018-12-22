<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina"> -->
	<link rel="shourt icon" href=<?php echo base_url("assets/img/sclogo.png")?>>	

    <title>Sebuah Channel</title>

    <!-- Bootstrap core CSS -->
    <link href=<?php echo base_url("assets/css/bootstrap.css")?> rel="stylesheet">
    <!--external css-->
    <link href=<?php echo base_url("assets/font-awesome/css/font-awesome.css")?> rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href=<?php echo base_url("assets/css/style.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/css/style-responsive.css")?> rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
          <?php echo form_open('login/masuk',['class'=>'form-login','enctype'=>'multipart/form-data']);?>
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
		            <input type="text" name="email" class="form-control" placeholder="Email" autocomplete="off" autofocus>
		            <br>
		            <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
		           <br>
                        <?php echo form_submit(['value'=>'SIGN IN','class'=>'btn btn-theme btn-block']);?>
                    <?php echo form_close();?>
		            <hr>
		            <?php 
$data=$this->session->flashdata('error');
if($data!=""){ ?>
<div class="alert alert-dismissible alert-danger"><strong><?=$data;?> </strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
		           <!--  <div class="login-social-link centered">
		            <p>or you can sign in via your social network</p>
		                <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
		                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
		            </div>
		            <div class="registration">
		                Don't have an account yet?<br/>
		                <a class="" href="#">
		                    Create an account
		                </a>
		            </div> -->
		
				</div>
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src=<?php echo base_url("assets/js/jquery.js")?>></script>
    <script src=<?php echo base_url("assets/js/bootstrap.min.js")?>></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src=<?php echo base_url("assets/js/jquery.backstretch.min.js")?>></script>
    <script>
        $.backstretch("<?php echo base_url('assets/img/sclogo.png')?>", {speed: 500});
    </script>


  </body>
</html>
