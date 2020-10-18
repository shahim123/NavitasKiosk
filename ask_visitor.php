<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->



    <!-- VISITOR ASK PAGE -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Buttons</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">

        <style>
            *{
                margin:0;
                padding:0;
                font-family:"montserrat", sans-serif;
            }
            body{
                background:#eae9f0;
                height:100vh;
                display:flex;
                align-items:center;
                justify-content:center;
                background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .5)), url(./images//img09.jpg) no-repeat center center /cover;
            }
            .container{
                text-align:center;
            }
            .btn{
                width:200px;
                height:60px;
                background:#d7dade;
                border:4px solid;
                color:#282729;
                font-weight:700;
                text-transform:uppercase;
                cursor:pointer;
                font-size:16px;
                position:relative;

            }
            .btn::before,.btn::after{
                content: "";
                position:absolute;
                width:14px;
                height:4px;
                background:#f4f4f4;
                transform:skewX(50deg);
                transition:.4s linear;

            }
            .btn::before{
                top:-4px;
                left:10%;
            }
            .btn::after{
                bottom:-4px;
                right:10%;
            }
            .btn:hover::before{
                left:80%;

            }
            .btn:hover::after{
                right:80%;
                
            }
            li{
                display:block;
                margin-bottom:30px;
            }
        </style>
    </head>
    <body>
      <div class="container">
        <!-- Making our buttons for the live Directions and Welcome page! -->
        <li><a href="/kiosk/Kiosk Directions/index.html"><button class="btn">GET LIVE DIRECTIONS</button></a></li>
        <li><a href="/kiosk/welcome_visitor.php"><button class="btn">Go To Welcome Page</button></a></li>
        
    </div>
        </body>
</html>