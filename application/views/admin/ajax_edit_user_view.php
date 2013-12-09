   <?php foreach ($user_id as $row):?>

 <?php echo form_open('admin/update_user/'.$this->uri->segment(3));?>
        
     
                      
                <img style="width:150px; height:150px; margin-left:210px;"src="<?php echo base_url();?>assets/images/user_pic/<?=$row->image?>"/></td> <hr style="color:white;">
                       
                        
     
                <label for="Email">Email:</label>
                <input type="text" name="email" id="form" value="<?=$row->email?>" required/>
        
                
        
                      
                <label class="radio" for="radios-0">
                     
                <input type="radio" name="type" checked="checked" value="user">
                  user
                </label>
                <label class="radio" for="radios-1">
                  <input type="radio" name="type"  value="admin">
                  admin
                </label>

                    <button name="submit-signup" class="btn btn-primary">Submit</button>   
                       
     



<?php echo form_close(); ?>

 
<?php endforeach;?>