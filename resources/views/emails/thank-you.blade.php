<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Contacting Us</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        color: #343a40;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    header {
        background: linear-gradient(to right, #007bff, #00c49a);
        /*            background: -webkit-linear-gradient(to right, #007bff, #00c49a);*/
        color: #ffffff;
        padding: 20px 0;
        text-align: center;
        margin-bottom: 20px;
    }

    header img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    h2 {
        color: #007bff;
    }

    p {
        color: #000;
    }

    footer {
        background: linear-gradient(to right, #007bff, #00c49a);
        /*            background: -webkit-linear-gradient(to right, #007bff, #00c49a);*/
        color: #ffffff;
        padding: 10px 0;
        text-align: center;
        margin-top: 20px;
        border-radius: 0 0 5px 5px;
    }
    </style>
</head>

<body>

    <header>
        <div class="container">
            <img src="{{ asset('frontend_assets/images/logo.png') }}" alt="Logo">
        </div>
    </header>

    <div class="container">
        <h2>Thank You for Contacting Us</h2>
        <p>Dear {{ $data['name'] }},</p>

        <p>We have received your details, and our team shall connect with you shortly with the required information.</p>

        <p>If you have any immediate questions, please don't hesitate to reach out to us at <a
                href="mailto:agrohitechc3@gmail.com">agrohitechc3@gmail.com</a> OR via WhatsApp at <a
                href="https://wa.me/9422875726">+91-9422875726</a>.</p>

        <p>We are here to assist you and guide you through every step of your journey with us.</p>

        <p>Thanks,</p>
        <p>Team Agro Hi-tech Chemicals</p>

        <p>Website: <a href="https://www.agrohitechchemicals.com">https://www.agrohitechchemicals.com</a></p>
    </div>

    <footer>
        <div class="container">
            <p><strong>&copy; {{ date('Y') }} Agro Hi-tech Chemicals</strong></p>
        </div>
    </footer>

</body>

</html>