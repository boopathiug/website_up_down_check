<!DOCTYPE html>
<html>
<head>
	<title>Check if your website is Running or offline</title>

	<!-- Stylesheet -->
	<link rel="stylesheet" href="css/style.css" />

	<!-- fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,500,700,900' rel='stylesheet' type='text/css'>
	<!-- font-family: 'Open Sans Condensed', sans-serif; -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,600,400italic,700,900' rel='stylesheet' type='text/css'>
	<!-- font-family: 'Source Sans Pro', sans-serif; -->
		<link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<!-- font-family: 'Varela Round', sans-serif; -->

</head>
<body>

<div class="header">
<a href="index.php">Back</a> 
<a href="index.php">Logout</a>
</div>

	<div class="main-content check-index">
		<div class="sub-content check">

		<?php

		function isSiteAvailable($url)
		{

		if(!filter_var($url, FILTER_VALIDATE_URL))
		{
		return "URL provided wasn't valid";
		}

		
		$cl = curl_init($url);
		curl_setopt($cl,CURLOPT_CONNECTTIMEOUT,10);
		curl_setopt($cl,CURLOPT_HEADER,true);
		curl_setopt($cl,CURLOPT_NOBODY,true);
		curl_setopt($cl,CURLOPT_RETURNTRANSFER,true);

		
		$response = curl_exec($cl);

		curl_close($cl);

		if ($response) return 'Website is to be up and running!';

		return "Oops nothing found, the site is either offline or the domain doesn't exist";
		}

		// check if site exists / is up
		if(isset($_GET['url'])){

		$response = isSiteAvailable($_GET['url']);

		?>

				<div class="status">
				<h1><?php echo $response; ?></h1>
				</div>

		<?php

		}


		?>



				<h1>Enter a URL below</h1>

				<form class="sub-content-form check-form clearfix" method="get">
					<input type="text" name="url" placeholder="http://www.google.com">
					<input type="submit" value="Check">
				</form>

				<div class="content clearfix">

				<div class="left">
					<h2>Running Website List</h2>
					<ul>
						<li>
							<a href="#">http://www.techforge.in</a>
						</li>
						<li>
							<a href="#">http://www.google.com</a>
						</li>
						<li>
							<a href="#">http://www.yahoo.com</a>
						</li>

					</ul>
				</div>

				<div class="right">
					<h2>Offline Website List</h2>
										<ul>
						<li>
							<a href="#">http://www.brownplate.in</a>
						</li>
						<li>
							<a href="#">http://www.nothingss.com</a>
						</li>
						<li>
							<a href="#">http://www.tehccg.com</a>
						</li>

					</ul>
				</div>

				</div>



		</div>
		<!-- sub-content -->
	</div>
	<!-- content -->	






</body>
</html>

