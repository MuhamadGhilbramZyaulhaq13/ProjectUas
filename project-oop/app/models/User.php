<?php

class User extends Database {

    // Ambil user berdasarkan username (dipakai AuthController)
    public function getByUsername($username) {
        $stmt = $this->conn->prepare(
            "SELECT * FROM users WHERE username = ?"
        );
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // OPTIONAL: kalau mau tetap pakai fungsi login lama
    public function login($data) {
        $user = $this->getByUsername($data['username']);

        if ($user && password_verify($data['password'], $user['password'])) {
            return $user;
        }
        return false;
    }
}
