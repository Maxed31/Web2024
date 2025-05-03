require_once '../services/UserService.php';
header('Content-Type: application/json');

$userService = new UserService();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $result = $userService->getUserById($_GET['id']);
    echo json_encode($result);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['all'])) {
    $result = $userService->getAllUsers();
    echo json_encode($result);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $result = $userService->createUser($data['username'], $data['email'], $data['password'], $data['role']);
    echo json_encode(['success' => $result]);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}
