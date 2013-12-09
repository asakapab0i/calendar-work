
<?php echo validation_errors(); ?>
<form action="http://localhost/calendar/main/addEvent" method="post" accept-charset="utf-8">        
      
   <div class="control-group">
  <label class="control-label" for="">Event Title</label>
  <div class="controls">
      <input value="" pattern=".{8,}" title="Not enough characters(8) for a title." required="" style="width: 273px;" id="event-title" name="event-title" type="text" placeholder="" class="input-xlarge">
    <p class="help-block"></p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="textinput">Event Start</label>
  <div class="controls">
      <input value="" required="" id="event-start" name="event-start" type="date" placeholder="" class="input-medium">
    <input value="" required="" id="event-start-time" name="event-start-time" type="time" placeholder="" class="input-medium">
    <p class="help-block"></p>
  </div>
   <label class="control-label" for="textinput">Event End</label>
  <div class="controls">
      <input value="" required="" id="event-end" name="event-end" type="date" placeholder="" class="input-medium">
    <input value="" required="" id="event-end-time" name="event-end-time" type="time" placeholder="" class="input-medium">
    <p class="help-block"></p>
  </div>
</div>


<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="event-description">Event Content</label>
  <div class="controls">
                 
    <textarea pattern=".{5,}" title="Not enough characters(160) for a event content." required="" style="margin: 0px; width: 550px; height: 150px;" id="event-description" name="event-description"></textarea>
  </div>
</div>

        
        <input type="submit" class="btn btn-primary" value="Event it!">
     
     </form>