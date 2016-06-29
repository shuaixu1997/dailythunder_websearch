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

<h2>Dailythunder nba comments search!</h2>

<form action="keyword.php" method="post">
Keyword: <input type="text" name="name" ><br>

<input class="w3-btn" type="submit">
</form>

<p>please be patient for a second...</p>
<form method="post" action="printname.php">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>

<br>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['fname']; 
    if (empty($name)) {
        echo "Name is empty";
    } else {
        echo $name;
    }
}
?>
<br>

<a class="w3-btn" href="../index.html">Return to main page</a>
</body>
</html>
