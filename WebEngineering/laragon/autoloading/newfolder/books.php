<?php 

namespace autoloading\newfolder; // Corrected namespace declaration

class books{
    public static $x = 0; // Declaring $x as a static property
    public function __construct($x){
        self::$x = $x; // Accessing static property using self::
    }
    function say_hello(){
        echo "<h1>hello</h1>". self::$x ."<p>PHP</p>"; // Accessing static property using self::
    }
}
?>
