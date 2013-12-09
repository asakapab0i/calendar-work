




<div  style="margin-top:10px;"id="showing">
Showing <?php echo $num_results;?>  out of 
<?php echo $num_total;?>
</div>
   <div style="margin-top:20px;"class="well well-lg"><!-- events display -->
                 <table class="table">
    <thead>
      <tr>
     
        <th>Start Time</th>
        <th>End Time</th>
        <th>Title</th>
         <th>Post by</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>


                  <?php foreach ($result as $row):?>
                    <tr>
                       
                      
                       <td><?=$row->date_start?></td>
                       <td><?=$row->date_end?></td>
                       <td><?=$row->title?></td>
                        <td><?=$row->email?></td>
                      <td><?=$row->description?></td>
                    </tr>

                  <?php endforeach;?>
             </tbody>
          </table>
            <?php
if(!$result){
  echo '<td id="no">No result found. </td>';
}
?>  
            </div><!--end here -->

       




</tbody>
</table>

