/*
Information on the JS Document :

Is the JQUERY call to book an 
appoitment from main.php.
*/

//this function sends the value of the ID appoitnment to bookAppointments.php.
function myCall(id) {
	var request = $.ajax({
		url: "bookAppointments.php",
		type: "POST",			
		dataType: "html",
		data:{id :id},
		success: function(msg){
         alert( "Data Saved: " + msg ); //Anything you want
         location.reload();
       }
	});

	

	request.fail(function(jqXHR, textStatus) {
		alert( "Request failed: " + textStatus );
	});
}