$(document).ready(function() {
	$("#ajax").click(function() {
    	$.ajax({
    		url: "ajax.php",
    		type: "post",
    		data: {value: "value string"},
    		success: function(result) {
        		alert(result);
    		}
    	});
	});

	$("#ajaxjson").click(function() {
		var array = [1, 2, 3, 4, 5];
    	$.ajax({
    		url: "ajax.php",
    		type: "post",
    		data: {
    			array: array
    		},
    		success: function(result) {
        		alert(result);
    		}
    	});
	});

	$("#upload").click(function() {
		var file_data = document.getElementById("fileToUpload").files[0];
		// Only send when a file is chosen
	    if (file_data) {
			var bar = $('#bar');
		    var percent = $('#percent');
		    var status = $('#status');
			var form_data = new FormData();
		    form_data.append('file', file_data);
		    $.ajax({
	            url: 'ajax.php',
	            type: 'post',
	            data: form_data,
	            contentType: false,
	    		processData: false,
	    		// Upload progress event
	    		xhr: function() {
	                var xhr = new window.XMLHttpRequest();
				    xhr.upload.addEventListener("progress", function(file) {
				    if (file.lengthComputable) {
				        var percentComplete = file.loaded / file.total;
				        bar.width(percentComplete * 100 + "%");
				        percent.html(percentComplete * 100 + "%");
				      }
	       		 	})
	       		 	return xhr;
	       		},
	            success: function(result) {
	            	if (result == false) {
	            		status.html("Only text file");
	            		bar.width("0%");
				        percent.html("0%");
	            	} else {
	            		status.html(result);
	            	} 
	            }
	        });
		}
    });

    $(".readfile").click(function() {
    	var file_name = document.getElementById("fileToUpload").files[0].name;
    	var type = this.id;
    	var status = $('#status');
    	if (file_name) {
	    	$.ajax({
	    		url: "ajax.php",
	    		type: "post",
	    		data: {
	    			readfile: file_name,
	    			type: type
	    		},
	    		success: function(result) {
	        		status.html(result);
	    		}
	    	});
    	}
	});

	$("#csv").click(function() {
    	window.open("ajax.php?download='csv'", "_blank");
	});

});