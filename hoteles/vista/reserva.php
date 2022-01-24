<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <style>
        body {
            background-image: linear-gradient(to right, #7B1FA2, #E91E63)
        }

        .section {
            position: relative;
            height: 100vh
        }

        .section .section-center {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%)
        }

        #booking {
            font-family: 'Raleway', sans-serif
        }

        .booking-form {
            position: relative;
            max-width: 642px;
            width: 100%;
            margin: auto;
            padding: 40px;
            overflow: hidden;
            background-image: url('https://i.imgur.com/8z1tx3u.jpg');
            background-size: cover;
            border-radius: 5px;
            z-index: 20
        }

        .booking-form::before {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            background: rgba(0, 0, 0, 0.7);
            z-index: -1
        }

        .booking-form .form-header {
            text-align: center;
            position: relative;
            margin-bottom: 30px
        }

        .booking-form .form-header h1 {
            font-weight: 700;
            text-transform: capitalize;
            font-size: 42px;
            margin: 0px;
            color: #fff
        }

        .booking-form .form-group {
            position: relative;
            margin-bottom: 30px
        }

        .booking-form .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            height: 60px;
            padding: 0px 25px;
            border: none;
            border-radius: 40px;
            color: #fff;
            -webkit-box-shadow: 0px 0px 0px 2px transparent;
            box-shadow: 0px 0px 0px 2px transparent;
            -webkit-transition: 0.2s;
            transition: 0.2s
        }

        .booking-form .form-control::-webkit-input-placeholder {
            color: rgba(255, 255, 255, 0.5)
        }

        .booking-form .form-control:-ms-input-placeholder {
            color: rgba(255, 255, 255, 0.5)
        }

        .booking-form .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5)
        }

        .booking-form .form-control:focus {
            -webkit-box-shadow: 0px 0px 0px 2px #ff8846;
            box-shadow: 0px 0px 0px 2px #ff8846
        }

        .booking-form input[type="date"].form-control {
            padding-top: 16px
        }

        .booking-form input[type="date"].form-control:invalid {
            color: rgba(255, 255, 255, 0.5)
        }

        .booking-form input[type="date"].form-control+.form-label {
            opacity: 1;
            top: 10px
        }

        .booking-form select.form-control {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none
        }

        .booking-form select.form-control:invalid {
            color: rgba(255, 255, 255, 0.5)
        }

        .booking-form select.form-control+.select-arrow {
            position: absolute;
            right: 15px;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            width: 32px;
            line-height: 32px;
            height: 32px;
            text-align: center;
            pointer-events: none;
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px
        }

        .booking-form select.form-control+.select-arrow:after {
            content: '\279C';
            display: block;
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg)
        }

        .booking-form select.form-control option {
            color: #000
        }

        .booking-form .form-label {
            position: absolute;
            top: -10px;
            left: 25px;
            opacity: 0;
            color: #ff8846;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.3px;
            height: 15px;
            line-height: 15px;
            -webkit-transition: 0.2s all;
            transition: 0.2s all
        }

        .booking-form .form-group.input-not-empty .form-control {
            padding-top: 16px
        }

        .booking-form .form-group.input-not-empty .form-label {
            opacity: 1;
            top: 10px
        }

        .booking-form .submit-btn {
            color: #fff;
            background-color: #e35e0a;
            font-weight: 700;
            height: 60px;
            padding: 10px 30px;
            width: 100%;
            border-radius: 40px;
            border: none;
            text-transform: uppercase;
            font-size: 16px;
            letter-spacing: 1.3px;
            -webkit-transition: 0.2s all;
            transition: 0.2s all
        }

        .booking-form .submit-btn:hover,
        .booking-form .submit-btn:focus {
            opacity: 0.9
        }
    </style>
</head>
<body>
<div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="booking-form">
                    <div class="form-header">
                        <h1>Realiza tu reserva</h1>
                    </div>
                    <form>
                        <div class="form-group"> <input class="form-control" type="text" placeholder="Codigo postal, ciudad.."> <span class="form-label">Destino</span> </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <input class="form-control" type="date" required> <span class="form-label">Check In</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> <input class="form-control" type="date" required> <span class="form-label">Check out</span> </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <input class="form-control" type="email" placeholder="Introduce tu correo"> <span class="form-label">Email</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> <input class="form-control" type="tel" placeholder="tu contraseña"> <span class="form-label">contraseña</span> </div>
                            </div>
                        </div>
                        <div class="form-btn"> <button class="submit-btn">Encuentra y reserva</button> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>