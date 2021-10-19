<?php

	$weather = '';
	$error = '';

	if (array_key_exists("city",  $_GET)) {

		$city = str_replace(' ', '', $_GET['city']);

		$file_headers = @get_headers("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
		
			if (array_key_exists("flash-in",  $file_headers)) {

				$error = "That city could not be found.";

			} else {

			$forecastPage = file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");

			$pageArray = explode('1&ndash;3 days)</div><p class="b-forecast__table-description-content"><span class="phrase">', $forecastPage);

			if (sizeof($pageArray) > 1 ) {

				$secondPageArray = explode('</span></p></td>',$pageArray[1]);

				if (sizeof($secondPageArray) > 1) {

					$weather = $secondPageArray[0];	

				} else {

					$error = "That city could not be found.";

				}


			} else {

				$error = "That city could not be found.";

			}


		}

	}
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
      
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>Weather Scraper</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
        <style type=text/css>

		html {
			background: url("https://images.unsplash.com/photo-1548869447-faef5000334c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80") no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}

		body {
			background: none;
		}

		.container {
			text-align: center;
			margin-top: 100px;
			width: 450px;
		}

		input {
			margin-top: 20px;
			margin-bottom: 20px;
		}

		#weather {
			margin-top: 15px;
		}


        </style>

    </head>

    <body>

		<div class="container">

			<h1>What's The Weather?</h1>

			<form>
				<fieldset class="form-group">
					<label for="city">Enter the name of a city</label>
					<input type="text" class="form-control" id="city" name="city" aria-describedby="city" placeholder="E.g. London, Glasgow, Tokyo" value = "<?php echo $_GET['city']?>">
				</fieldset>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>

			<div id="weather"><?php 

				if ($weather) {

					echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';

				} else if ($error) {

					echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';

				}

			?></div>

		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <script type="text/javascript">

        </script>

	</body>

</html>