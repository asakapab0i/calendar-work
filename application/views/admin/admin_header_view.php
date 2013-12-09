<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>TYF</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	  <link rel="shortcut icon" href="../../assets/ico/favicon.png">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">


	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/calendar.png">
    

    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
</head>

<div class="navbar">
  <div class="navbar-inner">  
    <div class="container">  
   
      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->  
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">  
        <span class="icon-bar"></span>  
        <span class="icon-bar"></span>  
        <span class="icon-bar"></span>  
      </a>  
   
      <!-- Be sure to leave the brand out there if you want it shown -->  

      <a class="brand" href="<?php echo base_url() . "admin/home"?>">ADMIN</a>  	
    
   	
      <!-- Everything you want hidden at 940px or less, place within here -->  
       <?php foreach ($user_info as $row):?>
        <ul class="nav navbar-nav navbar-right">
      
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome,<?=$row->email?><b class="caret"></b></a>
        
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url() . "admin/index"?>">Home</a></li>
          <li><a href="<?php echo base_url() . "admin/profile"?>">Profile</a></li>
          <li><a href="<?php echo base_url() . "login/logout"?>">logout</a></li>
          
        </ul>
      </li>
    </ul>
     <?php endforeach;?>


    </div>  
  </div>  
</div> 
