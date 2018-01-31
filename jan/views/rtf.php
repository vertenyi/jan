<!doctype = html>
<html lang="en">
<head>
<meta charset="utf8">
<title>.eriol's editor v 0.2</title>

<script type="text/javascript" >
function doFrameOn(){rtField.document.designMode = 'On';}
function doBold(){rtField.document.execCommand('bold',false,null); }
function doUnderline(){	rtField.document.execCommand('underline',false,null);}
function doItalic(){rtField.document.execCommand('italic',false,null); }
function doHr(){rtField.document.execCommand('inserthorizontalrule',false,null);}
function doOl(){rtField.document.execCommand("InsertOrderedList", false,"newOL");}
function doUl(){rtField.document.execCommand("InsertUnorderedList", false,"newUL");}
function doUnLink(){rtField.document.execCommand("Unlink", false, null);}
function doLink(){
	var linkURL = prompt("Enter the URL for this link:", "http://"); 
	rtField.document.execCommand("CreateLink", false, linkURL);
}
function doSize(){	
	var size = prompt('Enter a size 1 - 7', '');
	rtField.document.execCommand('FontSize',false,size);
}
function doColor(){
	var color = prompt('Define a basic color or apply a hexadecimal color code for advanced colors:', '');
	rtField.document.execCommand('ForeColor',false,color);
}
function doImage(){
	var imgSrc = prompt('Enter image location', '');
    if(imgSrc != null){ rtField.document.execCommand('insertimage', false, imgSrc); }
}
function submitform(){
	var theForm = document.getElementById("myform");
	theForm.elements["rtArea"].value = window.frames['rtField'].document.body.innerHTML;
	theForm.submit();
}

</script>
<style>
#controlpanel{padding:12px; width:700px;}
#rtArea{display:none;}
#rtField{border:#000000 1px solid; width:700px; height:300px;}
</style>
</head>

<body onLoad="doFrameOn();">

<h3>.eriol's text editor</h3>

<?php 
if (isset($_POST['rtArea'])){
echo '<h2>You posted:</h2><hr />'. $_POST['title'] . '<hr />' . stripslashes($_POST['rtArea']);
}
?>


<form action="rtf.php" name="myform" id="myform" method="post">
<p>Title: <input name="title" id="title" type="text"><input name="myBtn" type="button" value="Save" onClick="javascript:submitform();"/></p>

<div id="controlpanel">
  <input type="button" onClick="doBold()" value="B"> 
  <input type="button" onClick="doUnderline()" value="U">
  <input type="button" onClick="doItalic()" value="I">
  <input type="button" onClick="doSize()" value="Text Size">
  <input type="button" onClick="doColor()" value="Text Color">
  <input type="button" onClick="doHr()" value="HR">
  <input type="button" onClick="doUl()" value="UL">
  <input type="button" onClick="doOl()" value="OL">
  <input type="button" onClick="doLink()" value="Link">
  <input type="button" onClick="doUnLink()" value="UnLink">
  <input type="button" onClick="doImage()" value="Image">
</div>

<p>

<textarea name="rtArea" id="rtArea" cols="100" rows="14"></textarea>
<iframe name="rtField" id="rtField"></iframe>


</p>

</form>
</body>
</html>