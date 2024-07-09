<?php 
    namespace new_folder\test;
    class Book {
        public $isbn;
        public $title;
        public $author;
        public $available;

        public function __construct(int $isbn, string $title, string $author, int $available = 0){
            $this -> isbn = $isbn;
            $this -> title = $title;
            $this -> author = $author;
            $this -> available = $available;
        }



        public function printBook(): string {
            // print_r($this -> available);
            $result = '<i>' . $this -> title . ' - ' . '</i>' . $this -> author;
            if($this -> available <1){
                $result .= '<b> Not Avaiable </b>'; 
            }else {
                $result .= '<b> Available </b>';
            }
            return $result;
        }

        public function __tostring() {
            // print_r($this -> available);
            $result = '<i>' . $this -> title . ' - ' . '</i>' . $this -> author;
            if($this -> available <1){
                $result .= '<b> Not Avaiable </b>'; 
            }else {
                $result .= '<b> Available </b>';
            }
            return $result;
        }

        public function getCopy(): bool{
            if($this -> available > 0){
                $this -> available --;
                return true;
            }else{
                return false;
            }

        }
    }

    $book1 = new Book(1234, 'No mercy', 'Devil', 0);
    $book2 = new Book(1234, 'Mercy', 'Angel', 14);

    echo $book1->printBook();
    echo '<br />';
    if($book1 -> getCopy()){
        echo 'Here is your copy <br/>';
    }else{
        echo 'No book available <br />';
    }
    echo $book1 -> available;
    echo '<br />';
    echo '<br />';
    echo '<br />';

    echo $book2->printBook();
    echo '<br />';
    if($book2 -> getCopy()){
        echo 'Here is your copy <br/>';
    }else{
        echo 'No book available <br />';
    }

    echo $book2 -> available;
    echo '<br />';

    print_r($book2);

    $string = (string) $book2;
    var_dump($string);
    
?>
