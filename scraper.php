<?php
/**
 * 
 * @authors David Adewoyin (david.adewoyin@baruchmail.cuny.edu)
 * @version 1.1
 */

$city = $_GET['city'];

//Remove spaces from user input in $city
$city = str_replace(" ", "", $city);

// Retrieve forecast content from weather-forecast website
$contents = file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");


//Regular expression of $contents
//Finds forecast from $contents variable and stores it in $matches
//(.*?) is used to match everything between "3 Day Weather Forecast Summary:" & the next closing tag
// /s modifier used for multi-line check
preg_match('/3 Day Weather Forecast Summary:<\/b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">(.*?)</s', $contents, $matches);

echo $matches[1];

?>