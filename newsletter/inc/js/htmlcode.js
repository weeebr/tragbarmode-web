<!--

function insertcode(string)
{
     document.nletter_form.text.value = document.nletter_form.text.value + string;
     document.nletter_form.text.focus();
}

function insert_table()
{
	finisched_lines="placer";
	finisched_rows="placer";

	if(finisched_lines!="" && finisched_lines!=null)
	{
	entry_lines=window.prompt("Bitte Anzahl der Reihen festlegen", "");
	finisched_lines="finish";
	}

	//------------------------------

	if(finisched_lines=="finish")
	{
	entry_rows=window.prompt("Bitte Anzahl der Spalten festlegen", "");
	finisched_rows="finish";
	}

	//--------------------------------

	if(finisched_lines=="finish" && finisched_rows=="finish" && (entry_lines!=null && entry_rows!=null))
	{
	document.nletter_form.text.value+="<table>\n";

		for(var i=0;i<entry_lines;i++)
		{
		document.nletter_form.text.value+="<tr>";

            for(var j=0;j<entry_rows;j++)
            {
            document.nletter_form.text.value+="<td></td>";
            }

		document.nletter_form.text.value+="</tr>";
		}

	document.nletter_form.text.value+="\n</table>\n";
	}

}

function insert_table_img()
{
    formated_text=window.prompt("URL zum Bild eingeben\n<img src=\"\">","http://");
    if ((formated_text!=null) && (formated_text!=""))
    {
	document.nletter_form.text.value+="\n<table>\n<tr><td><img src=\""+ formated_text +"\"></td><td>...</td></tr>\n</table>\n";
    }
}

function insert_paragraph()
{

    old_text=document.nletter_form.text.value;
    new_text=old_text+"\n<br>\n";
    document.nletter_form.text.value=""+new_text;

}

function insert_b()
{
    formated_text=window.prompt("Text eingeben, der formatiert werden soll\n<b>...</b>","");
    if ((formated_text!=null) && (formated_text!=""))
    {
    old_text=document.nletter_form.text.value;
    new_text=old_text+"<b>"+formated_text+"</b>";
    document.nletter_form.text.value=""+new_text+" ";
    }
}

function insert_i()
{
    formated_text=window.prompt("Text eingeben, der formatiert werden soll\n<i>...</i>","");
    if ((formated_text!=null) && (formated_text!=""))
    {
    old_text=document.nletter_form.text.value;
    new_text=old_text+"<i>"+formated_text+"</i>";
    document.nletter_form.text.value=""+new_text+" ";
    }
}

function insert_u()
{
    formated_text=window.prompt("Text eingeben, der formatiert werden soll\n<u>...</u>","");
    if ((formated_text!=null) && (formated_text!=""))
    {
    old_text=document.nletter_form.text.value;
    new_text=old_text+"<u>"+formated_text+"</u>";
    document.nletter_form.text.value=""+new_text+" ";
    }
}

function insert_s()
{
    formated_text=window.prompt("Text eingeben, der formatiert werden soll\n<s>...</s>","");
    if ((formated_text!=null) && (formated_text!=""))
    {
    old_text=document.nletter_form.text.value;
    new_text=old_text+"<s>"+formated_text+"</s>";
    document.nletter_form.text.value=""+new_text+" ";
    }
}

//-------------------------------------------------

function insert_color()
{
    formated_text1=window.prompt("Text eingeben, der eingefärbt werden soll","");
    if ((formated_text1!=null) && (formated_text1!=""))
    {
    	formated_text2=window.prompt("Bitte Farbe eingeben","");
        if ((formated_text2!=null) && (formated_text2!=""))
        {
        old_text=document.nletter_form.text.value;
        new_text=old_text+"<font color=\""+formated_text2+"\">"+formated_text1+"</font>";
        document.nletter_form.text.value=""+new_text+" ";
        }
    }
}

