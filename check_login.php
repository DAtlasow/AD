<?php
    session_start();
    //подключение конфигурационного файла, желпательно делать наверху, сразу
    //переменная окружения! в системе Windows MYAPP_CONFIG

    //echo "pass".getenv('MYAPP_CONFIG');
    include(getenv("MYAPP_CONFIG"));
    //include("c:\\AppParams\\params.php");
?>
<html>
    <head>
        <title>

        </title>
    </head>
    <body>
        <?php
            $user = $_REQUEST["user"];
            $pwd = $_REQUEST["pwd"];
            $hash = hash('sha256',$pwd);
            $sql = "SELECT ID, UserName 
                    FROM users WHERE UserName=? AND PwdHash = ?
                    ";
    //FROM users WHERE UserName='$user' AND PwdHash = '$hash'


        //$conn = mysqli_connect("localhost","calc","!QAZ2wsx","calc");   
        $conn = mysqli_connect($DB_URL,$DB_USER,$DB_PWD,$DB_NAME); 
        //Нудная, но необходимая  процедура  передачи параметров в sql выражение
        // что гарантирует защиту от sqlinjection

        $statement = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($statement,"ss",$user,$hash);
        // ss тип данных строка строка
        $cursor = mysqli_stmt_execute($statement);

        //строка подключения
    //$cursor = mysqli_query($conn,$sql);   
        

        //$result = mysqli_fetch_all($cursor);
        $cursor = mysqli_stmt_get_result($statement);
        $result = mysqli_fetch_all($cursor);

        echo(mysqli_error($conn));    
        //var_dump($result);
        //для отладки
        mysqli_close($conn);
            if (count($result) > 0){
            echo ("<h1>Hello, $user!</h1>");
            $_SESSION["user"] = $user;
            echo('<meta http-equiv="refresh" content="2; URL=calc.php">');
            }
            else{
                echo ("<h1>BAD LOGIN!<h1>");
            echo('<meta http-equiv="refresh" content="2; URL=login.php">');    
            }
            //
        ?>

    </body>

</html>