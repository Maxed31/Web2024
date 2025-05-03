require_once '../services/OrderService.php';
header('Content-Type: application/json');

$orderService = new OrderService();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['user_id'])) {
    $result = $orderService->getOrdersByUserId($_GET['user_id']);
    echo json_encode($result);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $orderId = $orderService->createOrder($data['user_id'], $data['total_price']);
    echo json_encode(['order_id' => $orderId]);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}
