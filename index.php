<?php

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Weather Scraper</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<style type="text/css">

	html, body {
		height: 100%;
	}
	.container {
		background-image:url(field.jpg);
		width: 100%;
		height: 100%;
		background-size: cover;
		background-position: center;
		padding-top: 100px;
	}
	.lead {
		padding-top: 20px;
		padding-bottom: 10px;
	}
	#city {
		width: 50%;
		margin: auto;
	}
	.center {
		text-align: center;
	}
	.white {
		color: white;
	}
	.weatherResults {
		margin-top: 20px;
		display: none;
		width: 70%;
	}
</style>

</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="white center"> Weather Scraper </h1>
			<p class="lead white center"> Enter your city below to get a forecast of the weather. </p>

			<form>
				<div class="form-group">
					<input type="text" class="form-control center" name="city" id="city" placeholder="Eg. London, Paris, San Francisco...">
				</div>

				<input type="submit" id="findMyWeather" class="btn btn-success btn-large center-block" value="Find My Weather!">
			</form>

			<p id="success" class="alert alert-success center-block weatherResults"> </p>

			<p id="fail" class="alert alert-danger center-block weatherResults"> </p>

			<p id="noCity" class="center alert alert-danger center-block weatherResults"> Please enter a city. </p>
				
			</div>
		</div>
	</div>
</div>


<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script type="text/javascript">
	
	$('#findMyWeather').click(function(event){

		// Stop form from submitting
		event.preventDefault();

		$('.alert').hide();

		// Form validation
		if (!$('#city').val()) {

			$('#noCity').fadeIn();

		} else {

			// ajax to retrieve and show weather content when button is clicked
			$.get("scraper.php?city="+$('#city').val(), function(data) {

				// If data 
				if (data == "") {

					$('#fail').html("Could not find weather data for " + $('#city').val() + ". Please try again.").fadeIn();

				} else {

					$('#success').html(data).fadeIn();

				}

			});

		}

	});

</script>

</body>
</html>