require_once '../dao/ReviewDao.php';

class ReviewService {
    private $reviewDao;

    public function __construct() {
        $this->reviewDao = new ReviewDao();
    }

    public function addReview($user_id, $product_id, $rating, $comment) {
        return $this->reviewDao->addReview($user_id, $product_id, $rating, $comment);
    }

    public function getReviewsByProductId($product_id) {
        return $this->reviewDao->getReviewsByProductId($product_id);
    }
}
