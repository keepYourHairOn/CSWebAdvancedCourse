<?php
	session_start(); //start session
	
	$host = '127.0.0.1'; //set host value
	$user = 'root'; //set user's name
	$pass = ''; //set password
	$db_name = 'happy_pair'; //name of the database
	$girls_names = 'girls'; //name of table from the database
	$boys_names = 'boys'; //name of table from the database
	

	$link = mysql_connect($host , $user, $passw); //create connection
	
	if(!$link){
		echo "Connection failure";
	}else{
		echo "Connection success!";
	}
	mysql_select_db($db_name, $link); //connect to the database
	 
	$search_girls = mysql_query("select * from " . $girls_names); //send request to the table from the database to get all values from it
	$search_boys = mysql_query("select * from " . $boys_names); //send request to the table from the database to get all values from it
	 
	$arr_girls_names = array();
	
	while($data = mysql_fetch_array($search_girls)){ 
		$arr_girls_names[] = $data['names']; //gives a value by row 
	}
	 

	$arr_boys_names = array();
	
	while($data = mysql_fetch_array($search_boys)){ 
		$arr_boys_names[] = $data['names']; //gives a value by row
	}
	
	if(!isset($_SESSION['arr_woman'])){ //if array 'arr_woman' is not set, then it will be created with values from the array 'arr_girls_names'
		$_SESSION['arr_woman'] = $arr_girls_names;
	}
	if(!isset($_SESSION['arr_man'])){ //if array 'arr_man' is not set, then it will be created with values from the array 'arr_boys_names'
		$_SESSION['arr_man'] = $arr_boys_names;	
	}

?>
<html>
<head>
</head>
<body>
	<form method="get"  action = "game.php"> 
		<p><input name ="name"></p>
		<p><input type="submit">Find a couple</p>
		<p><input type="radio" name="sex" value="man">Man<input type="radio" name="sex" value="woman">Woman</p>
	</form>

<?php
	$userName = $_GET["name"]; //get value filled by the user
	$userChooseSex = $_GET["sex"]; //get value filled by the user
	function mixOfArray($array){ //mix array to change places of elements

		$keys = array_keys($array); //get all keys of array
		$values = array_values($array); //get all values of array
			 
		shuffle($keys); //random mix of keys
		shuffle($array); //random mix of array
		$i = 0;
		foreach($keys as $key) {
			$arr_assoc_new[$key] = $array[$i];
			$i++;
		} 
		return $arr_assoc_new;
	}
	
	
	if($userName != "" &&  $userChooseSex != ""){ //check if name of user and sex of partner were chosen
		if($userChooseSex == "man") //check for sex of partner
		{
			$arr = mixOfArray($_SESSION['arr_man']);
			
			if(in_array($userName, $_SESSION['arr_woman'])) //check if name of user is already present in array
			{
				$rand = array_rand($arr, 1);
				$tmp = $_SESSION['arr_man'][$rand];
				echo "<p class='css3-blink'>$userName + $tmp = Happy Couple!</p>";
			
			}else{	//if not then it will be added to the array
				$_SESSION['arr_woman'][] = $userName;
				$arr = mixOfArray($_SESSION['arr_man']);
				$rand = array_rand($arr, 1);
				$tmp = $_SESSION['arr_man'][$rand];
				echo "<p class='css3-blink'>$userName + $tmp = Happy Couple!</p>";;
			}
			
		}else{ //check for sex of partner
		
			$arr = mixOfArray($_SESSION['arr_woman']);
			
			if(in_array($userName, $_SESSION['arr_man'])) //check if name of user is already present in array
			{
				$rand = array_rand($arr, 1);
				$tmp = $_SESSION['arr_woman'][$rand];
				echo "<p class='css3-blink'>$userName + $tmp = Happy Couple!</p>";
			
			}else{	 //if not then it will be added to the array
				$_SESSION['arr_man'][] = "$userName";
				$arr = mixOfArray($_SESSION['arr_woman']);
				$rand = array_rand($arr, 1);
				$tmp = $_SESSION['arr_woman'][$rand];
				echo "<p class='css3-blink'>$userName + $tmp = Happy Couple!</p>";
			}
			
		}
	}
	
?>
</body>
</html>
