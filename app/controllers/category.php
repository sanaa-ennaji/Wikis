<?php
require_once '../services/ServiceCategory.php';

class CategoryController {
    private $categoryService;

    public function __construct() {
        $this->categoryService = new ServiceCategory();
    }

    public function createCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom_categorie = $_POST['nom_categorie'];

            if (!empty($nom_categorie)) {
                $category = $this->categoryService->createCategory($nom_categorie);
                echo json_encode(['status' => 'success', 'message' => 'Category created successfully', 'data' => $category]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Category name cannot be empty']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
        }
    }

    public function updateCategory() {
        // Similar logic as createCategory for handling updates
    }

    public function deleteCategory() {
        // Similar logic as createCategory for handling deletions
    }

    public function getAllCategories() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $categories = $this->categoryService->getAllCategories();
            echo json_encode(['status' => 'success', 'data' => $categories]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
        }
    }
}

// Create an instance of the CategoryController
$categoryController = new CategoryController();

// Determine the action based on the parameters
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'createCategory':
            $categoryController->createCategory();
            break;
        case 'updateCategory':
            $categoryController->updateCategory();
            break;
        case 'deleteCategory':
            $categoryController->deleteCategory();
            break;
        default:
            echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    }
} elseif (isset($_GET['getAllCategories'])) {
    $categoryController->getAllCategories();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Action not specified']);
}
?>
