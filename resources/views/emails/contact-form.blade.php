<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
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
        <h2>Contact Form Submission</h2>
        <p><strong>Name:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
        <p><strong>Product:</strong> {{ $data['product'] }}</p>
        <p><strong>Message:</strong> {{ $data['message'] }}</p>
    </div>

    <footer>
        <div class="container">
            <p><strong>&copy; {{ date('Y') }} Agro Hi-tech Chemicals</strong></p>
        </div>
    </footer>

</body>

</html>