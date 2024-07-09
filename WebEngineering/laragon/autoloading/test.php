<?php 
    use autoloading\domain\books;
    use autoloading\newfolder\books as mybook;

    function autoloader($classname) {
        $lastSlash = strpos($classname, '\\') + 1;
        $classname = substr($classname, $lastSlash);
        $directory = str_replace('\\', '/', $classname);
        $filename = __DIR__ . '/' . $directory . '.php';
        require_once($filename);
     }
     spl_autoload_register('autoloader');


     $book1 = new mybook(5);
     $book2 = new books(6);

     $book1 ->say_hello();
     $book2 ->say_hello();
?>