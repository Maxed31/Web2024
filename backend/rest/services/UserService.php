require_once '../dao/UserDao.php';

class UserService {
    private $userDao;

    public function __construct() {
        $this->userDao = new UserDao();
    }

    public function createUser($username, $email, $password, $role) {
        return $this->userDao->createUser($username, $email, $password, $role);
    }

    public function getUserById($user_id) {
        return $this->userDao->getUserById($user_id);
    }

    public function getAllUsers() {
        return $this->userDao->getAllUsers();
    }
}
