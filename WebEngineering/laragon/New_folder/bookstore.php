<?php 
    function loginMessage(): string {
        if($_COOKIE['username']){
            return 'You are logged in';
        }
        return 'You are not logged in';
    }

    function printableTitle(array $book): string {
        $result = '<i>' . $book['title'] . ' - ' . $book['author'] . '</i>';
        if (!$book['available']) {
        $result .= ' <b>Not available</b>';
        }
        return $result; 
    }

    function bookingBook(array &$books, string $title): bool {
        foreach ($books as $key => $book) {
            if ($book['title'] == $title) {
                if ($book['available']) {
                $books[$key]['available'] = false;
                return true;
                } else {
                    return false;
                    }
                }
            }
        return false;
    }

    function updateBooks(array $books) {
        $booksJson = json_encode($books);
        file_put_contents(__DIR__ . '/books.json', $booksJson);
       }

?>

<!-- <?php include_once 'functions.php' ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Bookstore</title>
</head>
<body>
 <p><?php echo loginMessage(); ?></p>
<?php
$booksJson = file_get_contents('books.json');
$books = json_decode($booksJson, true);
if (isset($_GET['title'])) {
 echo '<p>Looking for <b>' . $_GET['title'] . ' - ' . $_GET['author']. '</b></p>';
 if (bookingBook($books, $_GET['title'])) {
    echo 'Booked!';
    updateBooks($books);
    } else {
    echo 'The book is not available...';
    }
} else {
 echo '<p>You are not looking for a book?</p>';
}
?>
 <ul>
    <?php foreach ($books as $book): ?>
        <li>
            <a href="?title=<?php echo $book['title']; ?>&author=<?php echo $book['author'] ?>">
            <?php echo printableTitle($book); ?>
            </a>
        </li>
    <?php endforeach; ?>
 </ul>
</body>
</html>