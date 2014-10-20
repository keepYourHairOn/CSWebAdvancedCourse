<?php
	header('Content-Type: text/html; charset=utf-8');//set utf-8

	$host = '127.0.0.1';
	$user = 'root';
	$pass = '';
	$table_to_show = 'test_table';
	$db_name = 'testdb';

	$link = mysql_connect($host , $user, $passw);//create connection
	if(!$link){
		echo "Connection failure";
	}else{
		echo "Connection success!";
	}
	
	mysql_select_db($db_name, $link);//connect to the database
	$search = mysql_query("select * from " . $table_to_show);//send request to the table from the database to get all values from it
	
	function tbl(){		//this function creates table structure and titles of columns
		echo '<table border="1">';
		echo '<thead>';
		echo '<tr>';
		echo '<th>int</th>';
		echo '<th>varchar</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
	 }
	 
	$arr_names[] = '';
	$arr_int[] = '';
	
	//output of the table with sorted name-column
	tbl();
	
	while($data = mysql_fetch_array($search)){  //gives a value by row
		echo '<tr>';
		echo '<td>' . $data['test_table_pk'] . '</td>'; //returns value of the 'test_table_pk' column
		echo '<td>' . $data['name'] . '</td>'; //returns value of the 'name' column
		echo '</tr>';
		$arr_names[] = $data['name']; //creation of an array with all name's values from the table
		$arr_int[] = $data['test_table_pk']; //creation of an array with all values of primary keys
	}
	rsort($arr_names); //sort of all names by the inverse to alphabetic order
	echo '</table>';
	 //output of the table with sorted name-column
	tbl();
	
	for($i = 0; $i < 3; $i++){ 
		  echo '<tr>';
		  echo '<td>' . $arr_int[$i+1] . '</td>';
		  echo '<td>' . $arr_names[$i] . '</td>';
		  echo '</tr>';
	}
	echo '</table>';
//task16	   
	$add = mysql_query("insert into " . $table_to_show."(`name` , `text`,`mdate`,`time_date`) 
							values ('DOCTOR' , 'ONE', '2014-11-14 20:44:20' , '00:01:11' "); //insert value to the table in the database
	echo "Added row's" .$search; //outputs primary key of above added value
	
	mysql_close($link);//close connection
?>