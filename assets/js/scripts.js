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

	$('#select_country').on('change', function()
	{
		$('#page_spinner').modal('show');
		$.ajax({
		    type: "POST",
		    //dataType: "json",
		    url: '/admin/ajax/selectCountry',
		    data: {country_id : $(this).val()},
		    async: false,
		   
		    success: function (data, textStatus) 
		    {
		    	$('#page_spinner').modal('hide');
		    	//console.log(data);
		    	$("#player_table_body").html(data);
		    },

		    error: function(data, textStatus, errorThrown)
		    {
		    	console.log(textStatus);
		    }
		});
	});
});

		