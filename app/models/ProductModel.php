<?php

class ProductModel extends Model
{
    protected $table = 'products';
    private $pdo;

    public function __construct()
    {
        $host    = getenv('DB_HOST');
        $port    = getenv('DB_PORT');
        $dbname  = getenv('DB_NAME') ?: getenv('DB_DATABASE');
        $user    = getenv('DB_USER') ?: getenv('DB_USERNAME');
        $pass    = getenv('DB_PASSWORD');
        $charset = getenv('DB_CHARSET') ?: 'utf8mb4';

        $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset={$charset}";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_SSL_CA       => __DIR__ . '/../config/ca.pem',
            PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
        ];

        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }

    public function all()
    {
        $stmt = $this->pdo->query("SELECT * FROM {$this->table} ORDER BY id ASC");
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO {$this->table} (product_name, description, price, quantity) VALUES (?, ?, ?, ?)"
        );
        return $stmt->execute([
            $data['product_name'],
            $data['description'],
            $data['price'],
            $data['quantity'],
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE {$this->table} SET product_name = ?, description = ?, price = ?, quantity = ? WHERE id = ?"
        );
        return $stmt->execute([
            $data['product_name'],
            $data['description'],
            $data['price'],
            $data['quantity'],
            $id,
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}