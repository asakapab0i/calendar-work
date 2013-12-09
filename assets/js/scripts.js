


$(document).on('click', '.event-calendar', function(e) {
	e.preventDefault();
	$('#myModal').modal('show');

	var date = $(this).data('id');

	 $.ajax({
   type: "POST",
   url: "http://localhost/calendar/main/viewEvent",
   data: {date: date},// serializes the form's elements.
           success: function(data)
           {
               $('#myModal .modal-body').html(data) // show response from the php script.
             }
           });


});

$(document).on('click', '.add-calendar', function(e) {
	e.preventDefault();
	$('#addmodal').modal('show');
});

$(document).on('click', '#event-submit', function(e) {
  e.preventDefault();
 
    if($("#event-form")[0].checkValidity()) {
       

       $.ajax({
           type: "POST",
           url: "http://localhost/calendar/main/addEvent",
           data: $('#event-form').serialize(),// serializes the form's elements.
           success: function(data)
           {
               $('#addmodal .modal-header').html(data) // show response from the php script.
             }
           });


    }else{
      alert('Please Fill out the Form.');
    }
});



 