function insert_size()
{
    formated_text1=window.prompt("Text eingeben, dessen Größe geändert werden soll","");
    if ((formated_text1!=null) && (formated_text1!=""))
    {
    	formated_text2=window.prompt("Bitte Textgröße eingeben","");
        if ((formated_text2!=null) && (formated_text2!=""))
        {
        old_text=document.nletter_form.text.value;
        new_text=old_text+"<font size=\""+formated_text2+"\">"+formated_text1+"</font>";
        document.nletter_form.text.value=""+new_text+" ";
        }
    }
}

function insert_font()
{
    formated_text1=window.prompt("Text eingeben, dessen Schriftart geändert werden soll","");
    if ((formated_text1!=null) && (formated_text1!=""))
    {
    	formated_text2=window.prompt("Bitte Schriftart eingeben","");
        if ((formated_text2!=null) && (formated_text2!=""))
        {
        old_text=document.nletter_form.text.value;
        new_text=old_text+"<font face=\""+formated_text2+"\">"+formated_text1+"</font>";
        document.nletter_form.text.value=""+new_text+" ";
        }
    }
}


//-------------------------------------------------

function insert_img()
{
    formated_text=window.prompt("Adresse zum Bild eingeben\n<img src=\"\">","http://");
    if ((formated_text!=null) && (formated_text!=""))
    {
    old_text=document.nletter_form.text.value;
    new_text=old_text+"<img src=\""+formated_text+"\">";
    document.nletter_form.text.value=""+new_text+" ";
    }
}

function insert_url()
{
    formated_text1=window.prompt("Text des Links eingeben","");
    if ((formated_text1!=null) && (formated_text1!=""))
    {
    	formated_text2=window.prompt("Bitte die URL eingeben","");
        if ((formated_text2!=null) && (formated_text2!=""))
        {
        old_text=document.nletter_form.text.value;
        new_text=old_text+"<a href=\""+formated_text2+"\">"+formated_text1+"</a>";
        document.nletter_form.text.value=""+new_text+" ";
        }
    }
}

function insert_email()
{
    formated_text1=window.prompt("Text des Mail Links eingeben","");
    if ((formated_text1!=null) && (formated_text1!=""))
    {
    	formated_text2=window.prompt("Bitte die Mail Adresse eingeben","");
        if ((formated_text2!=null) && (formated_text2!=""))
        {
        old_text=document.nletter_form.text.value;
        new_text=old_text+"<a href=\"mailto:"+formated_text2+"\">"+formated_text1+"</a>";
        document.nletter_form.text.value=""+new_text+" ";
        }
    }
}

//-------------------------------------------------

function insert_center()
{
    formated_text=window.prompt("Text eingeben, der formatiert werden soll\n<center>...</center>","");
    if ((formated_text!=null) && (formated_text!=""))
    {
    old_text=document.nletter_form.text.value;
    new_text=old_text+"<center>"+formated_text+"</center>";
    document.nletter_form.text.value=""+new_text+" ";
    }
}

function insert_right()
{
    formated_text=window.prompt("Text eingeben, der formatiert werden soll\n<p align=right>...</p>","");
    if ((formated_text!=null) && (formated_text!=""))
    {
    old_text=document.nletter_form.text.value;
    new_text=old_text+"<p align=\"right\">"+formated_text+"</p>";
    document.nletter_form.text.value=""+new_text+" ";
    }
}

function insert_list()
{
	list_begin="<ul>\n";
	list_end="</ul> ";
	list="";
	listentry="placer";

	while(listentry!="" && listentry!=null)
	{
	listentry=window.prompt("Bitte Element der Liste angeben\nAuf \"Abbrechen\" klicken um die Liste abzuschließen", "");

		if(listentry!="" && listentry!=null)
		{
		list+="<li>"+listentry+"\n";
		}
	}

	if(list!="")
	{
	document.nletter_form.text.value+=list_begin+list+list_end;
	document.nletter_form.text.focus();
	}

list_begin="";
list_end="";
list="";
}

// -->