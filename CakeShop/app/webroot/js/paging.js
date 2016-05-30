$(document).ready(function(){
	$('.paging a').click(function(e) {
		e.preventDefault();
		$('#page').val($(this).text());
		$("#form").submit();
	});
});