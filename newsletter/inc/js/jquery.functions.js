
$(document).ready(function()
{

	/*
	################
	Licence Scripts
	################
	*/
	
	function licence_validate()
	{
		//execute admin_checksum.php and pass all form variables of admin_licence.php
		$.post("inc/admin_checksum.php", $("#licence_form").serialize(),
		function(data)
		{
			if(data.checksum == "true")
			{ 
				$("#serialnumber_correct").html("<img src=\"images/licence_correct.png\" /> valid licence ("+data.test+")");
			}
			else
			{
				$("#serialnumber_correct").html("<img src=\"images/licence_error.png\" /> no valid licence");
			}
		}, "json");
				
		return false;	
	}
	
	//call function on page load
	$(function() 
	{
		licence_validate();
	});
	
	//catch events from key ups from the form fields
	$("#licence_domain").keyup(function()
	{	
		licence_validate();
	});	
	
	$("#licence_serialnumber").keyup(function()
	{	
		licence_validate();
	});	
	
	
	/*
	###################
	File Browser Script
	###################
	*/
	
	$("#filebrowser").click(function()
	{
		//call function from divtools.js
		showPart('browser');
		$("#item_browser").html("Loading...");
		
		$.post("inc/admin_filebrowser.php", "",
		function(data)
		{
			$("#item_browser").html(data);
		}, "json");
				
		return false;	
				
    });


	
});
