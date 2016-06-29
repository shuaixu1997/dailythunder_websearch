<!DOCTYPE html>
<html>
<body>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<body class="w3-container">
<style>
a:hover {
    background-color: blue;
	font-size: 20px;
}

</style>
<h2>Search Result!</h2>
<form action="keyword.php" method="post">
  Keyword: <input id="keywordtext" type="text" name="name" >
  <h6 class="w3-btn w3-small" onclick= "clearField()">Clear </h6>
  <br>
  Quick Search:
	<input id="durant" type="radio" name="keyword" value="Durant" 
	onclick="document.getElementById('keywordtext').value= value" >Durant
	<input id="westbrook" type="radio" name="keyword" value="Westbrook" 
	onclick="document.getElementById('keywordtext').value= value" >Westbrook
	<input id="roberson" type="radio" name="keyword" value="Roberson"
	onclick="document.getElementById('keywordtext').value= value" >Roberson
	<br>
	Display:
	<input type="radio" name="displaynumber" value="5" >5
	<input type="radio" name="displaynumber" value="10" >10
	<input type="radio" name="displaynumber" value="20">20
	<input type="radio" name="displaynumber" value="all">all
	<br>
	<br>
    <input method="post" action="keyword.php" name="keyword" class="w3-btn" type="submit">
</form>
<p id="waiting" disabled="disabled">please be patient for a second...</p>
<br>
This is your keyword: <?php echo $_POST["name"]; ?><br>
display number: <?php echo $_POST["displaynumber"]; ?><br>
<br>
<?php 
	

	$myfile = fopen("keyword.txt", "w") or die("Unable to open file!");
	$txt = $_POST["name"];
	fwrite($myfile, $txt);
	fclose($myfile)
?>
<br>
<?php 
	

	$myfile = fopen("num.txt", "w") or die("Unable to open file!");
	$txt = $_POST["displaynumber"];
	fwrite($myfile, $txt);
	fclose($myfile)
?>
<?php
	echo getcwd() . "\n";
	#putenv('PYTHONPATH=c:/Python34/Lib/urllib');
	$command = escapeshellcmd('C:/users/lenovo/dailythunder.py');
	# --D:/xampp/htdocs/dailythunder/dailythunder_php.py');
	$output = shell_exec($command);
	echo $output;
?>
<br>
<a class="w3-btn" href="./dailythunder.html">Return to Dailythunder Search page</a>
<br>
<a class="w3-btn" href="../index.html">Return to main page</a>
<script>
function clearField() {
	if (keywordtext.disabled == true)	{
	keywordtext.disabled = null	;
	}
	keywordtext.value="";
	openRadio();
}

function closeField() {
	keywordtext.value="";
	keywordtext.disabled="disabled";
}

function openRadio() {
	durant.checked=	null;
	westbrook.checked= null;
	roberson.checked= null;
}

</script>
</body>
</html>