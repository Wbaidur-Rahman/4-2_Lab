<?php
  // Read the JSON file and decode its contents
  $jsonData = file_get_contents('books.json');
  $books = json_decode($jsonData, true);

  // Retrieve the book index from the URL parameter
  $index = $_GET['index'];
  
  // Get the book details using the index
  $book = $books[$index];
?>

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
  <title>Update Book</title>
</head>
<body>
  <div class="container py-5">
    <h1 style="color: blue; margin-bottom: 50px;">Update Book</h1>
    <form action="update_book.php" method="post">
      <input type="hidden" name="index" value="<?php echo $index; ?>">
      <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $book['title']; ?>">
      </div>
      <div class="mb-3">
        <label for="author" class="form-label">Author:</label>
        <input type="text" class="form-control" id="author" name="author" value="<?php echo $book['author']; ?>">
      </div>
      <div class="mb-3">
        <label for="isbn" class="form-label">ISBN:</label>
        <input type="number" class="form-control" id="isbn" name="isbn" value="<?php echo $book['isbn']; ?>">
      </div>
      <div class="mb-3">
        <label for="isbn" class="form-label">Pages:</label>
        <input type="number" class="form-control" id="pages" name="totalpage" value="<?php echo $book['totalpage']; ?>">
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary me-md-2">Save Changes</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</body>
</html>
