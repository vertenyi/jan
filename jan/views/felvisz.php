<?php 
require_once('header.php');
?>
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
var cssLink = document.createElement("link");
cssLink.href = "/style/general.css";  
cssLink.rel = "stylesheet";  
cssLink.type = "text/css";  
frames['rtField'].document.body.appendChild(cssLink); 
</script>
<style>
#controlpanel{padding:12px; width:700px;}
#rtArea{display:none;}
#rtField{border:#000000 1px solid; width:700px; height:300px;}
</style>


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
  <span class="btn" onClick="doBold()" title="bold">
	<b>b</b>
  </span> 
  <span class="btn" onClick="doUnderline()" title="underline">
	<u>u</u>
  </span>
  <span class="btn" onClick="doItalic()" title="italic">
	<i style="visibility: hidden;">i</i><i style="text-transform: lowercase;">i</i>
  </span>
  <span class="btn" onClick="doSize()" title="font-size">
	Text Size
  </span>
  <span class="btn" onClick="doColor()" title="font-color">
	Color
  </span>
  <span class="btn" onClick="doHr()" title="horizontal rule">
	-
  </span>
  <span class="btn" onClick="doUl()" title="unordered list">
	ul
  </span>
  <span class="btn" onClick="doOl()" title="ordered list">
	ol
  </span>
  <span class="btn" onClick="doLink()" title="link">
	href:
  </span>
  <span class="btn" onClick="doUnLink()" title="disable link">
	unlink
  </span>
  <span class="btn" onClick="doImage()" title="image">
	image
  </span>
</div>

<p>

<textarea name="rtArea" id="rtArea" cols="100" rows="14"></textarea>
<iframe name="rtField" id="rtField" class="article"></iframe>


</p>

</form>

<?php 
require_once('footer.php');
?>