<?php
// Initialize usersData with an empty array


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from POST request
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Check if both fields are filled
    if (empty($name) || empty($email)) {
        echo "Name and Email are required";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Invalid email format";
    } else {

        
        $jsonData = file_get_contents("users.json");
        $usersData = json_decode($jsonData, true);

        if ($usersData === null) {
            // If the file is empty or invalid, initialize an empty array
            $usersData = [];
        }

        if(in_array($email, array_column($usersData, 'email'))){
            
            echo "<div style='
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            text-align: center;'>
            <h1 style='color: red;'>Email already exists!</h1>
            </div> ";
        }else{
            // Add new user data to the array
            array_push($usersData, ['name' => $name, 'email' => $email]);

            // Write the updated data back to the JSON file
            file_put_contents("users.json", json_encode($usersData, JSON_PRETTY_PRINT));
            echo "<div style='
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            text-align: center;'>
            <h1 style='color: green;'>New User Registration successful!</h1>
            </div> ";
        }   

    }

}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Collect data from GET request
    $email = isset($_GET['email2']) ? $_GET['email2'] : '';

    if (empty($email)) {
        echo "Email is required!";
        exit;
    }

    // Read data from the JSON file
    $jsonData = file_get_contents("users.json");
    $usersData = json_decode($jsonData, true);

    if ($usersData === null) {
        // If the file is empty or invalid, initialize an empty array
        $usersData = [];
    }

    // Filter usersData to find the user by email
    $desireUserData = array_filter($usersData, function ($user) use ($email) {
        return $user['email'] == $email;
    });

    // Check if user was found
    if (empty($desireUserData)) {
        echo "User not found!";
    } else {
        // Get the first matching user
        $user = array_values($desireUserData)[0];
        $name = $user['name'];
        $email = $user['email'];

        // Display the user's data
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
    }
}

?>
