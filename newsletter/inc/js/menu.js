<!--

    var currentSwap = false;
    var arg;

    function swapOptions(action,area,swap)
    {

        if(swap==false)
        {
            if(action=="hide")
                currentSwap=false;
            else if(action=="show")
                currentSwap=true;
        }


        if(area=="smtp")arg="smtp_settings_show";


        document.getElementById(arg).style.display = currentSwap ? "" : "none";
        currentSwap = !currentSwap;

	}


// -->