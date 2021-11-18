<h1>Google Fonts API </h1>
<h2>Fetched Google Fonts: </h2>

<?php
$googleApiKey = "AIzaSyBs1gA93Uu17C7VxXSsIMMSAGPE87oMvII";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/webfonts/v1/webfonts?key=" . $googleApiKey);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json"
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
$fontsList = json_decode(curl_exec($ch), true);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
if ($http_code != 200)
  exit('Error : Failed to Authorize!!');

else {
  echo "Authorization Successful!" . "<br>";
}

$sizeOfTheItems = count($fontsList['items']);
echo "Total font fetched: " . $sizeOfTheItems . "<ul>";


for ($index = 0; $index < $sizeOfTheItems; $index++) {
  $fontNames = $fontsList['items'][$index]['family'];
  echo "<li>" . $fontNames . "</li>";
}

?>
