<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    
    <title>Book Management</title>
</head>
<body>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>

            @endforeach
        </ul>

        @endif
    </div>
    <div class="container">
        <br />
        <br />
        <h1 style="color: green">Add a Book</h1>
        <br />
        <br />

        <form action="{{route('book.store')}}" method="post">
            @csrf
            @method('post')

            <div class="mb-3">
                <label class="form-label">Title :</label>
                <input type="text" class="form-control" id="title" name="title"/>
            </div>
            <div class="mb-3">
                <label class="form-label">Author :</label>
                <input type="text" class="form-control" id="author" name="author"/>
            </div>
            <div class="mb-3">
                <label class="form-label">ISBN :</label>
                <input type="number" class="form-control" id="isbn" name="isbn"/>
            </div>
            <div class="mb-3">
                <label class="form-label">Pages :</label>
                <input type="number" class="form-control" id="page" name="pages"/>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>