<!--

wmtt = null;



function updateTIP(e)
{
	x = (document.all) ? window.event.x + document.body.scrollLeft : e.pageX;
	y = (document.all) ? window.event.y + document.body.scrollTop  : e.pageY;
	if (wmtt != null)
	{
		wmtt.style.left = (x + 20) + "px";
		wmtt.style.top 	= (y + 20) + "px";
	}
}
function updateTIP_left(e)
{
	x = (document.all) ? window.event.x + document.body.scrollLeft : e.pageX;
	y = (document.all) ? window.event.y + document.body.scrollTop  : e.pageY;
	if (wmtt != null)
	{
		wmtt.style.left = (x - 550) + "px";
		wmtt.style.top 	= (y + 20) + "px";
	}
}

function showTIP(id)
{
	document.onmousemove = updateTIP;
	wmtt = document.getElementById(id);
	wmtt.style.display = "block"
}

function showTIP_left(id)
{	
	document.onmousemove = updateTIP_left;
	wmtt = document.getElementById(id);
	wmtt.style.display = "block"
}

function hideTIP()
{
	wmtt.style.display = "none";
}

// -->