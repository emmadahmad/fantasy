$(document).ready(function()
{
	$("#notices").hide();

	var player_limit = 11;
	var team_cash = parseFloat($("#team_cash").text()).toFixed(1);
	var team_value = parseFloat($("#team_value").text()).toFixed(1);

	var player_counter = $("#player_cart ul li:not(.placeholder)").length;
	$( ".drag" ).draggable({
		appendTo: "body",
		helper: "clone",
		cursor: "pointer",
		revert: "invalid"
	});

	$( "#player_cart" ).droppable(
	{
		activeClass: "ui-state-default",
		hoverClass: "ui-state-hover",
		accept: ":not(.ui-sortable-helper) :not(.listed)",
		drop: function( event, ui ) 
		{
			var id = ui.draggable.data('id');
			var price = parseFloat(ui.draggable.data('price')).toFixed(1);
			if(player_counter < player_limit)
			{
				$( this ).find( ".placeholder" ).remove();
				$( "<li class='list-group-item ui-sortable-handle' data-id='"+id+"' data-price='"+price+"'></li>" ).html( "<span class='badge'><a href='javascript:void(0);' class='remove-player'><span class='glyphicon glyphicon-remove'></span></a></span><span class='badge'>"+price+" M</span>"+ui.draggable.text() ).appendTo( "#player_cart ul" );
				$("#player_list").append("<input type='hidden' name='players[]' value='" + id + "'>");
				team_value = parseFloat(team_value)+parseFloat(price);
				team_value = team_value.toFixed(1);
				team_cash = parseFloat(team_cash)-parseFloat(price);
				team_cash = team_cash.toFixed(1);
				$("#team_value").text(team_value);
				$("#team_cash").text(team_cash);

				ui.draggable.addClass("listed");
				player_counter++;
				check_player_counter();
			}
			else
			{
				$(this).droppable("disable");
				$("#notices").html("<div class='alert alert-danger'>Cannot Add more than 11 players</div>");
				$("#notices").show();
			}
		}
	}).sortable(
	{
		items: "li:not(.placeholder)",
		sort: function() 
		{
			// gets added unintentionally by droppable interacting with sortable
			// using connectWithSortable fixes this, but doesn't allow you to customize active/hoverClass options
			$( this ).removeClass( "ui-state-default" );
		}
	});

	$(document).on('click' , '.remove-player' , function()
	{
		$("#notices").hide();
		var id = $(this).closest(".list-group-item").data('id');
		var price = parseFloat($(this).closest(".list-group-item").data('price')).toFixed(1);
		$(this).closest(".list-group-item").remove();
		team_value = parseFloat(team_value)-parseFloat(price);
		team_value = team_value.toFixed(1);
		team_cash = parseFloat(team_cash)+parseFloat(price);
		team_cash = team_cash.toFixed(1);
		$("#team_value").text(team_value);
		$("#team_cash").text(team_cash);

		$("#player_list input[value='" + id + "']").remove();
		player_counter--;
		check_player_counter();
		if($(".drag[data-id='" + id + "']").hasClass("listed"))
		{
			$(".drag[data-id='" + id + "']").removeClass("listed")
		}
		if (player_counter <= player_limit)
		{
			$( "#player_cart" ).droppable("enable");
		}
		if(player_counter == 0)
		{
			$("#player_cart ul").append("<li class='placeholder list-group-item'>Add your Players here</li>");
		}
	});

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

function check_player_counter()
{
	var player_counter = $("#player_cart ul li:not(.placeholder)").length;
	var player_limit = 11;
	if (player_counter < player_limit)
	{
		$("button#update_player").attr("disabled",true);
	}
	else
	{
		$("button#update_player").attr("disabled",false);
	}
}

		