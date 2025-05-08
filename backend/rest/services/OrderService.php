require_once '../dao/OrderDao.php';

class OrderService {
    private $orderDao;

    public function __construct() {
        $this->orderDao = new OrderDao();
    }

    public function createOrder($user_id, $total_price) {
        return $this->orderDao->createOrder($user_id, $total_price);
    }

    public function getOrdersByUserId($user_id) {
        return $this->orderDao->getOrdersByUserId($user_id);
    }
}
