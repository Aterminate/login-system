<?php
require 'db.php'; // Include the database connection

class UserService {
    private $pdo;

    public function __construct() {
        global $pdo; // Use the global PDO variable
        $this->pdo = $pdo;
    }

    /**
     * Authenticate the user with email and password.
     *
     * @param string $email User's email
     * @param string $password User's password
     * @return array Response with status and message
     */
    public function authenticate($email, $password) {
        // Prepare and execute the SQL statement
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the user exists and if the password is correct
        if ($user && password_verify($password, $user['password'])) {
            return [
                'status' => 'ok',
                'message' => 'Hello User, you are logged in as ' . $user['email']
            ];
        }

        // Return error if authentication fails
        return [
            'status' => 'not ok',
            'message' => 'Invalid email or password'
        ];
    }
}
