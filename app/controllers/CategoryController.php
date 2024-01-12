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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nom_categorie = $_POST['nom_categorie'];
    
            if (!empty($id) && !empty($nom_categorie)) {
                $category = $this->categoryService->updateCategory($id, $nom_categorie);
                if ($category) {
                    echo json_encode(['status' => 'success', 'message' => 'Category updated successfully', 'data' => $category]);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to update category']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Category ID and name cannot be empty']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
        }
    }
    
    public function deleteCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
    
            if (!empty($id)) {
                $success = $this->categoryService->deleteCategory($id);
                if ($success) {
                    echo json_encode(['status' => 'success', 'message' => 'Category deleted successfully']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to delete category']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Category ID cannot be empty']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
        }
    }
    



 public function getAllCategories() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $categories = $this->categoryService->getAllCategories();
            echo json_encode(['data' => $categories]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
        }
    }
}

$categoryController = new CategoryController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Action not specified']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['getAllCategories'])) {
        $categoryController->getAllCategories();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>