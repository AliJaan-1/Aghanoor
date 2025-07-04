<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agha Noor Fabric Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        h1 {
            color: gold;
            animation: slide 3s infinite;
            white-space: nowrap;
        }
        .form-control {
            background-color: #333;
            color: #fff;
            border: 1px solid #555;
        }
        .form-control::placeholder {
            color: #aaa;
        }
        button {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container p-4 col-12">
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf
            <h1>Agha Noor Fabric Inventory</h1>

            <div class="mb-3">
                <label class="form-label">Brand :</label>
                <input type="text" name="brand" class="form-control" placeholder="Enter brand name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Shade :</label>
                <input type="number" name="shade" class="form-control" placeholder="Enter shade" required>
            </div>

            <div class="mb-3">
                <label for="">IMAGE :</label>
                <input type="file" name="image" class="form-control" id="imageInput" required>
            </div>

            <div class="mb-3">
                <label for="">FABRIC :</label>
                <input type="text" name="fabric" class="form-control" placeholder="Enter fabric type" required>
            </div>

            <div class="mb-3">
                <label for="">COLOR :</label>
                <input type="text" name="color" class="form-control" placeholder="Enter color" required>
            </div>

            <div class="mb-3">
                <label for="">YARDS :</label>
                <input type="number" name="yards" class="form-control" placeholder="Enter yards" required>
            </div>

            <div class="mb-3">
                <label class="form-control">STATUS :</label>
                <textarea name="status" class="form-control" rows="3" placeholder="Enter status" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    
    <script>
        function validateForm() {
            const imageInput = document.getElementById('imageInput');
            if (!imageInput.files.length) {
                alert('Please upload an image or paste an image from your clipboard.');
                return false;
            }
            return true;
        }
        document.addEventListener('paste', function(event) {
            const items = (event.clipboardData || window.clipboardData).items;
            for (let i = 0; i < items.length; i++) {
                if (items[i].type.indexOf('image') !== -1) {
                    const file = items[i].getAsFile();
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    document.getElementById('imageInput').files = dataTransfer.files;
                }
            }
        });
    </script>
</body>
</html>