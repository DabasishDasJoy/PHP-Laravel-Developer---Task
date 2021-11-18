<?php

if(isset($_POST['btnauthorize'])){
    $apiKey = $_POST['txtapikey'];


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://trello.com/1/authorize?expiration=1day&name=TaskApp&scope=read&response_type=token&key=".$apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json"
    ));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
    $authInfo = json_decode(curl_exec($ch), true);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if($http_code != 200){
        exit('Error : Failed Authorization!');
    }
    else{
        echo "Authorization Successful!";
    }
}


?>
<h2> Authorization </h2>
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
            
            <p><input type="submit", value="Authorize", name="btnauthorize"></p>     

        </form>       

    </body>
</html>
