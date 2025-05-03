require_once '../services/OrderItemService.php';
header('Content-Type: application/json');

$orderItemService = new OrderItemService();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['order_id'])) {
    $result = $orderItemService->getItemsByOrderId($_GET['order_id']);
    echo json_encode($result);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $result = $orderItemService->addItemToOrder($data['order_id'], $data['product_id'], $data['quantity'], $data['price']);
    echo json_encode(['success' => $result]);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}
