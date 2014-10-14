<?php 
	session_start();
	if(!isset($_SESSION['arr_woman'])){
		$_SESSION['arr_woman'] = array('Kate', 'Lana', 'Angelia', 'Svetlana', 'Anna', 'Helen', 'Iren', 'Julia', 'Lily');
	}
	if(!isset($_SESSION['arr_man'])){
	$_SESSION['arr_man'] = array('Nikola', 'Dmitry', 'Silvestr', 'Sherlock', 'Konstantin', 'Henry', 'Marshal', 'Ted', 'Alex');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form method="get"  action = "game.php">
<p><input name ="name"></p>
<p><input type="submit">Find a couple</p>
<p><input type="radio" name="sex" value="man">Man<input type="radio" name="sex" value="woman">Woman</p>
</form>
<?php
	$userName = $_GET["name"];
	$userChooseSex = $_GET["sex"];
	function mixOfArray($array){

		 $keys = array_keys($array);
		 $values = array_values($array);
			 
		shuffle($keys);
		shuffle($array);
		$i = 0;
		foreach($keys as $key) {
			$arr_assoc_new[$key] = $array[$i];
			$i++;
		} 
		return $arr_assoc_new;
	}
	
	
	if($userName != "" &&  $userChooseSex != ""){
		if($userChooseSex == "man")
		{
			$arr = mixOfArray($_SESSION['arr_man']);
			if(in_array($userName, $_SESSION['arr_woman']))
			{
				$rand = array_rand($arr, 1);
				$tmp = $_SESSION['arr_man'][$rand];
				echo "<p class='css3-blink'>$userName + $tmp = Happy Couple!</p>";
			
			}else
			{	
				$_SESSION['arr_woman'][] = $userName;
				$arr = mixOfArray($_SESSION['arr_man']);
				$rand = array_rand($arr, 1);
				$tmp = $_SESSION['arr_man'][$rand];
				echo "<p class='css3-blink'>$userName + $tmp = Happy Couple!</p>";;
			}
			
		}else
		{
			$arr = mixOfArray($_SESSION['arr_woman']);
			if(in_array($userName, $_SESSION['arr_man']))
			{
				$rand = array_rand($arr, 1);
				$tmp = $_SESSION['arr_woman'][$rand];
				echo "<p class='css3-blink'>$userName + $tmp = Happy Couple!</p>";
			
			}else
			{	
				$_SESSION['arr_man'][] = "$userName";
				$arr = mixOfArray($_SESSION['arr_woman']);
				$rand = array_rand($arr, 1);
				$tmp = $_SESSION['arr_woman'][$rand];
				echo "<p class='css3-blink'>$userName + $tmp = Happy Couple!</p>";
			}
			
		}
	}
	var_dump($_SESSION['arr_woman']);
?>
</body>
</html>