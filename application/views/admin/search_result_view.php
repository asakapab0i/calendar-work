<link href="<?php echo base_url(); ?>assets/css/jquery.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>


<script type="text/javascript">
$(document).ready(function() {
  $(function() {
    $( "#search_dialog" ).dialog({
        autoOpen: false,
        minWidth: 600,
        minHeight: 300,
        resizable: true,
        
  });
  
 //edit dialog//
  $( ".admin_search" ).click(function () {
    var currentIds = $(this).attr('data-ids');
      alert(currentIds);
      

       $.ajax({
       type: "POST",
        url: "<?php echo base_url().'admin/search_view_events/"+currentIds+"/'?>",
    
      data: {myid: currentIds}
        }).done(function(data) {
        $('#search_dialog').html(data);
        });

        $( "#search_dialog").dialog( "open" );
    });
 });
});
</script>









<div  style="margin-top:10px;"id="showing">
Showing <?php echo $num_results;?>  out of 
<?php echo $num_total;?>
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
         <th>Post by</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>


                  <?php foreach ($result as $row):?>
                    <tr>
                       
                       <td><a href="#" onClick="return false;"><div class="admin_search" data-ids="<?=$row->id?>"><img src="<?php echo base_url();?>assets/images/edit.png"/></div> </a></td>
                       

                        <td><a href="<?php echo base_url() . "admin/delete_events/{$row->id}"?>"onClick='return confirm("Are you sure you want to delete, <?=$row->title?>?")'> <img src="<?php echo base_url();?>assets/images/delete.png"/></a></td>
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

<!-- edit  modal here -->
<div id="search_dialog" title="dasdasdasd"></div><!-- this one is for edit category -->
<!-- end here -->