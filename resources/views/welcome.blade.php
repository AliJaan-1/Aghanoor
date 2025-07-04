<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agha Noor Fabric Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #000;
            position: relative;
            overflow: hidden;
        }
        .welcome-container {
            text-align: center;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }
        h1 {
          color: black;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        .btn-inventory {
            font-size: 1.2rem;
            padding: 10px 20px;
        }
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('logo.png');
            background-size: 100vw;
            background-size: 78vh;
            background-position:center;
            filter: blur(5px);
            z-index: 1;
        }
    </style>
</head>
<body>
    <div class="background-image"></div>
    <div class="welcome-container">
        <h1>Agha Noor Fabric Inventory</h1>
        <a href="{{ route('user.index') }}" class="btn btn-primary btn-inventory">View Inventory</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>