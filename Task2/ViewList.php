<?php

if(isset($_POST['btnviewList'])){
    $apiKey = $_POST['txtapikey'];
    $token = $_POST['txttoken'];
    $listdid = $_POST['txtlistid'];


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.trello.com/1/lists/{$listdid}/cards?key={$apiKey}&token={$token}");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json"
    ));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
    $listInfo = json_decode(curl_exec($ch),true);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $sizeOfTheListItem = count($listInfo);

    //echo '<pre>';print_r($listInfo);echo'</pre>';


    echo "Card Lists : "."<br>";
    for ($index = 0; $index < $sizeOfTheListItem; $index++) {
        $cardlist = $listInfo[$index]['name'];
        echo "<li>" . $cardlist . "</li>";
   }

    
}


?>
<h2> View List </h2>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="" method="post">
            <p><input type="text", name="txtapikey" 
            placeholder="API Key"></p>

            <p><input type="text", name="txttoken"
            placeholder="Token"></p>

            <p><input type="text", name="txtlistid"
            placeholder="List ID"></p>

            <p><input type="submit", value="View List", name="btnviewList"></p>     

        </form>       

    </body>
</html>