<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        Email: <input type="text" name="email" id="email" placeholder="abc@xyz.com">
        <input type="submit"><br>
        <?php
            include 'mail.php';
        ?>
    </form>
</body>
</html>