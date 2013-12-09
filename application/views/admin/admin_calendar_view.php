<style type="text/css">
.row{
margin-top: -370px;
margin-left:40px;
  width:60%;
}
img {
    }

</style>

<body>  
<img class="pull-left"src="<?php echo base_url();?>assets/images/tyf.png"/>

<!-- Recent view -->
   <div class="row-fluid">
   
    <div class="pull-right" >
      <ul class="nav nav-list">
        <li class="nav-header" style="font-size: 15px;">Recent Submitted Events</li>
          <?php
          
        foreach ($recent as $row) {
          $human_to_unix = human_to_unix($row->dateCreated);
          $now = time();
          $timespan = timespan($human_to_unix,$now);
          echo '<li><a data-id="'.$row->date_start.'" class="addmodal" href="'. base_url().'main/view_post/'.$row->id.'">'.$row->email.'<span class="pull-right muted">'.$timespan.' ago</span></a></li> <hr>';
        }

        ?>
      </ul>
    </div>
  </div><!-- end here -->


    



   <!-- for calendar -->
    <div class="row">
        
        <?php
          echo $result;
        ?>


      </div> <!--  end of calendar-->

<!--- Event view ---->



<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Event List</h3>
</div>
<div class="modal-body">

</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

</div>
</div> <!--end here --> 






<!-- add modal here --> 

<div id="addmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Make an event</h3>
</div>
<div class="modal-body">


          <form  method="post" accept-charset="utf-8" class="form-horizontal" id="event-form">

<fieldset>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="event-title">Event Title</label>
  <div class="controls">
  <?php echo form_error('event-title') ?>
    <input value="<?php echo set_value('event-title'); ?>" pattern=".{8,}" title="Not enough characters(8) for a title." required="" style="width: 273px;" id="event-title" name="event-title" type="text" placeholder="" class="input-xlarge">
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
    <textarea pattern=".{5,}" title="Not enough characters(160) for a event content." required="" style="margin: 0px; width: 273px; height: 150px;" id="event-description" name="event-description"><?php echo set_value('event-description'); ?></textarea>
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="event-submit"></label>
  <div class="controls">
    <button type="submit" id="event-submit" name="event-submit" class="btn btn-primary">Event it!</button>
  </div>
</div>

</fieldset>
</form>
</div>

<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

</div>
</div>
</div>

</html>
