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

	$('.date_only').datetimepicker({
		pickTime: false
	});

	$('.time_only').datetimepicker({
		pickDate: false
	});

	$('.player_match_stats').hide();
	$('.hidden_fields').hide();
	$('.display_stats').show();	

	$('.batted-check').change(function() 
	{
		var id = $(this).val();
        if($(this).is(":checked"))
        {
        	$("#batted-" + id).show();
        }
        else
        {
        	$("#batted-" + id).hide();
        }
    });

    $('.bowled-check').change(function() 
	{
		var id = $(this).val();
        if($(this).is(":checked"))
        {
        	$("#bowled-" + id).show();
        }
        else
        {
        	$("#bowled-" + id).hide();
        }
    });

    $('.dismissal-type').on('change', function()
    {
    	var id = $(this).data('player-id');
    	if($(this).val() == 3)
    	{
    		$(".dismissal_player1-" + id).show();
    		$(".dismissal_player2-" + id).show();
    	}
    	else if($(this).val() != 7)
		{
    		$(".dismissal_player1-" + id).show();
    		$(".dismissal_player2-" + id).hide();
    	}
    	else if($(this).val() == 7)
		{
    		$(".dismissal_player1-" + id).hide();
    		$(".dismissal_player2-" + id).hide();
    	}
    });

    

	/*
	*
	* AJAX CALLS
	*
	*/

	$('#select_country_players').on('change', function()
	{
		$('#page_spinner').modal('show');
		$.ajax({
		    type: "POST",
		    //dataType: "json",
		    url: '/admin/ajax/selectCountryPlayers',
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

	$('#select_country_matches').on('change', function()
	{
		$('#page_spinner').modal('show');
		$.ajax({
		    type: "POST",
		    //dataType: "json",
		    url: '/admin/ajax/selectCountryMatches',
		    data: {country_id : $(this).val()},
		    async: false,
		   
		    success: function (data, textStatus) 
		    {
		    	$('#page_spinner').modal('hide');
		    	//console.log(data);
		    	$("#match_table_body").html(data);
		    },

		    error: function(data, textStatus, errorThrown)
		    {
		    	console.log(textStatus);
		    }
		});
	});
});

		