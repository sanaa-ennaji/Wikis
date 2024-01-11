<?php
require_once '../services/UserService.php';

class UserController {
    private $userService;
  

    public function __construct() {
        $this->userService = new UserService();
    }

    public function registerUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate input (you can add more validation as needed)
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            if (empty($nom) || empty($email) || empty($pass)) {
                echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
                return;
            }

            // Hash the password
            $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

            // Call the user service to register the user
            $success = $this->userService->registerUser($nom, $email, $hashedPassword);

            if ($success) {
                echo json_encode(['status' => 'success', 'message' => 'User registered successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Registration failed']);
            }
        }
    }

    public function loginUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate input (you can add more validation as needed)
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            if (empty($email) || empty($pass)) {
                echo json_encode(['status' => 'error', 'message' => 'Email and password are required']);
                return;
            }

            // Call the user service to authenticate the user
            $user = $this->userService->loginUser($email, $pass);

            if ($user) {
                // Start a session and store user information
                session_start();
                $_SESSION['user'] = $user;

                echo json_encode(['status' => 'success', 'message' => 'Login successful']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid email or password']);
            }
        }
    }

}


$userController = new UserController();

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'register':
            $userController->registerUser();
            break;
        case 'login':
            $userController->loginUser();
            break;
        default:
            echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Action not specified']);
}

?>
