<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

/* Security Check */
if(!defined('template')) die('You can\'t access templates directly!');

echo $COPYRIGHT;

echo "<html>\n";
echo "<head>\n";
echo "<title>NLetter</title>\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />";
echo "<link rel=\"stylesheet\" href=\"".$file_root."/tpl/styles.css\" type=\"text/css\" />\n";

// output the xajax javascript. This must be called between the head tags
if($AJAX)
{
    $xajax->printJavascript();
	?>
    <script type="text/javascript">
        xajax.callback.global.onRequest = function() {xajax.$('loading').style.display = 'block';}
        xajax.callback.global.beforeResponseProcessing = function() {xajax.$('loading').style.display='none';}
    </script>
	<?php
}
?>
<script language="JavaScript">
<!--
function newsletter(url)
{
    open(url, 'newsletter', "toolbar=0,scrollbars=1,location=0,status=0,menubar=0,resizable=1,width=500px,height=400px");
    href = url;
}
-->
</script>
<?php
echo "</head>\n";
echo "<body class=\"output\">\n";


    echo "<table style=\"";
    if(!empty($STYLE_WIDTH))
        echo "width:".$STYLE_WIDTH."px;";
    if(!empty($STYLE_BGCOLOR))
        echo "background-color:".$STYLE_BGCOLOR.";";

    echo "background-image:url(".$STYLE_BACKGROUND.");\"><tr><td>";

?>