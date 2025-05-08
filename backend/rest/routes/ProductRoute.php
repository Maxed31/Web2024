require_once '../services/ProductService.php';
header('Content-Type: application/json');

$productService = new ProductService();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $result = $productService->getProductById($_GET['id']);
    echo json_encode($result);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['all'])) {
    $result = $productService->getAllProducts();
    echo json_encode($result);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $result = $productService->createProduct($data['name'], $data['description'], $data['price'], $data['stock'], $data['category']);
    echo json_encode(['success' => $result]);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}
