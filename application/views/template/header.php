
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Allimnee | Connecting Learners and Tutors</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="img/favicon.ico" >

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
/***** MODAL PROPERTIES *****/
 .modal-content {
    -webkit-box-shadow: none;
    box-shadow: none;
    background:transparent;
    border:none;
    outline:none;
}
.modal-content iframe {
    border:none;
    padding:0;
    margin:0;
}

    .modal-content {
        padding:0;
        margin: 0;
    }
    .modal-dialog {
        position: relative;
        width: auto;
        margin: 50px 302px 50px 302px;
    }

.close {
    font-size: 80px;
    margin:-20px 0 0 0;
}
/***** MEDIA QUERIES *****/
 @media only screen and (max-width: 1024px) {
    /***** MODAL PROPERTIES *****/
    .modal-body {
        height:100px;
        padding:0;
        margin: 0;
    }
    .modal-content {
        padding:0;
        margin: 0;
    }
    .modal-dialog {
        position: relative;
        width: auto;
        margin: 15px;
    }
    .close {
        margin:-12px 0 0 0;
    }
}
@media only screen and (min-width: 768px) {
    /***** MODAL PROPERTIES *****/
	
    .close {
        font-size: 80px;
        margin:30px -43px -20px 100px;
    }
}
</style>
</head>

<body>

   <!-- Start Navbar  -->
    <nav class="navbar navbar-default navbar-fixed-top" id="myScrollspy" role="navigation">
 		<div class="container">
  			
            <a class="navbar-brand" href="#"><b>Allimnee</b></a>
            
            <div class="navbar-header">
      			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
        			<span class="sr-only">Toggle navigation</span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
      			</button>
    		</div>
   			
             <!-- Collect the nav links, forms, and other content for toggling -->
    		<div class="collapse navbar-collapse" id="navbar-collapse-1">
      			<ul class="nav navbar-nav navbar-left">
        			<li><a href="#services">Services</a></li>
                    <li><a href="#about">About Us</a></li>
      			</ul>
                
          <?php echo form_open('credential/login')?>
            <div class="form-group">
              <input type="text" placeholder="Email" name="email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" name="pass" class="form-control">
            </div>
            <a href="register.html" class="btn btn-success">Sign in</a>
          </form>
        </div><!--/.navbar-collapse -->
  
  		</div>
	</nav>
<!-- End Navbar  -->

       

        
    </body>