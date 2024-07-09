<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Load existing data from books.json
    $file = 'books.json';
    if (file_exists($file)) {
        $jsonData = file_get_contents($file);
        $books = json_decode($jsonData, true);
    } else {
        // If books.json doesn't exist, there are no books to delete
        header("Location: index.php");
        exit();
    }

    // Get the index of the book to delete from the form submission
    $indexToDelete = $_POST['index'];

    // Check if the index is valid
    if (isset($books[$indexToDelete])) {
        // Confirmation popup
        echo "<script>
                var confirmation = confirm('Are you sure you want to delete this book?');
                if (confirmation) {
                    // Redirect to PHP script to handle deletion
                    window.location.href = 'delete_confirmation.php?index=" . $indexToDelete . "';
                } else {
                    // Redirect back to the index page without deleting
                    window.location.href = 'index.php';
                }
            </script>";
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
