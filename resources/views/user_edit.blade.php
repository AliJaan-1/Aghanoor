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
      .container {
        max-width: 800px;
        margin: auto;
      }
      .form-control {
        background-color: #333;
        color: #fff;
        border: 1px solid #555;
      }
      .form-control:focus {
        background-color: #444;
        border-color: gold;
      }
      button {
        background-color: #ffcc00;
        color: #000;
        border: none;
        padding: 10px 20px; 
        font-weight: bold;
      }
    button:hover {
        background-color: #e6b800;
      }
      img {
        display: block;
        margin: 10px 0;
      }
    </style>
  </head>
  <body>
    <div class="container p-4">
      <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <h1>Agha Noor Fabric Inventory</h1>

        <div class="mb-3">
          <label class="form-label">Brand :</label>
          <input type="text" value="{{ $user->brand }}" name="brand" class="form-control">
        </div>

        <div class="mb-3">
          <label class="form-label">Shade :</label>
          <input type="number" value="{{ $user->shade }}" name="shade" class="form-control">
        </div>

        <div class="mb-3">
          <label for="">IMAGE :</label>
          <img src="{{ asset('storage/'.$user->image_path) }}" style="height:50px;" width="50px;" alt="">
          <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
          <label for="">FABRIC :</label>
          <input type="text" value="{{ $user->fabric }}" name="fabric" class="form-control">
        </div>

        <div class="mb-3">
          <label for="">COLOR :</label>
          <input type="text" value="{{ $user->color }}" name="color" class="form-control">
        </div>

        <div class="mb-3">
          <label for="">YARDS :</label>
          <input type="number" value="{{ $user->yards }}" name="yards" class="form-control">
        </div>

        <div class="mb-3">
          <label class="form-label">STATUS :</label>
          <textarea name="status" class="form-control" rows="3">{{ $user->status }}</textarea>
        </div>

        <button type="submit">Submit</button>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>
