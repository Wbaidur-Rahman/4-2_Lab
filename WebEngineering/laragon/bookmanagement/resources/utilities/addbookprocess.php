<?php
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Load existing data from books.json if it exists
        $file = 'books.json';
        if (file_exists($file)) {
            $jsonData = file_get_contents($file);
            $books = json_decode($jsonData, true);
        } else {
            // If books.json doesn't exist yet, initialize an empty array
            $books = array();
        }

        // Process the form data
        $title = $_POST["title"];
        $author = $_POST["author"];
        $isbn = $_POST["isbn"];
        $totalpage = $_POST["totalpage"];

        // Find the next available index for the new book
        $nextIndex = count($books);

        // Construct an array with the new book data
        $bookData = array(
            "title" => $title,
            "author" => $author,
            "isbn" => $isbn,
            "totalpage" => $totalpage
        );

        // Add the new book data to the array of books
        $books[$nextIndex] = $bookData;

        // Encode the updated array into JSON format
        $jsonData = json_encode($books);

        // Write the JSON data back to the file
        file_put_contents($file, $jsonData);

        // Redirect the user back to the original page
        header("Location: index.php");
        exit();
    } else {
        // If accessed directly, redirect back to the original page
        header("Location: index.php");
        exit();
    }
?>
