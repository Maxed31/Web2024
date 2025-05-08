require_once '../dao/OrderItemDao.php';

class OrderItemService {
    private $orderItemDao;

    public function __construct() {
        $this->orderItemDao = new OrderItemDao();
    }

    public function addItemToOrder($order_id, $product_id, $quantity, $price) {
        return $this->orderItemDao->addItemToOrder($order_id, $product_id, $quantity, $price);
    }

    public function getItemsByOrderId($order_id) {
        return $this->orderItemDao->getItemsByOrderId($order_id);
    }
}
