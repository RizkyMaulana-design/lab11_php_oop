<?php
class Database {
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct() {
        $this->getConfig();
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Koneksi Gagal: " . $this->conn->connect_error);
        }
    }

    private function getConfig() {
        global $config;
        $this->host = $config['db_host'];
        $this->user = $config['db_user'];
        $this->password = $config['db_pass'];
        $this->db_name = $config['db_name'];
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function get($table, $where = null) {
        $sql = "SELECT * FROM " . $table;
        if ($where) $sql .= " WHERE " . $where;
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function insert($table, $data) {
        $columns = implode(",", array_keys($data));
        $values  = implode("','", array_values($data));
        $sql = "INSERT INTO $table ($columns) VALUES ('$values')";
        return $this->conn->query($sql);
    }

    public function update($table, $data, $where) {
        $sets = [];
        foreach ($data as $key => $val) {
            $sets[] = "$key = '$val'";
        }
        $sql = "UPDATE $table SET " . implode(",", $sets) . " WHERE $where";
        return $this->conn->query($sql);
    }
    
    public function delete($table, $where) {
        $sql = "DELETE FROM $table WHERE $where";
        return $this->conn->query($sql);
    }
}
?>