<?php

if(isset($_POST['param'])){
  getPocasi($_POST['param']);
}

function  getPocasi( string $inputVal )
{
    // API Key
    $apiKey = "API kEY";
    $url = "https://api.openweathermap.org/data/2.5/weather?q=".$inputVal."&appid=".$apiKey."&units=metric&lang=cz";
    // Get data from API
    $data = json_decode(file_get_contents($url), true);
    // Extract data
    $main = $data['main'];
    $name = $data['name'];
    $sys = $data['sys'];
    $weather = $data['weather'];
    // Display data
    echo '<ul class="cities">';
    echo '<li class="city">';
    echo '<h2 class="city-name" data-name="'.$name.','.$sys['country'].'">';
    echo '<span>'.$name.'</span>';
    echo '<sup>'.$sys['country'].'</sup>';
    echo '</h2>';
    echo '<div class="city-temp">'.round($main['temp']).'<sup>°C</sup></div>';
    echo '<figure>';
    echo '<img class="city-icon" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/'.$weather[0]["icon"].'.svg" alt='.$weather[0]['description'].'>';
    echo '<figcaption>'.$weather[0]['description'].'</figcaption>';
    echo '</figure>';
    echo '</li>';
    echo '</ul>';
}

?>
