<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
        $.ajax({
            url:"http://localhost/MVC0604/home.php/userapi",
            type:"get",
            success:function(data){
                console.log(data);
            }
        });
        </script>
   
</head>
<body>
    
</body>
</html>