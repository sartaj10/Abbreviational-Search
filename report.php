<!DOCTYPE html>
<html>
<head>
	<title> Abbreviational Search Engine </title>
</head>

<?php

	$dbc = mysqli_connect('localhost','root','','wordpress');
	
	$query = mysqli_query(SELECT * FROM wp_posts WHERE post_content LIKE '%$_GET[query]%');
	
	while($ser = mysqli_fetch_array($query))
	{
		echo $ser[pageurl] ;
	}
?>

</html>
