<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Interest in Joining AB Consulting.!</title>
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

        <p>Dear {{ $data['name'] }},</p>

        <p>Greetings!!!</p>

        <p>Thank you for taking the initiative to submit your details and express your interest in joining the Agro
            Hi-tech Chemicals.</p>

        <p>Our team will carefully review your information, and if your qualifications align with our current
            opportunities, we will reach out to you for the next steps in the hiring process. Please be assured that
            your application is important to us, and we value the potential contributions you could bring to our
            organization.</p>

        <p>In the meantime, feel free to explore more about Agro Hi-tech Chemicals on our website or connect with us on
            social media
            pages to stay updated on our latest news and developments.</p>

        <p>Thank you once again for considering a career with us. We look forward to the possibility of having you as
            part of our dynamic team.</p>


        <p>Thanks,</p>
        <p>Team Agro Hi-tech Chemicals</p>

        <p>Website: <a href="https://www.agrohitechchemicals.com">https://www.agrohitechchemicals.com/</a></p>
    </div>

    <footer>
        <div class="container">
            <p><strong>&copy; {{ date('Y') }} Agro Hi-tech Chemicals</strong></p>
        </div>
    </footer>

</body>

</html>