<?php
	echo '<style type="text/css">'; //connect css style to the page
		$css = file_get_contents('style.css'); //set the css file
		echo  '<link ref=«style»>'; //output all features from the css implemented to the html tags
	echo '</style>';
	
	
	$host = '127.0.0.1';
	$user = 'root';
	$pass = '';
	$main_table_to_show = 'main_menu';
	$sub_table_to_show = 'sub_menu';
	$db_name = 'test_menu';

	$link = mysqli_connect($host , $user, $passw, $db_name);//create connection with database
	if(!$link){
		echo "Connection failure";
	}else{
		echo "Connection success!";
	}
	
	$main_result = mysqli_query($link, "select * from " . $main_table_to_show); //send request to the table from the database to get all values from it
	$sub_result = mysqli_query($link, "select * from " . $sub_table_to_show);	//send request to the table from the database to get all values from it
	
	while ($row = $main_result->fetch_assoc()) { //gives a value by row
	$i = $row['pk']; //set $i equals to primary key of table item
	$menu[$i] = $row; //create an associative array with all main menu items from the table
	}
	
	while ($row2 = $sub_result->fetch_assoc()) {//gives a value by row
	$i = $row2['pk']; //set $i equals to primary key of table item
	$menu2[$i] = $row2; //create an associative array with all sub menu items from the table
	}
	
	echo '<ul class="menu">'; 
	for($i = 1; $i < 6;$i++){
	//in 3rd and 4th items of main menu we have sub menu items
		if($i == 3||$i == 4) //check for items which include sub menu items
		{
			echo '<li>';
				echo '<a href = "#">';
				print_r($menu[$i]['menu_name']); //output main menu item
				echo '<ul>';
					for($j = 1; $j < 5;$j++){
						if($menu[$i]['pk'] == $menu2[$j]['fk']){ //if sub menu item have foreign key equals to primary key of main menu item
						echo '<li>';
								echo '<a href = "#">';
								print_r($menu2[$j]['sub_menu_name']); //output sub menu item
								echo '</a>';
							echo '</li>';
						}	
					}
				echo '</ul>';
				echo '</a>';
			echo '</li>';
		}else{
			echo '<li>';
				echo '<a href = "#">';
				print_r($menu[$i]['menu_name']); //output main menu item
				echo '</a>';
			echo '</li>';
		}
	}
	echo '</ul>';
	
	mysqli_close($link); //close connection
?>