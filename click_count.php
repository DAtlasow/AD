<?php
    session_start();
?>

<html>

    <head>  		
		<!-- Комментарий HTML		
		-->			
        <title>Logon</title>

    </head>
	
    <body>
        <h1>Считаем щелчки</h1>
        <form>
                <button id="btn1">Щелкни здесь</button>    
        </form>          
        <?php 
            $i = 0;
            //вспомним переменную счетчика:
            //(если она существует мы ее вспомнили):
            // if (isset($_SESSION["clicks"]))
            //     $i = $_SESSION["clicks"];
            // $i +=1;
            // //запомним текущее значение счетчиков щелчков (нечто что сохраняет 
            // //сервер и сопостовляет с браузером) в сессионной переменной clicks
            // $_SESSION["clicks"] = $i;

            if(isset($_COOKIE['clicks']))
            $i = $_COOKIE['clicks'];

            $i += 1;
            setcookie("clicks",$i,time() + 20);



            echo("всего щелчков: $i");
        ?>
    </body>
 


</html>
