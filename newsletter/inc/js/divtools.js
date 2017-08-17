<!--

/* Popups */
function archiv(url)
{
    open(url, 'archiv', "toolbar=0,scrollbars=1,location=0,status=0,menubar=0,resizable=1,width=400px,height=300px");
    href = url;
}
function groupedit(url)
{
    open(url, 'groupedit', "toolbar=0,scrollbars=1,location=0,status=0,menubar=0,resizable=0,width=250px,height=320px");
    href = url;
}
function blacklist(url)
{
    open(url, 'blacklist', "toolbar=0,scrollbars=1,location=0,status=0,menubar=0,resizable=0,width=250px,height=250px");
    href = url;
}


function dropdown(targ,selObj,restore)
{
	eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
    if(restore)
    {
    	selObj.selectedIndex=0;
    }
}

function roll_over(img_name, img_src)
{
    document.images[img_name].src = img_src;
}

/* Make Textarea smaler or larger */
function bigger()
{

	if(document.nletter_form.text.rows <= 40)
	{
		document.nletter_form.text.rows += 5;
	}
}
function smaller()
{
	if(document.nletter_form.text.rows >= 9)
	{
		document.nletter_form.text.rows -= 5;
	}
}

/* FCKeditor plugin */
/*
function selectObject(myValue,myField)
{
    var oEditor = FCKeditorAPI.GetInstance(myField) ;
    var myObj=oEditor.EditorDocument;
    var myText="";

    if (myObj.selection)
    {

        myText += "<img src="+myValue+">";
        oEditor.InsertHtml(myText);
    }
    else if (myObj.selectionStart || myObj.selectionStart == '0')
    {
        var startPos = myObj.selectionStart;
        var endPos = myObj.selectionEnd;
        myText = myText.substring(0, startPos)+"<img src=" + myValue+">"+ myText.substring(endPos, myText.length);
        oEditor.InsertHtml(myText);
    }
    else
    {
        myText += "<img src="+myValue+">";
        oEditor.InsertHtml(myText);
    }
}
function selectObjectText(myValue,myField)
{
    var oEditor = FCKeditorAPI.GetInstance(myField) ;
    var myObj=oEditor.EditorDocument;
    var myText="";

    if (myObj.selection)
    {
        oEditor.InsertHtml(myValue);
    }
    else if (myObj.selectionStart || myObj.selectionStart == '0')
    {
        var startPos = myObj.selectionStart;
        var endPos = myObj.selectionEnd;
        myText = myText.substring(0, startPos)+myValue+ myText.substring(endPos, myText.length);
        oEditor.InsertHtml(myText);
    }
    else
    {
        oEditor.InsertHtml(myValue);
    }
}
*/



/* Image change */
function roll_over(img_name, img_src)
{
    document.images[img_name].src = img_src;
}


/* Open / Close Menu */
function showPart(elementID)
{
    if(document.getElementById("item_"+elementID).style.visibility == "hidden")
    {
        document.getElementById("item_"+elementID).style.visibility = "visible";
        document.getElementById("item_"+elementID).style.display = "block";
    }
    else
    {
        document.getElementById("item_"+elementID).style.visibility = "hidden";
        document.getElementById("item_"+elementID).style.display = "none";
    }
}
//-->