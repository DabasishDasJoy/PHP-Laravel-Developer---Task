
<?php

if (isset($_POST['btnupdateboard'])) {
    $apiKey = $_POST['txtapikey'];
    $token = $_POST['txttoken'];
    $name = $_POST['txtboardname'];
    $description = $_POST['txtdescription'];
    $boardid = $_POST['txtboardid'];
    

    $cofiguration = [
        'name' => $name,
        'description' => $description,
        'key' => $apiKey,
        'token' => $token
  
      ]; 
      

      $url = "https://api.trello.com/1/boards/".$boardid;
  
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($cofiguration));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
      $headers = [
        'Content-Type:application/json'
      ];
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      $result = json_decode(curl_exec($ch));
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      curl_close($ch);
  
      if($httpCode != 200){
        exit('Error : Failed to Update!');
        }
        else{
            echo "Successfully Updated!";
        }
      
      
}


?>



<h2> Update Board </h2>
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

            <input type="text", name="txtboardname" 
            placeholder="Name">

            <p><input type="text", name="txtdescription"
            placeholder="Description"></p>

            <p><input type="text", name="txtboardid"
            placeholder="Board ID"></p>

            <p><input type="submit", value="Update Board", name="btnupdateboard"></p>     

        </form>       

    </body>
</html>
