<?php

session_set_cookie_params(60 * 60 * 24);
session_start();

if (isset($_SESSION['admin_email'])) {
?>
    <script>
        window.location = "index.php";
    </script>
<?php
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <style>
            @import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
            @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

            body {
                margin: 0;
                padding: 0;
                background: #fff;

                color: white;
                font-family: Arial;
                font-size: 12px;

                background-image: url(https://images.unsplash.com/photo-1459478309853-2c33a60058e7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80);
                background-size: cover;
                /* -webkit-filter: blur(1px); */
                width: max-content;
                background-repeat: no-repeat;
            }

            .grad {
                background-color: rgba(0, 0, 0, 0.5);
                color: white;
                width: 100vw;
                height: 100vh;
                z-index: 1;
            }

            ::placeholder {
                color: white !important;
                opacity: 1;
                /* Firefox */
            }

            :-ms-input-placeholder {
                /* Internet Explorer 10-11 */
                color: white !important;
            }

            ::-ms-input-placeholder {
                /* Microsoft Edge */
                color: white !important;
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    </head>

    <body>
        <div class="container-fluid vw-100 justify-content-center my-auto">
            <div class="row grad align-content-center my-auto vh-100 gy-3 animate__animated animate__backInDown">

                <div class="col-12 col-md-6 text-center text-md-end my-auto">
                    <h1 class="text-light my-auto">Admin Login</h1>
                </div>
                <div class="col-12 col-md-4 col-xl-3">
                    <input type="text" class="form-control my-2" style="background-color: transparent; color: white; outline: none;" placeholder="email" id="email" />
                    <input type="password" class="form-control my-2" style="background-color: transparent; color: white; outline: none;" placeholder="password" id="password" />
                    <button class="btn btn-light w-100" onclick="login();">Login</button>
                    <div id="msg" class="text-center" style="color: lightcoral; font-weight: bold;"></div>
                </div>

            </div>
        </div>
        <!-- <div class="header">
            <div>Admin Login</div>
        </div>
        
        <div class="login">
            <input style="padding-top: 18px !important; padding-bottom: 18px !important;" class="w-100 py-2" type="text" placeholder="email" id="email"><br>
            <input style="padding-top: 18px !important; padding-bottom: 18px !important;" class="w-100 py-2" type="password" placeholder="password" id="password"><br>
            <input class="w-100" type="button" value="Login" onclick="login();">
            <div id="msg" style="padding: 5px; display: none; margin-top: 20px; width: 250px; font-size: 18px; background-color: rgba(255, 97, 97, 0.53);">Warning</div>
        </div> -->


        <script>
            function login() {

                var email = document.getElementById('email').value;
                var password = document.getElementById('password').value;

                var form = new FormData();
                form.append("email", email);
                form.append("password", password);

                var r = new XMLHttpRequest();
                r.onreadystatechange = function() {
                    if (r.readyState == 4) {
                        var text = r.responseText;
                        if (text != 'success') {
                            document.getElementById('msg').innerHTML = text;
                            document.getElementById('msg').style.display = "block";
                        } else {
                            document.getElementById('msg').style.display = "none";
                            window.location = "index.php";
                        }
                    }
                }

                r.open("POST", "loginProcess.php", true);
                r.send(form);

            }
        </script>
    </body>

    </html>
<?php
}
