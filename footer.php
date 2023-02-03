<div class="row" style="padding-top: 50px;">
    <div class="col-12 p-0">
        <div class="pb-5" style="background-image: url('images/footerImg.png'); background-position: top; background-repeat: no-repeat; background-size: cover; height: auto; padding-top: 130px;">
            <div class="row p-0 m-0" style="color: white;">
                <div class="col-12 col-lg-4 pt-5 px-3 px-sm-5">
                    <h3 class="mt-2 text-center">About Us</h3>
                    <p style="text-align: justify;">Senuhas Colour Mart is a whole and retail seller of top quality paint brand and paint accessories for the past 5 years. We are a pround company to serve over 10,000 loyal customers who happily come back to us each time. We provide fine quality paint accesories that are accessible and easy to use for both the professional painter and for people who prefer to DIY.</p>
                </div>
                <div class="col-12 col-lg-4 order-first order-lg-0 px-4 text-center">
                    <h3 class="pb-3" style="font-style: italic;">"Colour Your Life"</h3>
                    <input type="email" id="subscribeEmail" class="form-control py-2" placeholder="Email Address">
                    <button class="btn btn-primary mb-3 mt-4 py-2" onclick="subscribe();" style="width: 100%; background-color: rgba(30, 0, 152, 1);">Subscribe</button>
                    <h5 class="mt-4 mb-3">Stay Connected</h5>
                    <a href="https://www.facebook.com/senuhascolourmart" target="_blank"><img class="mx-1" style="height: 25px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA+ElEQVR4nO3ZMS5EURTH4bMBkehMo7EXG9HrUNqEjj3o6CQjOqUpSGTUCgUNIj55oZ9nZt57Z6777eCXf3FycyOqfwhb2Mc5HvHqxzOe8IBb3OASh5EJ1nGKD3/zGVlgG3fmFBlgDZN5IxqRAY4tKIaGEd5KCNlbNKKRIeTMEsTQcL+EjnGGkObIzfL+eyBHkRW+WoQcRHba2YzstBCrQA1JRl2kZ7jWvXEfIX14KSVkUkrIRSkhJ6WEHJUSsltKyE4fIVcdR0yx0XlIi9CZYhWoIcmoiySjLpKMukgy6iLJqIskoy6SjLpIMuoiyZj9ph/+o7OK7n0DaHnpTc9J16kAAAAASUVORK5CYII="></a>
                    <!-- <a href="" target="_blank"> -->
                    <img class="mx-1" onclick="document.getElementById('wh').click(); setTimeout(function(){document.getElementById('wh').click();},600)" style="height: 28px; cursor: pointer;" src="data:image/png;base64,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">
                    <!-- </a> -->
                    <a href="https://www.m.me/128556609379250" target="_blank"><img class="mx-1" style="height: 28px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEYklEQVR4nO2ZW4hVZRTHt5ccLfKugaGN4SA+iKSiDz5ERZaVgmTeRuxBnbyB4niJAekilIEPSXaBrEBfxCIoQ0dxukAQJaToqGmKioKMgk49eLdfLM//0Ddn9t7n23v28RzDPwzKWetb67/2t/f61lpfENzH/xTAEGAOsAnYA5wELgE39XdJv+0GPgBqgcFBJQB4BFgD7Cc9fgdWm62gDAEMBT4DrjmE7Il/A6wCJgE1QB+gK/CA/l8jmRH/FrjsrDdbnwLVdyOAB4H1TgC3gC+Bl4BuKex1AyYDX8mW4SrwDtCjVEGMBY7ecQW3gc1ZPj3gceAL2TYcBkZnZT/vpNbZhQPAE5k6aOtrDHDQ2Z1ZWRmuB/6R4ffTvEIpfFYp+yHfKzpqcJmM2fv7WmZM/f0vdl61pWmNTJYReyILMmfpz+NV8bC/F9Ok11Y9ifqSsfTn87q4XPZOMEAnYK8WbgsqAOQ4WYpGlUEnn0WzteA80DeoEAD9gQviNr2Ysp3Cx6U8N6gwAPPE7Q+gS5zidCkejVUsE8g96GPiOC1OMf9tLAwqFMAScdwVpTBQKe4K0DMDh/0zOBQ7h/zeWye+nW39osoQw86OEJCtwcBpKzBTZqhXgKkxOtbvGGaECT/K4twABgEn+A9vJlg7AfgVWFdEz1oFw6Yw4U8SPpsyBrPRD2imPdZ7dJdbVEV87OHnedn9Pkx4VsLHUgbRE9gXEkTkzuh93+BU1tvCvouQddXSPxMm/FvCh1ME0QP4MSaINjujNFoHtDgyy5hVnv56aU1rmNAGBIauKbq8nfhjsw40F78ADyXwaQ/CcDNMmC8SeyUw2AXYXkCqRWR90Zy0FKLIjpyRsDpBmvzcIWS5/d38GQQ0eARxCng0SRBOdR75jfwg4cTAA/pIUaaxXRkaovNeTBBWAA738RWTtZrChBslXNVO2F73ben+DIwvsms24ilEa0f6fnLjpMhzZJaEjUWMrNTEcJpPXxDyHVkJ9GTaIHxOdhug3QCuR33wqo7rfdNkQWbbpcw4JcnaCJ7RtZaUGhXpkggyfYKODfcmpV2fhw0hYqtfKdnE0PBnBfcjx8Xx5TjFzsARKdYFFQZgvnfjB7wg5YuR72AZAAwQp/jusGCRTcrRv8UnFiUGuTT+deJ+Sd2iTVEMDSVl6cenwbm6GJJ08VNKxeWeNM4TB0u3z6U1MlN9vBlZljlLv0HDbQWyKIvZa77E/zAzlvE+uzuttwWxPCvDdl12B5kYjPc1zmmXrxSdKqZwUNJAgGHAVucu5hAwqhSOMg9Es6spSq35exDbhXX2emXpq2gg1uMDazXHslrtLbvHAEZa06R+Pn+rO0JlkF0TfAf8VVAVf1Lyu/fCQERwhTMhT4vfVFEPKGkAhYHo6S4Ezjm/NQFPayfeAHbo0vSsnvQNHWbHtGsbldoH3RXyLhzS1lS5049ngnsJtEWz5rNlr8MSQwHYPGqGzzSwYkGu5kk0vLuPIDn+BXCMhpgdwgMpAAAAAElFTkSuQmCC"></a>
                </div>
                <div class="col-12 col-lg-4 pt-5 px-3 px-sm-5">
                    <h3 class="mt-2 text-center test">Why You Choose Us</h3>
                    <p style="text-align: justify;">Senuhas Colour Mart offers top quality paints and paint accessories on wholesale price. Customer satisfaction is of prime importance to us:hence,we aim to fulfil all customer requirements. We have colour mixing machine and mix different paint colours to create the perfect paint colour that the requires. We offer 100,000 paint colour choice for customer who want a customized paint colour. With our state-of-the-art paint mixing machines, we can create the desired paint colour in only few minutes.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 text-center p-3" style="background-color: rgba(0, 6, 67, 1); color: white; font-size: 16px;">
        &#169; 2023 Copyright <b>senuhascolourmart.lk</b> | All right reserved
    </div>
