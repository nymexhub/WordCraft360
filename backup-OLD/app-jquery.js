var ctrl_down = false;
var ctrl_key = 17;
var s_key = 83;

$(document).keydown(function(e) {
    if (e.keyCode == ctrl_key) ctrl_down = true;
}).keyup(function(e) {
    if (e.keyCode == ctrl_key) ctrl_down = false;
});

$(document).keydown(function(e) {
    if (ctrl_down && (e.keyCode == s_key)) {
        
        // Your code
				// $("form#submit").submit(function() {
					// we want to store the values from the form input box, then send via ajax below
			

					var qs     = $('#qs').attr('value');
	 var id2     = $('#id2').attr('value');
						$.ajax({
							type: "POST",
							url: "ajax.php",
							data: "qs="+ qs+"& id2="+ id2,
							success: function(){
								$('div.success').fadeIn("1000");
							    $('div.success').fadeOut("10");
							}
						});
					return false;
					// });
				// alert('Ctrl-s pressed');





    }
}); 


// end app. to control plus s 
