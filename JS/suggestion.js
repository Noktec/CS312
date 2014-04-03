function lookup(inputString) {
	if(inputString.length == 0) {

		$('#lookup').hide();
	} else {
		$.post("nameFetch.php", {queryString: ""+inputString+""}, function(data){
			if(data.length >0) {
				$('#lookup').show();
				$('#autoList').html(data);
			}
		});
	}
}
function fill(thisValue) {
	$('#inputString').val(thisValue);
	setTimeout("$('#lookup').hide();", 200);
}