<?php
require 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Senuhas Colour Mart</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="images/logo.jpg">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
        .address {
            text-align: center;
        }

        ul {
            list-style: none;
        }

        @media (min-width: 768px) {

            .address {
                text-align: left;
            }

            ul {
                list-style: disc;
            }

        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                require 'header.php';
                ?>
                <div class="row p-4">

                    <div class="col-12 col-lg-10 offset-lg-1 p-2">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center">Contact Us</h2>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center px-2 py-2 mb-4">
                            <span class="mx-auto px-2">
                                <img width="25" height="25" src="https://img.icons8.com/color/25/whatsapp--v6.png" alt="whatsapp--v6" />
                                Whatsapp: 071 6643 677
                            </span>
                            <span class="mx-auto px-2">
                                <img width="25" height="25" src="https://img.icons8.com/color/25/facebook.png" alt="facebook" />
                                Facebook: <a style="color: blue;" class="phoneNo" href="https://www.facebook.com/senuhascolourmart">https://www.facebook.com/senuhascolourmart</a>
                            </span>
                            <span class="mx-auto px-2">
                                <img width="25" height="25" src="https://img.icons8.com/color/25/facebook-messenger--v1.png" alt="facebook-messenger--v1" />
                                Messenger: <a style="color: blue;" class="phoneNo" href="https://www.m.me/128556609379250">Senuhas Color Mart</a>
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-8 border p-4">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.931232683504!2d79.9580163!3d6.8988282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2512313226461%3A0x374bbe1946e40ff5!2sSenuhas%20Colour%20Mart!5e0!3m2!1sen!2slk!4v1687625527605!5m2!1sen!2slk" style="border:0; width: 100%; height: auto; min-height: 500px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="col-12 col-md-4 p-3 px-4 address my-auto">
                                <h5 class="contactTitle mb-4">Malabe Showroom</h5>
                                <div style="padding-left: 8px;">
                                    No.469,Athurugiriya Road, Malabe. <br><br class="d-none d-lg-block">
                                    Mobile : <a class="phoneNo" href="tel:0763335251">0763 335 251</a> / <a class="phoneNo" href="tel:0716643677">0716 643 677</a><br><br class="d-none d-lg-block">
                                    Tel : <a class="phoneNo" href="tel:0117566008">0117 566 008</a><br>
                                    <div class="d-none d-lg-block">
                                        <h6 class="mt-5">Opening Hours</h6>
                                        <ul class="d-none d-md-block">
                                            <li>Monday to Saturday<br> 8.00AM – 6.00PM</li>
                                            <li>Sunday<br> 8.00AM – 4.00PM</li>
                                        </ul>
                                        <div class="d-md-none">
                                            <p>Monday to Saturday<br> 8.00AM – 6.00PM</p>
                                            <p>Sunday<br> 8.00AM – 4.00PM</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-10 offset-lg-1 p-2 py-lg-5">
                        <div class="row">
                            <div class="col-12 col-md-4 p-3 px-4 address">
                                <h5 class="contactTitle">Malabe Auto Paint Showroom</h5>
                                <div style="padding-left: 8px;">
                                    No.463,Athurugiriya Road, Malabe. <br>
                                    Mobile : <a class="phoneNo" href="tel:0763335251">0763 335 251</a> / <a class="phoneNo" href="tel:0770777453">0770 777 453</a><br>
                                    Tel : <a class="phoneNo" href="tel:0117566008">0117 566 008</a>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 p-3 px-4 address">
                                <h5 class="contactTitle">Kotikawatta Showroom</h5>
                                <div style="padding-left: 8px;">
                                    No.229/7,Awissawella Road. Kotikawatta,Angoda. <br>
                                    Mobile : <a class="phoneNo" href="tel:0763335251">0763 335 251</a> / <a class="phoneNo" href="tel:0755369235">0755 369 235</a><br>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 p-3 px-4 address">
                                <h5 class="contactTitle">Homagama Showroom</h5>
                                <div style="padding-left: 8px;">
                                    No.114/A, High level Road, Homagama. <br>
                                    Mobile : <a class="phoneNo" href="tel:0763335251">0763 335 251</a> / <a class="phoneNo" href="tel:0716643677">0716 643 677</a><br>
                                    Tel : <a class="phoneNo" href="tel:0112755370">0112 755 370</a>
                                </div>
                                <div class="d-lg-none">
                                    <hr>
                                    <h6 class="mt-2">Opening Hours</h6>
                                    <ul class="d-none d-md-block">
                                        <li>Monday to Saturday<br> 8.00AM – 6.00PM</li>
                                        <li>Sunday<br> 8.00AM – 4.00PM</li>
                                    </ul>
                                    <div class="d-md-none">
                                        <p>Monday to Saturday<br> 8.00AM – 6.00PM</p>
                                        <p>Sunday<br> 8.00AM – 4.00PM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-10 offset-lg-1 p-2 pb-4 card">
                        <div class="row">
                            <div class="col-12 pt-3">
                                <h3 class="text-center">Contact Our Agent</h3>
                            </div>
                        </div>
                        <div class="row pb-3 px-5">
                            <div class="col-12 col-md-6 py-2">
                                <span>Name</span><br>
                                <input type="text" id="name" class="form-control">
                            </div>
                            <div class="col-12 col-md-6 py-2">
                                <span>Mobile</span><br>
                                <input type="text" id="mobile" class="form-control">
                            </div>
                            <div class="col-12 py-2">
                                <span>Message</span><br>
                                <textarea class="form-control" style="width: 100%;" id="message" rows="5"></textarea>
                            </div>
                            <div class="col-12 py-2">
                                <button class="btn btn-primary" style="width: 100%; background-color: rgba(30, 0, 152, 1);" onclick="sendMSG();">Send Message</button>
                            </div>
                        </div>
                    </div>



                </div>
                <?php
                require 'footer.php';
                ?>
            </div>
            <script>
                function sendMSG() {
                    var name = document.getElementById('name').value;
                    var mobile = document.getElementById('mobile').value;
                    var message = document.getElementById('message').value;

                    var form = new FormData();
                    form.append("name", name);
                    form.append("mobile", mobile);
                    form.append("message", message);

                    var r = new XMLHttpRequest();

                    r.onreadystatechange = function() {
                        if (r.readyState == 4) {
                            var text = r.responseText;
                            if (text == "success") {
                                document.getElementById('name').value = "";
                                document.getElementById('mobile').value = "";
                                document.getElementById('message').value = "";
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Our agent will be contact you soon.'
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: text,
                                })
                            }
                        }
                    }

                    r.open("POST", "msg_send_process.php", true);
                    r.send(form);
                }
            </script>
            <script src="bootstrap.js"></script>
</body>

</html>