require_once '../dao/ProductDao.php';

class ProductService {
    private $productDao;

    public function __construct() {
        $this->productDao = new ProductDao();
    }

    public function getAllProducts() {
        return $this->productDao->getAllProducts();
    }

    public function getProductById($product_id) {
        return $this->productDao->getProductById($product_id);
    }

    public function createProduct($name, $description, $price, $stock, $category) {
        return $this->productDao->createProduct($name, $description, $price, $stock, $category);
    }
}
