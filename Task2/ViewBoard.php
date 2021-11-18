<?php

if(isset($_POST['btnviewBoard'])){
    $apiKey = $_POST['txtapikey'];
    $token = $_POST['txttoken'];
    $boardid = $_POST['txtboardid'];


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.trello.com/1/boards/{$boardid}/lists?key={$apiKey}&token={$token}");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json"
    ));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
    $boardInfo = json_decode(curl_exec($ch),true);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $sizeOfTheBoardItem = count($boardInfo);

    echo "Board Lists : "."<br>";

    for ($index = 0; $index < $sizeOfTheBoardItem; $index++) {
        $boardList = $boardInfo[$index]['name'];
        echo "<li>" . $boardList . "</li>";
      }

    
}


?>
<h2> View Board </h2>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Authentication</title>
    </head>
    <body>
        <form action="" method="post">
            <p><input type="text", name="txtapikey" 
            placeholder="API Key"></p>

            <p><input type="text", name="txttoken"
            placeholder="Token"></p>

            <p><input type="text", name="txtboardid"
            placeholder="Board ID"></p>

            <p><input type="submit", value="View Board", name="btnviewBoard"></p>     

        </form>       

    </body>
</html>
