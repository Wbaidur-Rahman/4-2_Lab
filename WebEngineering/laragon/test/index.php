<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./styles/index.css" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"
  />
  <title>Simple Web App</title>
</head>
<body>

  <div class="container" style="padding-top: 100px">
    <h1 style="color: blue">All books</h1>
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
      <tbody>
        <?php
          // Read the JSON file and decode its contents
          $jsonData = file_get_contents('books.json');
          $books = json_decode($jsonData, true);

          // Check if there are any books
          if (!empty($books)) {
            // Loop through each book and display its details
            foreach ($books as $key => $book) {
              echo "<tr>";
              echo "<th scope='row'>" . ((int)$key + 1) . "</th>";
              echo "<td>" . $book['title'] . "</td>";
              echo "<td>" . $book['author'] . "</td>";
              echo "<td>" . $book['isbn'] . "</td>";
              echo "<td>" . $book['totalpage'] . "</td>";
              // Add update and delete buttons in each row
              echo "<td>
                      <a href='update_book_form.php?index=$key' class='btn btn-primary'>Update</a>
                      <form action='delete_book.php' method='post' style='display: inline-block;'>
                        <input type='hidden' name='index' value='$key'>
                        <button type='submit' class='btn btn-danger'>Delete</button>
                      </form>
                    </td>";
              echo "</tr>";
              
            }
          } else {
            // Display a message if there are no books
            echo "<tr><td colspan='5'>No books found</td></tr>";
          }
        ?>
      </tbody>
    </table>
    <a href="./addbook.php" class="btn btn-success">Add a book</a>
  </div>
</body>
</html>
