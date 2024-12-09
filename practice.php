<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello From my first code</h1>
    <?php 
    // echo "Hello World";
    
    // $name = "Sagar Ahmed";
    // echo "<h1>My name is <span style='color:red;'>$name </span></h1>";
    // echo phpversion();
    // echo "<script>console.log('This is a message in the browser console');</script>";

    // //indexed array
    // $arr= array("Sagar", "Ahmed", "Rahim", "Karim");
    // $arr2=[1,2,3,4,5,6,7,8,9];
    // // Associative array
    // $assocArray = array("name" => "Sagar", "age" => 25);
    // echo var_dump($arr2);
    
    // echo var_dump($arr);
    // echo '<br><br>';
    // echo var_dump($arr2);
    // echo '<br><br>';
    // echo var_dump($assocArray);
    // echo '<br><br>';
  

    // for($i=0; $i<count($arr); $i++){
    //     echo "<h1> Name : <span style='color:red;'>$arr[$i] </span></h1>";
    // }
    
   
//Accessing global variable inside function

//     $x = 5; // global scope
//     $z=11;

// function myTest() {
//     global $x; // Declare $x as global to access it
//     global $z;
//     echo $z;
//     $y = 10; // Local variable
//     echo "<p>Variable x inside function is: $x</p>"; // Access global $x
//     echo "<p>Variable y inside function is: $y</p>"; // Access local $y
// }

// myTest();

// echo "<p>Variable x outside function is: $x</p>";



//object data type

// class Car {
//     public $brand;
//     public $color;

//     function __construct($brand, $color) {
//         $this->brand = $brand;
//         $this->color = $color;
//     }
// }

// $myCar = new Car("Toyota", "Red");
// echo $myCar->brand;
// echo "<br>";
// echo $myCar->color;

//icrement and decrement
// $x = 5;

// // Pre-Increment
// echo "Pre-Increment: " . ++$x . "\n"; // Output: 6
// echo "Value after Pre-Increment: " . $x . "\n"; // Output: 6

// // Post-Increment
// echo "Post-Increment: " . $x++ . "\n"; // Output: 6
// echo "Value after Post-Increment: " . $x . "\n"; // Output: 7

// // Pre-Decrement
// echo "Pre-Decrement: " . --$x . "\n"; // Output: 6
// echo "Value after Pre-Decrement: " . $x . "\n"; // Output: 6

// // Post-Decrement
// echo "Post-Decrement: " . $x-- . "\n"; // Output: 6
// echo "Value after Post-Decrement: " . $x . "\n"; // Output: 5

// echo "Hello, World!\n"; // Works on CLI
// echo "Hello, World!<br>"; // Works in a browser
// echo "Hello, World!" . PHP_EOL; // Works for platform-independent CLI scripts

// $x = 10;
// if ($x > 15) {
//     echo "x is greater than 15";
// } elseif ($x > 5) {
//     echo "x is between 6 and 15";
// } else {
//     echo "x is 5 or less";
// }

// $color = "red";

// switch ($color) {
//     case "blue":
//         echo "The color is blue.";
//         break;
//     case "red":
//         echo "The color is red.";
//         break;
//     default:
//         echo "The color is neither blue nor red.";
// }
// for ($i = 1; $i <= 5; $i++) {
//     echo "Number: $i<br>";
// }
// $fruits = ["apple", "banana", "cherry"];
// foreach ($fruits as $fruit) {
//     echo "Fruit: $fruit<br>";
// }
// $i = 1;
// while ($i <= 5) {
//     echo "Number: $i<br>";
//     $i++;
// }
// $i = 1;
// do {
//     echo "Number: $i<br>";
//     $i++;
// } while ($i <= 5);

// $numbers = [1, 2, 3, 4, 5];

// foreach ($numbers as $num) {
//     if ($num == 3) {
//         continue; // Skip 3
//     }
//     echo "Number: $num<br>";
//     if ($num == 4) {
//         break; // Exit the loop after 4
//     }
// }

// $fruits = ["apple", "cherry"];
// echo in_array("banana", $fruits); // Outputs: 1


// if (in_array("banana", $fruits)) {
//     echo "Banana is in the array.";
// }

// return the first values key
// $fruits = ["a" => "apple"];
// $key = array_search("banana", $fruits); // "b"
//  echo $key;

// $fruits = ["apple", "banana", "apple"];
// $counts = array_count_values($fruits); // Returns ["apple" => 2, "banana" => 1]
//  var_dump($counts)

// $numbers = [1, 2, 3, 4, 5];
// $even = array_filter($numbers, fn($x) => $x % 2 === 0); // Returns [2, 4]
// var_dump($even);

// $numbers = [1, 2, "3", 4, 5];
// $product = array_product($numbers); // Returns 6
// echo $product;


// class Calculator {
//     public static function add($a, $b) {
//         return $a + $b;
//     }
// }

// echo Calculator::add(5, 10); // Output: 15




    ?>
</body>
</html>