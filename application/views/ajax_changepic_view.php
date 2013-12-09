  <?php 
        $attrib = array('enctype' => 'multipart/form-data');

        ?>
        
        <?php echo form_open('main/change_image/'.$this->uri->segment(3),$attrib);?>
        
       
     
        <label for="price">Image:</label>
        <input type="file" name="userfile" required>
       
        <input type="submit" value="Submit" />
     
     <?php echo form_close(); ?>
   