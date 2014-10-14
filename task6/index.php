<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<form action="index.php" method="post" enctype="multipart/form-data">
	<input type="file" name="fileName">
	<input type="submit" value="Download">
	</form>
	<form action='unlink($_FILES["fileName"]["tmp_name"])' method="post" enctype="multipart/form-data">
	<input type="submit" value="Delete">
	</form>
<?php

	$imgDirname = 'images';
	$otherDirname = 'others';
	$srcDirname = 'source';
	$rootDownloadPath = 'uploads/';
	$tmp = $_FILES["fileName"]["type"];
echo ($tmp);
   if(is_uploaded_file($_FILES["fileName"]["tmp_name"]))
   {
	   
	   if (!file_exists($rootDownloadPath)) {
			mkdir($rootDownloadPath, 0777);
			echo "The directory $rootDownloadPath was successfully created.";

		}

		if($tmp == 'image/jpg' || $tmp == 'image/png' || $tmp == 'image/jpeg'){
		
			if (!file_exists($rootDownloadPath.$imgDirname)) {
			
					mkdir($rootDownloadPath . $imgDirname, 0777);
					echo "The directory $imgDirname was successfully created.";
					
			}
			$tmp_name = $_FILES["fileName"]["tmp_name"];
			$name = $_FILES["fileName"]["name"];
			move_uploaded_file($tmp_name, "$rootDownloadPath$imgDirname/$name");
			
		}else if($tmp == 'application/octet-stream'){
			
			if (!file_exists($rootDownloadPath.$srcDirname)) {
			
					mkdir($rootDownloadPath . $srcDirname, 0777);
					echo "The directory $srcDirname was successfully created.";
					
			}else {
					echo "The directory $srcDirname exists.";
			}
			
			$tmp_name = $_FILES["fileName"]["tmp_name"];
			$name = $_FILES["fileName"]["name"];
			move_uploaded_file($tmp_name, "$rootDownloadPath$srcDirname/$name");
		}else{
			
			if (!file_exists($rootDownloadPath.$otherDirname)) {
			
					mkdir($rootDownloadPath . $otherDirname, 0777);
					echo "The directory $otherDirname was successfully created.";
					
			}else {
					echo "The directory $otherDirname exists.";
			}
			
			$tmp_name = $_FILES["fileName"]["tmp_name"];
			$name = $_FILES["fileName"]["name"];
			move_uploaded_file($tmp_name, "$rootDownloadPath$otherDirname/$name");
		}
	}	
?>
</body>
</html>