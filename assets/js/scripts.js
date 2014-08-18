$(document).ready(function()
{
  $(".validate_form").validationEngine('attach', {
		promptPosition : "topLeft", 
		binded: false
	});

  $('#page_spinner').modal({
  		backdrop : 'static',
	  	keyboard : false,
	  	show : false
	});

  //$.blockUI();
});