</div>

<style>
    .btn-messenger-pulse {
        background: rgba(39, 93, 245, 1);
        color: white;
        position: fixed;
        /* bottom: 20px;
			right: 20px; */
        font-size: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        /* width: 0;
			height: 0;
			padding: 35px; */
        text-decoration: none;
        border-radius: 50%;
        animation-name: pulse2;
        animation-duration: 1.5s;
        animation-timing-function: ease-out;
        animation-iteration-count: infinite;
    }

    @keyframes pulse2 {
        0% {
            box-shadow: 0 0 0 0 rgba(39, 93, 245, 0.5);
        }

        80% {
            box-shadow: 0 0 0 14px rgba(39, 93, 245, 0);
        }
    }

    .btn-whatsapp-pulse {
        background: #25d366;
        color: white;
        position: fixed;
        /* bottom: 20px;
			right: 20px; */
        font-size: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        /* width: 0;
			height: 0;
			padding: 35px; */
        text-decoration: none;
        border-radius: 50%;
        animation-name: pulse;
        animation-duration: 1.5s;
        animation-timing-function: ease-out;
        animation-iteration-count: infinite;
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.5);
        }

        80% {
            box-shadow: 0 0 0 14px rgba(37, 211, 102, 0);
        }
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<div class="joinchat joinchat--right joinchat--dark joinchat--show " data-settings="{&quot;telephone&quot;:&quot;94716643677&quot;,&quot;mobile_only&quot;:false,&quot;button_delay&quot;:3,&quot;whatsapp_web&quot;:true,&quot;qr&quot;:true,&quot;message_views&quot;:2,&quot;message_delay&quot;:10,&quot;message_badge&quot;:true,&quot;message_send&quot;:&quot;Hello!&quot;,&quot;message_hash&quot;:&quot;e383dadb&quot;}" style="--peak:url(\#joinchat__message__peak);">
    <div class="joinchat__button" id="wh" onmouseover="this.style.backgroundColor='#00ad1d'; document.getElementById('qr').style.display='block';" onmouseout="this.style.backgroundColor='#25d366'; document.getElementById('qr').style.display='none';">
        <div class="joinchat__button__open btn-whatsapp-pulse"></div>
        <div class="joinchat__button__sendtext">Open chat</div>
        <svg class="joinchat__button__send" width="60" height="60" viewBox="0 0 400 400" stroke-linecap="round" stroke-width="33">
            <path class="joinchat_svg__plain" d="M168.83 200.504H79.218L33.04 44.284a1 1 0 0 1 1.386-1.188L365.083 199.04a1 1 0 0 1 .003 1.808L34.432 357.903a1 1 0 0 1-1.388-1.187l29.42-99.427"></path>
            <path class="joinchat_svg__chat" d="M318.087 318.087c-52.982 52.982-132.708 62.922-195.725 29.82l-80.449 10.18 10.358-80.112C18.956 214.905 28.836 134.99 81.913 81.913c65.218-65.217 170.956-65.217 236.174 0 42.661 42.661 57.416 102.661 44.265 157.316"></path>
        </svg>
        <div class="joinchat__badge">1</div>
        <div class="joinchat__tooltip">
            <div>How can we help you?</div>
        </div>
    </div>
    <div class="joinchat__box" style=" border-radius: 15px;">
        <!-- <div class="joinchat__header">
            <svg class="joinchat__wa" width="120" height="28" viewBox="0 0 120 28">
                <title>WhatsApp</title>
                <path d="M117.2 17c0 .4-.2.7-.4 1-.1.3-.4.5-.7.7l-1 .2c-.5 0-.9 0-1.2-.2l-.7-.7a3 3 0 0 1-.4-1 5.4 5.4 0 0 1 0-2.3c0-.4.2-.7.4-1l.7-.7a2 2 0 0 1 1.1-.3 2 2 0 0 1 1.8 1l.4 1a5.3 5.3 0 0 1 0 2.3zm2.5-3c-.1-.7-.4-1.3-.8-1.7a4 4 0 0 0-1.3-1.2c-.6-.3-1.3-.4-2-.4-.6 0-1.2.1-1.7.4a3 3 0 0 0-1.2 1.1V11H110v13h2.7v-4.5c.4.4.8.8 1.3 1 .5.3 1 .4 1.6.4a4 4 0 0 0 3.2-1.5c.4-.5.7-1 .8-1.6.2-.6.3-1.2.3-1.9s0-1.3-.3-2zm-13.1 3c0 .4-.2.7-.4 1l-.7.7-1.1.2c-.4 0-.8 0-1-.2-.4-.2-.6-.4-.8-.7a3 3 0 0 1-.4-1 5.4 5.4 0 0 1 0-2.3c0-.4.2-.7.4-1 .1-.3.4-.5.7-.7a2 2 0 0 1 1-.3 2 2 0 0 1 1.9 1l.4 1a5.4 5.4 0 0 1 0 2.3zm1.7-4.7a4 4 0 0 0-3.3-1.6c-.6 0-1.2.1-1.7.4a3 3 0 0 0-1.2 1.1V11h-2.6v13h2.7v-4.5c.3.4.7.8 1.2 1 .6.3 1.1.4 1.7.4a4 4 0 0 0 3.2-1.5c.4-.5.6-1 .8-1.6.2-.6.3-1.2.3-1.9s-.1-1.3-.3-2c-.2-.6-.4-1.2-.8-1.6zm-17.5 3.2l1.7-5 1.7 5h-3.4zm.2-8.2l-5 13.4h3l1-3h5l1 3h3L94 7.3h-3zm-5.3 9.1l-.6-.8-1-.5a11.6 11.6 0 0 0-2.3-.5l-1-.3a2 2 0 0 1-.6-.3.7.7 0 0 1-.3-.6c0-.2 0-.4.2-.5l.3-.3h.5l.5-.1c.5 0 .9 0 1.2.3.4.1.6.5.6 1h2.5c0-.6-.2-1.1-.4-1.5a3 3 0 0 0-1-1 4 4 0 0 0-1.3-.5 7.7 7.7 0 0 0-3 0c-.6.1-1 .3-1.4.5l-1 1a3 3 0 0 0-.4 1.5 2 2 0 0 0 1 1.8l1 .5 1.1.3 2.2.6c.6.2.8.5.8 1l-.1.5-.4.4a2 2 0 0 1-.6.2 2.8 2.8 0 0 1-1.4 0 2 2 0 0 1-.6-.3l-.5-.5-.2-.8H77c0 .7.2 1.2.5 1.6.2.5.6.8 1 1 .4.3.9.5 1.4.6a8 8 0 0 0 3.3 0c.5 0 1-.2 1.4-.5a3 3 0 0 0 1-1c.3-.5.4-1 .4-1.6 0-.5 0-.9-.3-1.2zM74.7 8h-2.6v3h-1.7v1.7h1.7v5.8c0 .5 0 .9.2 1.2l.7.7 1 .3a7.8 7.8 0 0 0 2 0h.7v-2.1a3.4 3.4 0 0 1-.8 0l-1-.1-.2-1v-4.8h2V11h-2V8zm-7.6 9v.5l-.3.8-.7.6c-.2.2-.7.2-1.2.2h-.6l-.5-.2a1 1 0 0 1-.4-.4l-.1-.6.1-.6.4-.4.5-.3a4.8 4.8 0 0 1 1.2-.2 8.3 8.3 0 0 0 1.2-.2l.4-.3v1zm2.6 1.5v-5c0-.6 0-1.1-.3-1.5l-1-.8-1.4-.4a10.9 10.9 0 0 0-3.1 0l-1.5.6c-.4.2-.7.6-1 1a3 3 0 0 0-.5 1.5h2.7c0-.5.2-.9.5-1a2 2 0 0 1 1.3-.4h.6l.6.2.3.4.2.7c0 .3 0 .5-.3.6-.1.2-.4.3-.7.4l-1 .1a21.9 21.9 0 0 0-2.4.4l-1 .5c-.3.2-.6.5-.8.9-.2.3-.3.8-.3 1.3s.1 1 .3 1.3c.1.4.4.7.7 1l1 .4c.4.2.9.2 1.3.2a6 6 0 0 0 1.8-.2c.6-.2 1-.5 1.5-1a4 4 0 0 0 .2 1H70l-.3-1v-1.2zm-11-6.7c-.2-.4-.6-.6-1-.8-.5-.2-1-.3-1.8-.3-.5 0-1 .1-1.5.4a3 3 0 0 0-1.3 1.2v-5h-2.7v13.4H53v-5.1c0-1 .2-1.7.5-2.2.3-.4.9-.6 1.6-.6.6 0 1 .2 1.3.6.3.4.4 1 .4 1.8v5.5h2.7v-6c0-.6 0-1.2-.2-1.6 0-.5-.3-1-.5-1.3zm-14 4.7l-2.3-9.2h-2.8l-2.3 9-2.2-9h-3l3.6 13.4h3l2.2-9.2 2.3 9.2h3l3.6-13.4h-3l-2.1 9.2zm-24.5.2L18 15.6c-.3-.1-.6-.2-.8.2A20 20 0 0 1 16 17c-.2.2-.4.3-.7.1-.4-.2-1.5-.5-2.8-1.7-1-1-1.7-2-2-2.4-.1-.4 0-.5.2-.7l.5-.6.4-.6v-.6L10.4 8c-.3-.6-.6-.5-.8-.6H9c-.2 0-.6.1-.9.5C7.8 8.2 7 9 7 10.7c0 1.7 1.3 3.4 1.4 3.6.2.3 2.5 3.7 6 5.2l1.9.8c.8.2 1.6.2 2.2.1.6-.1 2-.8 2.3-1.6.3-.9.3-1.5.2-1.7l-.7-.4zM14 25.3c-2 0-4-.5-5.8-1.6l-.4-.2-4.4 1.1 1.2-4.2-.3-.5A11.5 11.5 0 0 1 22.1 5.7 11.5 11.5 0 0 1 14 25.3zM14 0A13.8 13.8 0 0 0 2 20.7L0 28l7.3-2A13.8 13.8 0 1 0 14 0z"></path>
            </svg>
            <div class="joinchat__close" aria-label="Close"></div>
        </div> -->
        <div style="color: white; background-color: #075E54; border-top-right-radius: 9px; border-top-left-radius: 9px; width: 100%;" class="p-3">
            <div class="joinchat__close" style="position: absolute; top: 25px;" aria-label="Close"></div>
            <img src="images/logo.jpg" class="p-1" style="width: 50px; height: 50px; border-radius: 50%; background-color: white;" alt="">
            <span style="font-size: 16px; padding-left: 10px;" class="">Senuhas Colour Mart</span>
        </div>
        <div class="joinchat__box__scroll" style="background-color: transparent;  background-image: url('https://i.pinimg.com/originals/7b/1d/8e/7b1d8e865da2c11b788a21a0fb51d542.jpg'); background-repeat: no-repeat; background-position: center; background-size: cover; width: 100%;">
            <div style="background-color: white; color: black; max-width: fit-content; margin-left: 10px; margin-top: 5px; margin-bottom: 20px; box-shadow: 0 3px 3px rgb(0 0 0 / 0.1);" class="p-2 rounded rounded-5">Hi there <img width="23px" class="pb-2" src="data:image/png;base64,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" alt=""> <br> How can we help you?</div>
            <!-- <div class="joinchat__box__content">
                <div class="joinchat__message">Hello,<br>Welcome to Senuhas Colour Mart</div>
            </div> -->
            <div class="p-2 mx-auto text-center animated animate__fadeIn animate__slow	" id="qr" style="position: absolute; display: none; top: 70px; right: 35px; border-radius: 5px; background-color: white;  box-shadow: 0 5px 15px rgb(0 0 0 / 0.1);">
                <img height="200px" class="mx-auto" width="200px" src="images/icons/qr.png" alt="">
                <div style="color: black;">Scan the code</div>
            </div>
        </div>
    </div>
    <svg style="width:0;height:0;position:absolute">
        <defs>
            <clipPath id="joinchat__message__peak">
                <path d="M17 25V0C17 12.877 6.082 14.9 1.031 15.91c-1.559.31-1.179 2.272.004 2.272C9.609 18.182 17 18.088 17 25z"></path>
            </clipPath>
        </defs>
    </svg>
