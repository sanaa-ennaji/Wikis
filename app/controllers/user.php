<?php

class User extends Controller
{


    public function registe() {
        $this->view('author/registe');
     }
     public function login(){
         $this->view('author/login');
     }
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function register()
    {
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            $data = json_decode(file_get_contents('php://input'), true);

            $nom = $data['nom'];
            $email = $data['email'];
            $pass = $data['pass'];
            $role = $data['role'];        

            $user = $this->userService->createUser($nom, $email, $pass, $role);
            echo json_encode(['success' => true, 'user' => $user]);
            exit;
        } 
    }

    public function login()
    {
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            $data = json_decode(file_get_contents('php://input'), true);

            $email = $data['email'];
            $pass = $data['pass'];

            $user = $this->userService->login($email, $pass);

            if ($user) {
                echo json_encode(['success' => true, 'user' => $user]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid login credentials']);
            }
            exit;
        }

    }
}
?>
