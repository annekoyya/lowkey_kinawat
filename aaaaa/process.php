<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// Function to read data from JSON file
function readData() {
    $jsonFile = 'data.json';
    if (file_exists($jsonFile)) {
        $jsonContent = file_get_contents($jsonFile);
        return json_decode($jsonContent, true) ?: [];
    }
    return [];
}

// Function to write data to JSON file
function writeData($data) {
    $jsonFile = 'data.json';
    $jsonContent = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($jsonFile, $jsonContent);
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if ($input) {
        $data = readData();
        
        // Check if this is a login request
        if (isset($input['email']) && isset($input['password']) && !isset($input['name'])) {
            // Login logic
            $userFound = false;
            foreach ($data as $user) {
                if ($user['email'] === $input['email'] && $user['password'] === $input['password']) {
                    $userFound = true;
                    break;
                }
            }
            
            if ($userFound) {
                echo json_encode(['status' => 'success', 'message' => 'Login successful']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid email or password']);
            }
        } else {
            // Registration logic
            // Check if email already exists
            foreach ($data as $user) {
                if ($user['email'] === $input['email']) {
                    echo json_encode(['status' => 'error', 'message' => 'Email already registered']);
                    exit;
                }
            }
            
            // Add new user
            $data[] = $input;
            writeData($data);
            echo json_encode(['status' => 'success', 'message' => 'Registration successful']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input data']);
    }
}

// Handle GET request to retrieve data
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $data = readData();
    echo json_encode($data);
}
?>