</div>

<style>
    .speech {
        position: relative;
    }


    .speech::after {
        /* (B1-1) ATTACH TRANSPARENT BORDERS */
        content: "";
        border: 10px solid transparent;

        /* (B1-2) NECESSARY TO POSITION THE "TAIL" */
        position: absolute;
    }

    /* (C3) RIGHT */
    .right.speech::after {
        /* (C3-1) RIGHT TRIANGLE */
        border-left-color: white;
        border-right: 0;

        /* (C3-2) POSITION AT RIGHT */
        right: -6px;
        top: 50%;
        margin-top: -10px;
    }


    .messenger {
        background-image: url('images/messenger.png');
        cursor: pointer;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 60px;
        width: 60px;
        position: fixed;
        right: 13px;
        bottom: 100px;
    }

    @media (min-width: 481px) {
        .messenger {
            bottom: 110px;
            right: 28px;
        }
    }
</style>


<div class="btn-messenger-pulse messenger" onclick="window.open('https://www.m.me/128556609379250' , '_blank');" onmouseover="document.getElementById('messenferTooltip').style.display='block';" onmouseout="document.getElementById('messenferTooltip').style.display='none';">
</div>
<div class="pe-1 animate__animated animate__fadeIn animate__faster speech right" id="messenferTooltip" style="position: fixed; display: none; right: 100px; bottom: 125px; background-color: rgba(251, 251, 251, 1); border-radius: 15px; box-shadow: 1px 1px 10px 1px rgba(170, 170, 170, 0.8);">
    <div class="p-1 px-3" style="color: black; padding: 2px 10px; font-size: 15px; letter-spacing: 1px; color: rgba(86, 86, 86, 1);">How can we help you?</div>
</div>


<link rel="stylesheet" href="whatsapp/css/joinchat.css">
<link rel="stylesheet" href="whatsapp/css/joinchat.min.css">
<link rel="stylesheet" href="whatsapp/css/joinchat-btn.css">
<link rel="stylesheet" href="whatsapp/css/joinchat-woo.css">
<script src="whatsapp/js/joinchat.js"></script>
<script src="whatsapp/js/joinchat-lite.js"></script>
<script src="whatsapp/js/kjua.min.js"></script>

<script>
    function subscribe() {
        var email = document.getElementById('subscribeEmail').value;

        var form = new FormData();
        form.append("email", email);

        var r = new XMLHttpRequest();

        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var text = r.responseText;

                if (text == "success") {
                    document.getElementById('subscribeEmail').value = '';
                    Swal.fire({
                        icon: 'success',
                        title: 'Subscribed',
                        text: 'Subscribed succsessfully'
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

        r.open("POST", "subscribeProcess.php", true);
        r.send(form);

    }
</script>