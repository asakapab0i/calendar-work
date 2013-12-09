<?php echo ($this->session->userdata( 'email')); ?>  
  <?php foreach ($user_info as $row):?>
  <a href="#" style="" class="thumbnail">
        <img style="width:300px; height:290px;"src="<?php echo base_url();?>assets/images/user_pic/<?=$row->image?>"/>
        </a>

<?php endforeach;?>


 <?php foreach ($user_post as $row):?>
             <div style="margin-top:20px;"class="well well-lg"><!-- events display -->
                 <table class="table">
    <thead>
      <tr>
       <th>Post by </th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Title</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>


                
                    <tr>
                        <td><?=$row->email?></td>
                       <td><?=$row->date_start?></td>
                       <td><?=$row->date_end?></td>
                       <td><?=$row->title?></td>
                      <td><?=$row->description?></td>
                    </tr>

                
             </tbody>
          </table>
            </div><!--end here -->

<?php endforeach;?>