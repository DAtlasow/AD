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

        <style>
            /* Это комментарий CSS */
            input, button{
                width: 140px;
                margin: 5px;
                text-align: center;
            }
            button {
                width: 63px;
            }

            .pressed{
                background-color: pink;
            }

        </style>

<a href="billing.php">Billing</a>
<a href="index_.html">Индекс</a>
        <script>
            function plus(){
                var x = document.getElementById("x").value;
                var y = document.getElementById("y").value;
                
                var url = "api/plus.php?x=" + x + "&y=" + y;
                var xhr = new XMLHttpRequest();
                xhr.open("GET",url,false);
                xhr.send();
                var z = xhr.responseText;

                document.getElementById("z").value = z;
                document.getElementById("btn1").className = "pressed";
                document.getElementById("btn2").className = "";
                // Комментарий
            }

            function minus(){
                var x = document.getElementById("x").value;
                var y = document.getElementById("y").value;

                var url = "api/minus.php?x=" + x + "&y=" + y;
                var xhr = new XMLHttpRequest();
                xhr.open("GET",url,false);
                xhr.send();
                var z = xhr.responseText;


                document.getElementById("z").value = z;
                document.getElementById("btn2").className = "pressed";
                document.getElementById("btn1").className = "";
            }
        </script>

        </head>
    <body>
        <h1>Калькулятор</h1>
        <input id="x" /> <br />
        <input id="y" /> <br />
        <button id="btn1" onclick="plus();">+</button>
        <button id="btn2" onclick="minus();">-</button><br />
        <input id="z" /> 




    </body>
</html>