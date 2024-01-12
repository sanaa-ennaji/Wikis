<?php
require_once '../services/ServiceWiki.php';
require_once '../services/UserService.php';
require_once '../services/ServiceCategory.php';

class WikiController {
    private $wikiService;
    private $userService;
    private $categoryService;

    public function __construct() {
        $this->wikiService = new ServiceWiki();
        $this->userService = new UserService();
        $this->categoryService = new ServiceCategory(); 
    }



    public function createWiki() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];
            $image_url = $_POST['image_url'];
            $id_auteur = $_POST['id_auteur'];
            $id_categorie = $_POST['id_categorie'];

            if (empty($titre) || empty($contenu) || empty($image_url) || empty($id_auteur) || empty($id_categorie)) {
                echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
                return;
            }

         
            $wiki = $this->wikiService->createWiki($titre, $contenu, $image_url, $id_auteur, $id_categorie);

            if ($wiki) {
                echo json_encode(['status' => 'success', 'message' => 'Wiki created successfully', 'data' => $wiki]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Wiki creation failed']);
            }
        }
    }

   public function getWikiById() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];

        $wiki = $this->wikiService->getWikiById($id);

        if ($wiki) {
            // Fetch the author using the getUserById method
            $author = $this->userService->getUserById($wiki['id_auteur']);
            
            // Fetch the category using the getCategoryById method (assuming you have a similar method in your CategoryService)
            $category = $this->categoryService->getCategoryById($wiki['id_categorie']);

            // Add author and category information to the wiki data
            $wiki['auteur'] = ($author) ? $author->getNom() : 'Unknown Author';

            $wiki['categorie'] = ($category) ? $category['nom_categorie'] : 'Unknown Category';

            echo json_encode(['status' => 'success', 'data' => $wiki]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Wiki not found']);
        }
    }
}



    public function updateWiki() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];
            $image_url = $_POST['image_url'];
            $id_auteur = $_POST['id_auteur'];
            $id_categorie = $_POST['id_categorie'];
    
            if (empty($id) || empty($titre) || empty($contenu) || empty($image_url) || empty($id_auteur) || empty($id_categorie)) {
                echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
                return;
            }
    
            $wiki = $this->wikiService->updateWiki($id, $titre, $contenu, $image_url, $id_auteur, $id_categorie);
    
            if ($wiki) {
                echo json_encode(['status' => 'success', 'message' => 'Wiki updated successfully', 'data' => $wiki]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Wiki update failed']);
            }
        }
    }
    
    public function deleteWiki() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $id = $_POST['id'];
    
            if (empty($id)) {
                echo json_encode(['status' => 'error', 'message' => 'ID is required']);
                return;
            }
    
           
            $result = $this->wikiService->deleteWiki($id);
    
            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Wiki deleted successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Wiki deletion failed']);
            }
        }
    }
    

    public function getAllWikis() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
          
            $wikis = $this->wikiService->getAllWikis();

            echo json_encode(['status' => 'success', 'data' => $wikis]);
        }
    }
}

$wikiController = new WikiController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'createWiki') {
            $wikiController->createWiki();
        } elseif ($_POST['action'] === 'updateWiki') {
            $wikiController->updateWiki();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Action not specified']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['getWikiById'])) {
        $wikiController->getWikiById();
    } elseif (isset($_GET['getAllWikis'])) {
        $wikiController->getAllWikis();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>

