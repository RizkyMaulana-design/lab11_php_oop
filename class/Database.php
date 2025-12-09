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
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    private function getConfig() {
        include("config.php");
        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->password = $config['password'];
        $this->db_name = $config['db_name'];
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function insert($table, $data) {
        foreach ($data as $key => $val) {
            $column[] = $key;
            $value[] = "'{$val}'";
        }
        $columns = implode(",", $column);
        $values = implode(",", $value);
        return $this->conn->query("INSERT INTO $table ($columns) VALUES ($values)");
    }

    public function update($table, $data, $where) {
        foreach ($data as $key => $val) {
            $update[] = "$key='$val'";
        }
        $update = implode(",", $update);
        return $this->conn->query("UPDATE $table SET $update WHERE $where");
    }
}
?>
    