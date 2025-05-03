require_once '../services/ReviewService.php';
header('Content-Type: application/json');

$reviewService = new ReviewService();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['product_id'])) {
    $result = $reviewService->getReviewsByProductId($_GET['product_id']);
    echo json_encode($result);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $result = $reviewService->addReview($data['user_id'], $data['product_id'], $data['rating'], $data['comment']);
    echo json_encode(['success' => $result]);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}
