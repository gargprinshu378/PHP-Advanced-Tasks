<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php
    require 'vendor/autoload.php';
    use GuzzleHttp\Client;
    $client=new Client();

    $request=$client->request('GET','https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services');
    $json=json_decode($request->getBody(),true);
    include 'logic.php';

    $obj=new api(15);
    echo $obj->RHS(15);

    for($num=12;$num<((count($json['data']))-1);$num++){
        $obj= new api($num);
        if($num%2==1){
            echo $obj->RHS($num);
        }
        else{
            echo $obj->LHS($num);
        }
    }
    ?>
</body>
</html>