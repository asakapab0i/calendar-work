<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>login page</title>

<link href='<?php echo base_url(); ?>assets/css/login.css' type='text/css' rel='stylesheet'>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/calendar.png">
</head>

<img src="<?php echo base_url();?>assets/images/tyf.png"/>


<style type="text/css">
#errors{
  
color: #b94a48;
background-color: #f2dede;
border-color: #eed3d7;

}
</style>
<body id="login_body">
<div class="container">


  
    
  <?php echo form_open('login/login_validation'); ?>
     
   
         <div id="errors">
     <?php echo form_error('email'); ?>
      </div>
      <label for="email">Email</label>
      <?php echo form_input('email','','placeholder="Email" ',$this->input->post('username')); ?>
    
        <div id="errors">
     <?php echo form_error('password'); ?>
      </div>
  <label for="pass">Password</label>
  <?php echo form_password('password','','placeholder="Password" '); ?>
  
  <?php echo form_submit('login_submit','LOGIN'); ?>

</div>




</body>
</html>