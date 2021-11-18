
<?php

if(isset($_POST['btnauthorize'])){
    $apiKey = $_POST['txtapikey'];
    $token = $_POST['txttoken'];




    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.trello.com/1/members/me/?key=".$apiKey."&token=".$token);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json"
    ));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
    $orgInfo = json_decode(curl_exec($ch));
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);




    if($http_code != 200){
        exit('Error : Failed to Authorized');
    }
    else{
        echo "Organization ID: " .$orgInfo->id;
    }
}

?>



<h2> Getting Organization </h2>
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

            <p><input type="submit", value="Authorize", name="btnauthorize"></p>     

        </form>       

    </body>
</html>
