$(document).ready(function()
{
	var team_rules = null;
	var team_rules_mm = null;
	var player_limit = 11;
	var team_cash = parseFloat($("#team_cash").text()).toFixed(1);
	var team_value = parseFloat($("#team_value").text()).toFixed(1);
	var player_counter = $("#player_cart ul li:not(.placeholder)").length;

	var type_count = get_type_count(0);

	$("#notices").hide();

	$.ajax({
	    type: "POST",
	    dataType: "json",
	    url: '/fantasy/ajax/getTeamRules',
	   
	    success: function (data, textStatus) 
	    {
	    	team_rules = data;
	    	team_rules_mm = rule_max_min(data);
	    },

	    error: function(data, textStatus, errorThrown)
	    {
	    	console.log(textStatus);
	    }
	});

	
	
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
			var type = ui.draggable.data('type');
			var price = parseFloat(ui.draggable.data('price')).toFixed(1);
			if(player_counter < player_limit)
			{
				if(check_player_rules(type,team_rules_mm,team_rules,player_counter))
				{
					$( this ).find( ".placeholder" ).remove();
					$( "<li class='list-group-item ui-sortable-handle' data-id='"+id+"' data-price='"+price+"' data-type='"+type+"'></li>" ).html( "<span class='badge'><a href='javascript:void(0);' class='remove-player'><span class='glyphicon glyphicon-remove'></span></a></span><span class='badge'>"+price+" M</span>"+ui.draggable.text() ).appendTo( "#player_cart ul" );
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
		type_count = update_type_count();
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

function check_player_rules(type,rulesmm,rules,counter)
{
	var allowed = false;
	var type_count = get_type_count(type);

	if(counter > 5)
	{
		if(type == 1)
		{
			if(type_count.batsmen <= rulesmm.bat_max)
			{
				allowed = true;
			}
			else
			{
				allowed = false;
			}
		}
		else if(type == 2)
		{
			if(type_count.bowlers <= rulesmm.bowl_max)
			{
				allowed = true;
			}
			else
			{
				allowed = false;
			}
		}
		else if(type == 3)
		{
			if(type_count.all_rounders <= rulesmm.ar_max)
			{
				allowed = true;
			}
			else
			{
				allowed = false;
			}
		}
		else if(type == 4)
		{
			if(type_count.wicket_keepers <= rulesmm.wk_max)
			{
				allowed = true;
			}
			else
			{
				allowed = false;
			}
		}
	}
	else
	{
		allowed = true;
	}

	if(counter == 10)
	{
		var result = $.grep(rules, function(e)
		{
			if(e.batsmen == type_count.batsmen || e.bowlers == type_count.bowlers || e.all_rounders == type_count.all_rounders || e.wicket_keepers == type_count.wicket_keepers)
			{
				return e;
			}
		});

		if(result.length == 1)
		{
			allowed = true;
		}
		else
		{
			allowed = false;
		}
	}
		
	console.log(allowed);
	return allowed;
}

function update_type_count()
{
	var type_count = get_type_count(0);
	console.log(type_count);
	return type_count;
}

function get_type_count(type)
{
	var type_count = {
		'batsmen' : $("#player_cart ul").find("[data-type=1]").length,
		'bowlers' : $("#player_cart ul").find("[data-type=2]").length,
		'all_rounders' : $("#player_cart ul").find("[data-type=3]").length,
		'wicket_keepers' : $("#player_cart ul").find("[data-type=4]").length
	};

	if(type == 0)
	{
		return type_count;
	}
	else
	{
		if(type == 1)
		{
			type_count.batsmen++;
		}
		else if(type == 2)
		{
			type_count.bowlers++;
		}
		else if(type == 3)
		{
			type_count.all_rounders++;
		}
		else if(type == 4)
		{
			type_count.wicket_keepers++;
		}

		return type_count;
	}	
}

function rule_max_min(data)
{
	var bat_min = data[0].batsmen;
	var bat_max = data[0].batsmen;
	var bowl_min = data[0].bowlers;
	var bowl_max = data[0].bowlers;
	var wk_min = data[0].wicket_keepers;
	var wk_max = data[0].wicket_keepers;
	var ar_min = data[0].all_rounders;
	var ar_max = data[0].all_rounders;

	for(var i = 0 ; i < data.length ; i++)
	{
		if(data[i].batsmen < bat_min)
		{
			bat_min = data[i].batsmen;
		}
		if(data[i].batsmen > bat_max)
		{
			bat_max = data[i].batsmen;
		}

		if(data[i].bowlers < bowl_min)
		{
			bowl_min = data[i].bowlers;
		}
		if(data[i].bowlers > bowl_max)
		{
			bowl_max = data[i].bowlers;
		}

		if(data[i].wicket_keepers < wk_min)
		{
			wk_min = data[i].wicket_keepers;
		}
		if(data[i].wicket_keepers > wk_max)
		{
			wk_max = data[i].wicket_keepers;
		}

		if(data[i].all_rounders < ar_min)
		{
			ar_min = data[i].all_rounders;
		}
		if(data[i].all_rounders > ar_max)
		{
			ar_max = data[i].all_rounders;
		}
	}
	var rules = {
		'bat_min' : bat_min,
		'bat_max' : bat_max,
		'bowl_min' : bowl_min,
		'bowl_max' : bowl_max,
		'wk_min' : wk_min,
		'wk_max' : wk_max,
		'ar_min' : ar_min,
		'ar_max' : ar_max
	};
	return rules;
}

		