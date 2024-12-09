<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if($_POST['updateForm']=='updateForm'){
        updateData();
    }elseif($_POST['deleteForm']=='deleteForm'){
        deleteData();
    }else{

    $name = $_POST['name'];
    $email = $_POST['email'];

    // Validate input fields
    if (empty($name) || empty($email)) {
        echo "Name and Email are required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    } else {
        // Create a connection to the MySQL database
        $conn = new mysqli('localhost', 'root', '', 'users');

        // Check the connection
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        } else {
            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
            $stmt->bind_param("ss", $name, $email); // "ss" means both name and email are strings

            // Execute the statement
            try {
                $stmt->execute();
                echo "<div style='
                display: flex; 
                flex-direction: column; 
                justify-content: center; 
                align-items: center; 
                height: 100vh; 
                text-align: center;'>
                <h1 style='color: green;'>New User Registration successful!</h1>
                </div> ";
            } catch (Exception $e) {
                echo "<div style='
                display: flex; 
                flex-direction: column; 
                justify-content: center; 
                align-items: center; 
                height: 100vh; 
                text-align: center;'>
                <h1 style='color: red;'>Email already exists!</h1>
                </div> ";
            }
           

            // Close the statement and connection
            $stmt->close();
            $conn->close();
        }
    }
}
}

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $email = isset($_GET['email2']) ? $_GET['email2'] : '';

    // Create a connection to the MySQL database
    $conn = new mysqli('localhost', 'root', '', 'users');

    // Check the connection
    if(!$conn){
        die('Connection failed: ' . $conn->connect_error);
    }else{
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email); // "s" means email is a string

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if the email exists
        if($result->num_rows > 0){
            $result = $result->fetch_assoc();
            $name = $result['name'];
            $email = $result['email'];
            echo "<div style='
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            background-color: crimson;
            height: 100vh; 
            text-align: center;'>
            <div style='background-color: #c4f1ce; padding: 20px; border-radius: 5px;'>
            <h1 style='color: red;'>Registered User</h1>
            <p style='color: green;'>$name</p>
            <p style='color: green;'>$email</p>
            </div>
        </div>";
     
        }else{
            echo "<div style='
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            text-align: center;'>
            <h1 style='color: red;'>Not registered user!</h1>
            </div> ";
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}

function updateData(){
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Create a connection to the MySQL database
    $conn = new mysqli('localhost', 'root', '', 'users');
    if(!$conn){
        die('Connection failed: ' . $conn->connect_error);
    }else{
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("UPDATE users SET name = ? WHERE email = ?");
        $stmt->bind_param("ss", $name, $email); // "ss" means both name and email are strings

        try{
            $stmt->execute();
            echo "<div style='
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            background-color: crimson;
            height: 100vh; 
            text-align: center;'>
            <div style='background-color: #c4f1ce; padding: 20px; border-radius: 5px;'>
            <h1 style='color: red;'>Updated registered User</h1>
            <p style='color: green;'>$name</p>
            <p style='color: green;'>$email</p>
            </div>
        </div>";
        }catch(Exception $e){
            echo "<div style='
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            text-align: center;'>
            <h1 style='color: red;'>Failed to update.May email already exists!</h1>
            </div> ";
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}

function deleteData(){
    $email = $_POST['email'];

    // Create a connection to the MySQL database
    $conn = new mysqli('localhost', 'root', '', 'users');
    if(!$conn){
        die('Connection failed: ' . $conn->connect_error);
    }else{
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM users WHERE email = ?");
        $stmt->bind_param("s", $email); // "s" means email is a string

        try{
            $stmt->execute();
            echo "<div style='
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            background-color: crimson;
            height: 100vh; 
            text-align: center;'>
            <div style='background-color: #c4f1ce; padding: 20px; border-radius: 5px;'>
            <h1 style='color: red;'>Deleted registered User</h1>
            <p style='color: green;'>$email</p>
            </div>
        </div>";
        }catch(Exception $e){
            echo "<div style='
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            text-align: center;'>
            <h1 style='color: red;'>Failed to delete.</h1>
            </div> ";
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}
