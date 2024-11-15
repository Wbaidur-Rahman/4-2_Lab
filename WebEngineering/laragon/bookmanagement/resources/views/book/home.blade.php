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
   
   <div class="container">
      <div>
         @if(session()->has('success'))
            <div>
               <h6>{{session('success')}}</h6>
            </div>
         @endif
      </div>
      <br />
      <br />
      <h1>All Books</h1>
      <br />
      <br />
      <table class="table">
         <thead>
            <tr>
               <th scope="col">#</th>
               <th scope="col">Title</th>
               <th scope="col">Author</th>
               <th scope="col">ISBN</th>
               <th scope="col">Pages</th>
               <th scope="col">Actions</th>
            </tr>
         </thead>
         @if($books->isEmpty())
            <p>No books available.</p>
         @else
            <tbody>
               @foreach($books as $key => $book )
                  <tr>
                     <td>{{(int)$key+1}}</td>
                     <td>{{$book->title}}</td>
                     <td>{{$book->author}}</td>
                     <td>{{$book->isbn}}</td>
                     <td>{{$book->pages}}</td>
                     <td style="display: inline-block">
                        <a href="{{route('book.edit', ['book' => $book])}}" class="btn btn-primary">Edit</a>
                        
                        <form method="post" action="{{route('book.destroy', ['book' => $book])}}"  style="display: inline-block">
                           @csrf
                           @method('delete')
                           <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                     </td>
                  </tr>
               @endforeach
            </tbody>
         @endif
      </table>
      <a href="./addbook" class="btn btn-success">Add a book</a>
   </div>
</body>
</html>