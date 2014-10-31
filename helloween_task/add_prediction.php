<?php
	$host = '127.0.0.1';
	$user = 'root';
	$pass = '';
	$predictions_table = 'predictions_table';
	$db_name = 'helloween';

	$link = mysqli_connect($host , $user, $passw);//create connection
	if(!$link){
		echo "Connection failure";
	}
	
	mysqli_select_db($link,$db_name);//connect to the database
	$predict_rez = mysqli_query($link,"select * from " . $predictions_table);//send request to the table from the database to get all values from it
	
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src='http://use.edgefonts.net/butcherman.js'></script>
</head>
<body class="main_add">
	<form method="get"  action = "add_prediction.php"> 
		<p class="choose_pict">Enter your prediction and chose picture for it</p>
		<p><textarea maxlength="500" name ="prediction" class="add_file" placeholder="Enter your prediction..."></textarea></p>
		<div><img id="bloody" src="imgs\Dogs-Blood.png"></div>
		<p><input class="file_add" type="file" name ="picture" multiple accept="image/jpeg,image/png"></p>
		<input class="adding" type="submit" value="Add">
		<div><img id="ghost3" src="imgs\ghost3.png"></div>
		<div><img id="pumpkin1" src="imgs\Jack-O-Lantern.png"></div>
		<div><img id="pumpkin2" src="imgs\pumpkin01.png"></div>
	</form>
</body>
</html>
<?php
	$user_prediction = $_GET["prediction"];
	$user_picture = $_GET["picture"];
	if($user_prediction != null && $user_picture != null)
	{
		mysqli_query($link,'INSERT INTO `predictions_table`(prediction_content,picture_url) VALUES("'.$user_prediction.'","'.$user_picture.'")');
	}
?>