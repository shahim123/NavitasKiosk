<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Visitor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background: rgb(230, 230, 230);

        }

        .row {
            background: white;
            border-radius: 30px;
            box-shadow: 12px 12px 22px grey;
        }

        img {
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }

        .btn-1 {
            border: none;
            outline: none;
            height: 50px;
            width: 100%;
            background-color: black;
            color: white;
            border-radius: 4px;
            font-weight: bold;

        }

        .btn-1:hover {
            background-color: white;
            border: 1px solid;
            color: black;
        }
    </style>
</head>

<body>
    <Section class="Form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5 col-md-5">
                    <img src="./images/img1.jpg" class="img-fluid" alt="picutre not there">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1 class="font-weight-bold py-3">Navitas KIOSK</h1>
                    <h4>Sign in as VISITOR:</h4>
                    <!--Form Creation for our login page for visitor-->
                    <form method="post">
                        <div class="form-row first_box">
                            <div class="col-lg-7">
                                <input type="text" id="email" placeholder="Email ID" class="form-control my-3 p-4" name="email" required="required" aria-describedby="emailHelp">
                                <span id="email_error" class="field_error"></span>
                            </div>
                        </div>
                        <div class="form-row first_box">
                            <div class="col-lg-7">
                                <button type="button" class="btn-1 mt-3 mb-5" onclick="send_otp()">Send Code</button>
                                <!--OTP ONCLICK Function executed here -->
                            </div>
                        </div>
                        <div class="form-row second_box">
                            <div class="col-lg-7">
                                <input type="text" id="otp" placeholder="Authentication code" class="form-control my-3 p-4" name="otp" required="required" aria-describedby="emailHelp">
                                <span id="otp_error" class="field_error"></span>
                            </div>
                        </div>
                        <div class="form-row second_box">
                            <div class="col-lg-7">
                                <button type="button" class="btn-1 mt-3 mb-5" onclick="submit_otp()">Submit Code</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
        </div>
    </Section>
    <script>
        //Send OTP function   
        function send_otp() {
            var email = jQuery('#email').val();
            jQuery.ajax({
                url: 'send_otp.php',
                type: 'post',
                data: 'email=' + email,
                success: function(result) {
                    if (result == 'yes') {
                        jQuery('.second_box').show();
                        jQuery('.first_box').hide();
                    }
                    if (result == 'not_exist') {
                        jQuery('#email_error').html('Please enter valid email');
                    }
                }
            });
        }
        //Submit OTP Function 
        function submit_otp() {
            var otp = jQuery('#otp').val();
            jQuery.ajax({
                url: 'check_otp.php',
                type: 'post',
                data: 'otp=' + otp,
                success: function(result) {
                    if (result == 'yes') {
                        window.location = 'ask_visitor.php'
                    }
                    if (result == 'not_exist') {
                        jQuery('#otp_error').html('Please enter valid otp');
                    }
                }
            });
        }
    </script>
    <style>
        .second_box {
            display: none;
        }

        .field_error {
            color: red;
        }
    </style>
</body>

</html>