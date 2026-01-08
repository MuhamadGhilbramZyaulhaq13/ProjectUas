<?php
class User extends Database {

    public function getByUsername($username) {
        $stmt = $this->conn->prepare(
            "SELECT * FROM users WHERE username = ?"
        );
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
