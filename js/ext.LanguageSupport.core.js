( function( $ ) { 
	$.ajax({
		url: 'http://tools.wmflabs.org/lcm-dashboard/lcmd/api/languageapi.php?query=language&language=Gujarati&format=json',
		type: 'GET',
		dataType: 'jsonp',
	})
	.done(function( data ) {
		console.log("success");
		//data[0]['langcode_iso'] === 'guj'    data[0].propertyname
		$('#languagedata').text(JSON.stringify(data));
	})
	.fail(function() {
		console.log("error");
	});
} )( jQuery );