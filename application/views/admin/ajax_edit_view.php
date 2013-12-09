<?php foreach ($results as $row):?>

 <?php echo form_open('admin/edit_events/'.$this->uri->segment(3));?>
        
      
   <div class="control-group">
  <label class="control-label" for="event-title">Event Title</label>
  <div class="controls">
  <?php echo form_error('event-title') ?>
    <input value="<?=$row->title?>" pattern=".{8,}" title="Not enough characters(8) for a title." required="" style="width: 273px;" id="event-title" name="event-title" type="text" placeholder="" class="input-xlarge">
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
    <textarea pattern=".{5,}" title="Not enough characters(160) for a event content." required="" style="margin: 0px; width: 550px; height: 150px;" id="event-description" name="event-description"><?=$row->description?></textarea>
  </div>
</div>

    <!-- Post by -->
   <div class="control-group">
  <label class="control-label" for="event-title">Post by</label>
  <div class="controls">
  <?php echo form_error('event-title') ?>
    <input value="<?=$row->email?>" pattern=".{8,}" title="Not enough characters(8) for a title." required="" style="width: 273px;" id="event-title" name="email" type="text" placeholder="" class="input-xlarge">
    <p class="help-block"></p>
  </div>
</div>

        <input type="submit" class="btn btn-primary" value="Update" />
     
     <?php echo form_close(); ?>

 
<?php endforeach;?>