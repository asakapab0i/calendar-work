<link href="<?php echo base_url(); ?>assets/css/jquery.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>



<script type="text/javascript">
$(document).ready(function() {
  $(function() {
    $( ".edit_dialog , #add-dialog" ).dialog({
       autoOpen: false,
        minWidth: 600,
        minHeight: 300,
        resizable: false,
        
  });
  
 //edit dialog//
  $( ".edit_post" ).click(function () {
    var currentId = $(this).attr('data-id');
      //alert(currentId);
      

       $.ajax({
       type: "POST",
        url: "<?php echo base_url().'main/view_events/"+currentId+"/'?>",
    
      data: {myid: currentId}
        }).done(function(data) {
        $('.edit_dialog').html(data);
        });

        $( ".edit_dialog").dialog( "open" );
    });


// add event //
$( "#add-event" ).click(function() {
      $( "#add-dialog" ).dialog( "open" );
  });
  

  


  });
});
</script>

 <script type="text/javascript">
$(document).ready(function() {
  $(function() {
    $( ".pic_dialog, .change_dialog" ).dialog({
       autoOpen: false,
        minWidth: 390,
        minHeight: 100,
        resizable: false,
        
  });
  
  $( ".change_pic" ).click(function () {

      var currentId = $(this).attr('data-id');
      //alert(currentId);
      

      //we have to load the database id in the universalEditName dialog box.
       $.ajax({
       type: "POST",
        url: "<?php echo base_url().'main/change_pic/"+currentId+"/'?>",
    
      data: {myid: currentId}
        }).done(function(data) {
        $('.pic_dialog').html(data);
        });

        $( ".pic_dialog").dialog( "open" );
    });


    $(document).ready(function(){
  $('#changepassword').click(function(){
  var getId = $(this).attr('data-id');
  //alert('hello');
   $.post("<?= base_url() . 'main/changepassword/' ?>",
    
    $("#form1").serialize(),
    function(result) {
     $("#error_message").html(result);
   },"html");
  });    
        });

 $( ".change_pass" ).click(function() {
      $( ".change_dialog" ).dialog( "open" );
    });

 });
  });
</script>

<?php foreach ($user_info as $row):?>
     <div class="row-fluid">
    <div class="span12">
      <br/>
      <br/>
      <br/>
      <div align="center" class="span3">
        <a href="#" style="margin-top:50px;" class="thumbnail">
        <img style="width:300px; height:290px;"src="<?php echo base_url();?>assets/images/user_pic/<?=$row->image?>"/>
        </a>
      </div>
 

      <div style="margin-top: 40px;" class="span8">
        <div  class="navbar">

          <div class="btn-toolbar">
            <div id="admin-navigation" style="margin-bottom: 20px;" class="btn-group btn-group-justified">
              <a href="<?php echo base_url() . "main/profile"?>" id="" data-id="" class="btn btn-default"><span class="icon-large icon-star"></span> My Events</a>
              <a href="<?php echo base_url() . "main/display_allevents"?>" id="" data-id="" class="btn btn-default"><span class="icon-large icon-list"></span> Display all Events</a>
              <a href="<?php echo base_url() . "main/index"?>" id="add-activity" data-mode="add-activity" class="btn btn-default"><span class="icon-large  icon-calendar"></span> Calendar</a>
              <a href="#" id="add-event" data-id="event" class="btn btn-default"><span class="icon-large icon-plus-sign"></span>Add Events</a>
                       
              <!-- <a href="#" id="addpictures" data-id="addpictures" class="btn btn-default"><span class="icon-large icon-plus-sign"></span> Gallery</a>
              <a href="#" id="about-us-edit" class="btn btn-default"><span class="icon-large icon-plus-sign"></span> Bulletin</a> -->
            </div>

            <div style="margin-bottom: 20px;" class="btn-group btn-group-justified pull-right">
              <a href="#" id="edit-profile" data-id="profile" class="btn btn-default"><span class="icon-large icon-user"></span> Profile</a>
                   <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="icon-large icon-cog"></span>
            Settings <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
            <li><a href="#" class="change_pic" data-id="<?php echo $row->id; ?>">Change Profile pic</a></li>
            <li><a href="#" class="change_pass">Change Password</a></li>
            </ul>
            </div>
        </div>
     <?php endforeach;?>        

          <div class="navbar-inner">
                      <a class="brand" href="#">MY EVENT LISTS</a>
          </div>
            <div style="margin-top:20px;"class="well well-lg"><!-- events display -->
                 <table class="table">
    <thead>
      <tr>
        <th>Edit</th>
        <th>Delete</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Title</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>


                  <?php foreach ($user_events as $row):?>
                    <tr>
                       
                       <td><a href="#" onClick="return false;"><div class="edit_post" data-id="<?=$row->id?>"><img src="<?php echo base_url();?>assets/images/edit.png"/></div> </a></td>
                       

                       <td><a href="<?php echo base_url() . "main/delete_events/{$row->id}"?>"onClick='return confirm("Are you sure you want to delete, <?=$row->title?>?")'> <img src="<?php echo base_url();?>assets/images/delete.png"/></a></td>
                       <td><?=$row->date_start?></td>
                       <td><?=$row->date_end?></td>
                       <td><?=$row->title?></td>
                      <td><?=$row->description?></td>
                    </tr>

                  <?php endforeach;?>
             </tbody>
          </table>
            </div><!--end here -->

        </div>
      </div>

