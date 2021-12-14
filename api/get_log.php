<?php
    session_start();
    //проверка жетона безопасности
    if (!isset($_SESSION["user"])) {
        echo('<meta http-equiv="refresh" content="2; URL=../login.php">');
        die("Требуется логин!");
    }
    
    $user  = $_SESSION["user"];
    //echo "pass".getenv('MYAPP_CONFIG');
    include(getenv("MYAPP_CONFIG"));
    
    //include("c:\\AppParams\\params.php");
?>

        <?php
            //оставляем уязвимость sql-injection для взлома
            $sql = "SELECT ID, Number1, Number2, Result, UserID 
                    FROM log 
                    WHERE UserID='$user'
                    ";
    //FROM users WHERE UserName='$user' AND PwdHash = '$hash'


        //$conn = mysqli_connect("localhost","calc","!QAZ2wsx","calc");   
        $conn = mysqli_connect($DB_URL,$DB_USER,$DB_PWD,$DB_NAME); 
        $statement = mysqli_prepare($conn,$sql);
        mysqli_stmt_execute($statement);
        // ss тип данных строка строка
        //$cursor = mysqli_stmt_execute($statement);

        //строка подключения
    //$cursor = mysqli_query($conn,$sql);   
        

        //$result = mysqli_fetch_all($cursor);
        $cursor = mysqli_stmt_get_result($statement);
        $result = mysqli_fetch_all($cursor);


        mysqli_close($conn);     
       // var_dump($result); 
       echo(json_encode($result)); 

         
        //var_dump($result);
        //для отладки
        
            // if (count($result) > 0){
            // echo ("<h1>Hello, $user!</h1>");
            // $_SESSION["user"] = $user;
            // echo('<meta http-equiv="refresh" content="2; URL=calc.php">');
            // }
            // else{
            //     echo ("<h1>BAD LOGIN!<h1>");
            // echo('<meta http-equiv="refresh" content="2; URL=login.php">');    
            // }
            //
        ?>

