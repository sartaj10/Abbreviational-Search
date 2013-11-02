<html>
<head>
    <title>Abbreviational Search</title>
</head>
<body>
     
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
<b>Enter Acronym to be searched :</b> <input type="text" name="query" size="50"> 
<input type="submit" value="search" name ="search" >
</form>
 
<?php
    $connection = mysqli_connect("localhost", "root", "","wordpress");

	if(isset($_GET['search']) && !empty($_GET['query']))
	{
	$query = $_GET['query']; 
	$length = strlen($query);
	$sql = mysqli_query( $connection ,"SELECT * FROM wp_posts WHERE post_title LIKE '$query[0]%' ");
	while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)) 
	{
		$pieces = explode(" ",$row['post_title']);
		$acronym = "";

		foreach ($pieces as $p) {
		$acronym .= $p[0];
		}
		$something = 0;
		
		for($i =1; $i < $length ; $i++)
		{
			if($length > strlen($acronym))
			{
				$something = 1;
				break;
			}
			
			if($query[$i] != lcfirst($acronym[$i]) && $query[$i] != ucfirst($acronym[$i]))
			{
				$something = 1;
				break;			
			}
		}
		
		if($something == 0)
		{
			echo $row['post_title'];
		}
		else
		{
			echo 'No results found';
		}
    }
	}	
?>
 
</body>
</html>


