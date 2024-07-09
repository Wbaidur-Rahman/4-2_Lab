<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Load existing data from books.json
    $file = 'books.json';
    if (file_exists($file)) {
        $jsonData = file_get_contents($file);
        $books = json_decode($jsonData, true);
    } else {
        // If books.json doesn't exist, redirect back to the index page
        header("Location: index.php");
        exit();
    }

    // Get the index of the book to update from the form submission
    $indexToUpdate = $_POST['index'];

    // Check if the index is valid
    if (isset($books[$indexToUpdate])) {
        // Retrieve the existing book data
        $existingBook = $books[$indexToUpdate];

        // Retrieve the updated book information from the form submission
        $updatedTitle = $_POST['title'];
        $updatedAuthor = $_POST['author'];
        $updatedIsbn = $_POST['isbn'];

        // Update the book information
        $existingBook['title'] = $updatedTitle;
        $existingBook['author'] = $updatedAuthor;
        $existingBook['isbn'] = $updatedIsbn;

        // Update the book in the array
        $books[$indexToUpdate] = $existingBook;

        // Encode the updated array into JSON format
        $jsonData = json_encode($books);

        // Write the JSON data back to the file
        file_put_contents($file, $jsonData);

        // Redirect back to the index page
        header("Location: index.php");
        exit();
    } else {
        // If the index is invalid, redirect back to the index page
        header("Location: index.php");
        exit();
    }
} else {
    // If accessed directly, redirect back to the index page
    header("Location: index.php");
    exit();
}
?>
