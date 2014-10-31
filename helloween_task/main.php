<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');//set utf-8

	$host = '127.0.0.1';
	$user = 'root';
	$pass = '';
	$predictions_to_show = 'predictions_table';
	$names_to_show = 'names_table';
	$db_name = 'helloween';

	$link = mysqli_connect($host , $user, $passw);//create connection
	if(!$link){
		echo "Connection failure";
	}
	
	mysqli_select_db($link,$db_name);//connect to the database
	$predict_rez = mysqli_query($link,"select * from " . $predictions_to_show);//send request to the table from the database to get all values from it
	$namez_rez = mysqli_query($link,"select * from " . $names_to_show);//send request to the table from the database to get all values from it

	while ($row = $predict_rez->fetch_assoc()) { //gives a value by row
		$i = $row['pk']; //set $i equals to primary key of table item
		$predict[$i] = $row; //create an associative array with all main menu items from the table
	}
	
	$_SESSION['prediction_array'] = $predict;
	
	while ($row2 = $namez_rez->fetch_assoc()) { //gives a value by row
		$i = $row2['pk']; //set $i equals to primary key of table item
		$names[$i] = $row2; //create an associative array with all main menu items from the table
	}
	
	$_SESSION['names_array'] = $names;
?>
<html>
<head>
	<script src='http://use.edgefonts.net/nosifer.js'></script>
	<script src='http://use.edgefonts.net/creepster.js'></script>
	<script src='http://use.edgefonts.net/emilys-candy.js'></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="main">
	<h1 class="title">HAPPY HELLOWEEN</h1>
	<form class="inputs" method="get"  action = "main.php">
		<div><img id="five" src="imgs\bld.png"></div>
		<p><textarea maxlength="20" class="name_area" name ="name" placeholder="Enter your name to see a prediction"></textarea></p>
		<p><input id="show_prd" type="submit" value="Your prediction"></p>
		<p><input id="add_page" type="button" value="Add prediction" onclick="location.href='add_prediction.php'"></p>
	</form>
	<div>
		<img id="ghost1" src="imgs\ghost2.png">
		
	</div>
	<div>
		<img id="ghost2" src="imgs\Ghost.png">
	</div>
	<script>
			var tmp1 = document.getElementById('ghost1');
			var tmp2 = document.getElementById('ghost2');
			setInterval(tmp1,1000);
			setInterval(tmp2, 1000);
	</script>
	<?php
		$userName = $_GET["name"];
		$flag = null;
		$result = count($_SESSION['names_array']);
		for($i = 1; $i<= $result; $i++)
		{
			$tmp1 = $_SESSION['names_array'][$i];
			$tmp2 = $_SESSION['prediction_array'][$i];
			if(strcasecmp($userName,$tmp1['name']) == 0)
			{					
				if($tmp1['fk'] == $tmp2['pk'])
				{
					echo("<p class='predict'>".$tmp2['prediction_content']."</p>");
					echo("<br>");
					echo("<img class = 'picture' height = '300px' width = '400px' src = ".$tmp2['picture_url'] .">");
					$flag = true;
					break;
				}
			}else 
			{
				$flag = false;
			}
		}
		if($flag == false && $userName != null)
		{	
			$tmp1 = $i - 5;
			$tmp2 = $_SESSION['prediction_array'][$i - 5];
			if(!in_array($userName,$_SESSION['names_array']))
			{
				$result = $result + 1;
				mysqli_query($link,'INSERT INTO `names_table`(fk,name) VALUES("'.$tmp1.'","'.$userName.'")');
				echo("<p class='predict'>".$tmp2['prediction_content']."</p>");
				echo("<br>");
				echo("<img class = 'picture' height = '200px' width = '400px' src = " .$tmp2['picture_url'].">");
				$i++;
			}	
				
		}
			
	?>
	
</body>
</html>
