<?php
class Product extends Database {

    public function getAll($keyword, $page) {
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $stmt = $this->conn->prepare(
            "SELECT * FROM products 
             WHERE name LIKE ? 
             LIMIT $limit OFFSET $offset"
        );
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetchAll();
    }

    public function totalPage($keyword) {
        $stmt = $this->conn->prepare(
            "SELECT COUNT(*) FROM products WHERE name LIKE ?"
        );
        $stmt->execute(["%$keyword%"]);
        return ceil($stmt->fetchColumn() / 5);
    }

    public function insert($data) {
        $stmt = $this->conn->prepare(
            "INSERT INTO products (name, price, stock, description, photo)
            VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([
            $data['name'],
            $data['price'],
            $data['stock'],
            $data['description'],
            $data['photo']
        ]);
    }


    public function find($id) {
        $stmt = $this->conn->prepare(
            "SELECT * FROM products WHERE id=?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function update($data) {
        $stmt = $this->conn->prepare(
            "UPDATE products
            SET name=?, price=?, stock=?, description=?, photo=?
            WHERE id=?"
        );
        $stmt->execute([
            $data['name'],
            $data['price'],
            $data['stock'],
            $data['description'],
            $data['photo'],
            $data['id']
        ]);
    }




    public function delete($id) {
        $stmt = $this->conn->prepare(
            "DELETE FROM products WHERE id = ?"
        );
        $stmt->execute([$id]);
    }

}
