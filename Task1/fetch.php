<h2>Fetched Fonts of Google API: </h2>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <?php
  $google_api_key = "AIzaSyBs1gA93Uu17C7VxXSsIMMSAGPE87oMvII";

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/webfonts/v1/webfonts?key=" . $google_api_key);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json"
  ));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  $fonts_list = json_decode(curl_exec($ch), true);
  $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
  if ($http_code != 200)
    exit('Error : Failed to get Google Fonts list');

  // echo out list of fonts
  //echo gettype($fonts_list) . "<br>";
  $sizeOfTheItems = count($fonts_list['items']);
  echo "Total font fetched: " . $sizeOfTheItems . "<ul>";
  //echo '<pre>';print_r($fonts_list);echo '</pre>';



  for ($index = 0; $index < $sizeOfTheItems; $index++) {
    $fontNames = $fonts_list['items'][$index]['family'];
    echo "<li>" . $fontNames . "</li>";
  }
  
  ?>


</body>

</html>