</div>   
     
<!-- edit  modal here -->
<div class="edit_dialog" title="Edit Events"></div><!-- this one is for edit category -->
<!-- end here -->


<!-- add  modal here -->
<div id="add-dialog" title="Add Event">


 <?php echo form_open('main/addEvent');?>
        
      
   <div class="control-group">
  <label class="control-label" for="">Event Title</label>
  <div class="controls">
  <?php echo form_error('event-title') ?>
    <input value="" pattern=".{8,}" title="Not enough characters(8) for a title." required="" style="width: 273px;" id="event-title" name="event-title" type="text" placeholder="" class="input-xlarge">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="textinput">Event Start</label>
  <div class="controls">
  <?php echo form_error('event-start') ?>
    <input value="<?php echo set_value('event-start'); ?>" required id="event-start" name="event-start" type="date" placeholder="" class="input-medium">
    <input value="<?php echo set_value('event-start-time'); ?>" required id="event-start-time" name="event-start-time" type="time" placeholder="" class="input-medium">
    <p class="help-block"></p>
  </div>
   <label class="control-label" for="textinput">Event End</label>
  <div class="controls">
  <?php echo form_error('event-end') ?>
    <input value="<?php echo set_value('event-end'); ?>" required="" id="event-end" name="event-end" type="date" placeholder="" class="input-medium">
    <input value="<?php echo set_value('event-end-time'); ?>" required="" id="event-end-time" name="event-end-time" type="time" placeholder="" class="input-medium">
    <p class="help-block"></p>
  </div>
</div>


<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="event-description">Event Content</label>
  <div class="controls">
  <?php echo form_error('event-description') ?>               
    <textarea pattern=".{5,}" title="Not enough characters(160) for a event content." required="" style="margin: 0px; width: 550px; height: 150px;" id="event-description" name="event-description"></textarea>
  </div>
</div>

        
        <input type="submit" class="btn btn-primary" value="Event it!" />
     
     <?php echo form_close(); ?>


</div>
<!-- end here -->

<!-- change picture -->
<div class="pic_dialog" title="Change pic">
  
</div><!-- end here -->

<div class="change_dialog" title="Change Password"><!-- change pass diaog-->
   

    <form id="form1">
     <label for="author">Old Password: </label>
       <input type="text" name="oldpassword"/> <br>
     
       <label for="author">Change Password: </label>
       <input type="text" name="newpassword"/> <br>

        <label for="author">Confirm Password: </label>
       <input type="text" name="cpassword"/> <br>


     <input type="button" id="changepassword" value="Change Password" />
      
 <div id="error_message" style="color:red"></div>
      </form>
   
    
</div><!-- end here -->