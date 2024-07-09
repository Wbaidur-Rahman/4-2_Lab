<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['index'])) {
    // Load existing data from books.json
    $file = 'books.json';
    if (file_exists($file)) {
        $jsonData = file_get_contents($file);
        $books = json_decode($jsonData, true);
        
        // Get the index to delete from the URL parameter
        $indexToDelete = $_GET['index'];
        
        // Check if the index is valid
        if (isset($books[$indexToDelete])) {
            // Remove the book from the array using its index
            unset($books[$indexToDelete]);

            // Encode the updated array into JSON format
            $jsonData = json_encode($books);

            // Write the JSON data back to the file
            file_put_contents($file, $jsonData);

            // Redirect back to the index page
            header("Location: index.php");
            exit();
        }
    }
}
// If the script is accessed directly or index is not found, redirect back to the index page
header("Location: index.php");
exit();
?>
