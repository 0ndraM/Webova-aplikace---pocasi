<?php
function  getPocasi( string $inputVal )
{
    // API Key
    $apiKey = "API KEY";
    $url = "https://api.openweathermap.org/data/2.5/weather?q=".$inputVal."&appid=".$apiKey."&units=metric&lang=cz";
    // Get data from API
    $data = json_decode(file_get_contents($url), true);
    // Extract data
    $main = $data['main'];
    $name = $data['name'];
    $sys = $data['sys'];
    $weather = $data['weather'];
    // Display data
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
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="styles.css"></head>
<body>
  <section class="top-banner">
    <div class="container">
      <h1 class="heading">Počasí</h1>
    </div>
  </section>
  <section class="PHP-section">
    <div class="container">
      <ul class="cities">
         <?php
          getPocasi("Trebic");

          getPocasi("Dubai");

          getPocasi("New York");

          getPocasi("Tokyo");
          ?>
        </ul>
    </div>
  </section>
  <footer class="page-footer">
    <script src="script.js"></script>
  </footer></body>
</html>
