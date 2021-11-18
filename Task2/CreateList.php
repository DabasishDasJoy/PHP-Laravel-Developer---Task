
<?php

if (isset($_POST['btncreateList'])) {
    $apiKey = $_POST['txtapikey'];
    $token = $_POST['txttoken'];
    $name = $_POST['txtlistname'];
    $boardid = $_POST['txtboardid'];
    
      $url = "https://api.trello.com/1/lists?name={$name}&idBoard={$boardid}&key={$apiKey}&token={$token}";
      echo $url;
      $curl = curl_init($url);

      curl_setopt($curl, CURLOPT_POST, true);
      //curl_setopt($curl, CURLOPT_POSTFIELDS, $cofiguration);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($curl);
      $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
      curl_close($curl);
      

      if($http_code != 200){
        exit('Error : Failed to create!');
    }
    else{
        echo "Board Successfully Created!";
    }
      
      
}


?>



<h2> Create List </h2>
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

            <p><input type="text", name="txtlistname" 
            placeholder="List Name"></p>

            <p><input type="text", name="txtboardid" 
            placeholder="Board ID"></p>


            <p><input type="submit", value="Create List", name="btncreateList"></p>     

        </form>       

    </body>
</html>
