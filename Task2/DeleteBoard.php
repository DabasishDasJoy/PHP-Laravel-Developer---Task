
<?php

if (isset($_POST['btndeleteboard'])) {
    $apiKey = $_POST['txtapikey'];
    $token = $_POST['txttoken'];
    $boardid = $_POST['txtboardid'];

      $url = "https://api.trello.com/1/boards/{$boardid}?key={$apiKey}&token={$token}";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
      $result = curl_exec($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);


      if($httpCode != 200){
        exit('Error : Failed to delete!');
        }
        else{
            echo "Successfully Deleted!";
        }
      
}

?>



<h2> Delete Board </h2>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="" method="post">

            <input type="text", name="txtapikey" 
            placeholder="API Key">

            <p><input type="text", name="txttoken"
            placeholder="Token"></p>


            <p><input type="text", name="txtboardid"
            placeholder="Board ID"></p>

            <p><input type="submit", value="Delete Board", name="btndeleteboard"></p>     

        </form>       

    </body>
</html>
