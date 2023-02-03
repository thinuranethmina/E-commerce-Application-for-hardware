<?php

if (!isset($_GET['id'])) {
?>
    <script>
        window.location = "index.php";
    </script>
<?php
} else if (empty($_GET['id'])) {
?>
    <script>
        window.location = "index.php";
    </script>
    <?php
} else {

    require 'db_connection.php';

    $resultsetMSG = Database::search("SELECT * FROM `product` INNER JOIN `brand` ON `brand`.`id` = `product`.`brand_id` INNER JOIN `sub_category` ON `sub_category`.`id` = `product`.`sub_category_id` INNER JOIN `category` ON `category`.`id` = `sub_category`.`category_id` WHERE  `product`.`id` = '" . $_GET['id'] . "' AND `product`.`status_id` = '1' AND  `category`.`status_id` = '1' AND  `sub_category`.`status_id` = '1' AND  `brand`.`status_id` = '1'  ; ");

    if ($resultsetMSG->num_rows > 0) {
        $MSGproduct = $resultsetMSG->fetch_assoc();
    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

            <link rel="stylesheet" href="whatsapp/css/joinchat.css">
            <link rel="stylesheet" href="whatsapp/css/joinchat.min.css">
            <link rel="stylesheet" href="whatsapp/css/joinchat-btn.css">
            <link rel="stylesheet" href="whatsapp/css/joinchat-woo.css">

            <script src="whatsapp/js/joinchat.js"></script>
            <script src="whatsapp/js/joinchat-lite.js"></script>
            <script src="whatsapp/js/kjua.min.js"></script>
            <style>
                /* .joinchat__button {
            position: absolute;
            z-index: 0;
            top: 8px;
            right: 8px;
            height: var(--s);
            min-width: var(--s);
            max-width: 155vw;
            background: #25d366;
            color: inherit;
            border-radius: calc(var(--s)/2);
            box-shadow: 1px 6px 24px 0 rgba(7, 94, 84, 0.24);
            cursor: pointer;
            transition: background-color 0.2s linear;
        } */
                .buy-btn {
                    background-color: rgba(211, 0, 0, 0.8);
                }

                .buy-btn:hover {
                    background-color: rgba(0, 126, 4, 1);
                }
            </style>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        </head>

        <body style="background-color: transparent; text-align: center; overflow: hidden;">
            <button onclick="buyNow();" style="color: white; border-radius: 50px; cursor: pointer; outline: none; border: none; font-weight: 500; letter-spacing: 1px;" class="px-5 py-3 buy-btn"><img style="width: 25px; margin-right: 15px; margin-top: -2px;" src="data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23fff' d='M3.516 3.516c4.686-4.686 12.284-4.686 16.97 0 4.686 4.686 4.686 12.283 0 16.97a12.004 12.004 0 0 1-13.754 2.299l-5.814.735a.392.392 0 0 1-.438-.44l.748-5.788A12.002 12.002 0 0 1 3.517 3.517zm3.61 17.043.3.158a9.846 9.846 0 0 0 11.534-1.758c3.843-3.843 3.843-10.074 0-13.918-3.843-3.843-10.075-3.843-13.918 0a9.846 9.846 0 0 0-1.747 11.554l.16.303-.51 3.942a.196.196 0 0 0 .219.22l3.961-.501zm6.534-7.003-.933 1.164a9.843 9.843 0 0 1-3.497-3.495l1.166-.933a.792.792 0 0 0 .23-.94L9.561 6.96a.793.793 0 0 0-.924-.445 1291.6 1291.6 0 0 0-2.023.524.797.797 0 0 0-.588.88 11.754 11.754 0 0 0 10.005 10.005.797.797 0 0 0 .88-.587l.525-2.023a.793.793 0 0 0-.445-.923L14.6 13.327a.792.792 0 0 0-.94.23z'/%3E%3C/svg%3E" alt="">Send Message for Buy</button>


            <div style="position: static !important; margin-top: 0px; text-align: center !important; min-width: 100px;" class=" joinchat" data-settings="{&quot;telephone&quot;:&quot;94716643677&quot;,&quot;mobile_only&quot;:false,&quot;button_delay&quot;:3,&quot;whatsapp_web&quot;:true,&quot;qr&quot;:true,&quot;message_views&quot;:2,&quot;message_delay&quot;:10,&quot;message_badge&quot;:true,&quot;message_send&quot;:&quot;Hello!\nhttps://www.senuhascolourmart.lk/product?id=<?= $_GET['id'] ?>&<?= str_replace(' ', '_', $MSGproduct['title']) ?>&quot;,&quot;message_hash&quot;:&quot;e383dadb&quot;}" style="--peak:url(\#joinchat__message__peak);">
                <div class="joinchat__button" id="buy" style=" background-color: transparent; color: transparent; box-shadow: none;">
                </div>
            </div>

            <script>
                function buyNow() {
                    document.getElementById('buy').click();
                    setTimeout(function() {
                        document.getElementById('buy').click();
                    }, 600);
                }
            </script>
        </body>

        </html>
    <?php
    } else {
    ?>
        <script>
            window.location = "index.php";
        </script>
<?php
    }
}

?>