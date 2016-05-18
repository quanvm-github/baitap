$(document).ready(function() {
	$(".button").click(function() {
    	$.ajax({
    		url: "cookie_session.php",
    		type: "post",
    		data: {
                value: this.id
            },
    		success: function(result) {
        		$("#status").html(result);
    		}
    	});
	});

    $("#getcookiejs").click(function() {
        document.cookie = "cookie = this cookie will deleted when browser is closed";
        $("#status").html(document.cookie);
    });

    $("#deletecookiejs").click(function() {
        document.cookie = "cookie=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
        $("#status").html(document.cookie);
    });
});