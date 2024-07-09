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
      <h1>Add a book</h1>
      <br />
      <br />

      <form action="./process.php" method="post">
        <div class="mb-3">
          <label for="booktitle" class="form-label">Enter Book Title:</label>
          <input type="text" class="form-control" id="booktitle" name="title" />
        </div>
        <div class="mb-3">
          <label for="authorname" class="form-label">Enter Author Name:</label>
          <input
            type="text"
            class="form-control"
            id="authorname"
            name="author"
          />
        </div>
        <div class="mb-3">
          <label for="isbn" class="form-label">Enter ISBN: </label>
          <input type="number" class="form-control" id="isbn" name="isbn" />
        </div>
        <div class="mb-3">
          <label for="totalpage" class="form-label">Enter Total Page:</label>
          <input
            type="number"
            class="form-control"
            id="totalpage"
            name="totalpage"
          />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </body>
</html>
