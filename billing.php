<?php
    session_start();

    //Если жетона безопасности (т.е., в нашем случае, 
    //сессионной переменной c названием user) нет, "не пущаем"
    if (!isset($_SESSION["user"])) {
        echo('<meta http-equiv="refresh" content="2; URL=login.php">');
        die("Требуется логин!");
    }
    
?>
<html>
    <head> 
        <meta charset="utf-8" />

        <!-- Комментарий HTML		
		-->

        <script>
            function getLog() {
             
                
                var url = "api/get_log.php";
                var xhr = new XMLHttpRequest();
                xhr.open("GET",url,false);
                xhr.send();
                var text = xhr.responseText;
                var results = JSON.parse(text);
                console.log(results);
                var out = "";
                for(var i=0; i < results.length; i++) {
                    var calc = results[i];
                    console.log(calc);
                    var x = calc [1];
                    var y = calc [2];
                    var z = calc[3];
                    out += "X:" + x +" Y:" + y + " Z:" + z + "<br />";
                }
                document.getElementById("display").innerHTML = out;
             
                // Комментарий
            }

            
        </script>

        </head>
    <body onload="getLog();">
        <h1>Ваши вычисления</h1>
        <div id = "display"></div>




    </body>
</html>