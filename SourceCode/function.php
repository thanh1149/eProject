<?php
    session_start();
    // connect to MySQL server
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    function init_connection(){
        global $conn;
        $servername ="localhost";
        $username = "root";
        $password = "";
        $dbname = "project-demo";
        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }
    
    function  postInput($string)
    {
        return isset($_POST[$string]) ? $_POST[$string] : '';
    }
    class Database
    {
        /**
         * Khai báo biến kết nối
         * @var [type]
         */
        public $link;

        public function __construct()
        {
            $this->link = mysqli_connect("localhost","root","","project-demo") or die ();
            mysqli_set_charset($this->link,"utf8");
        }

        public function fetchAll($table)
        {
            $sql = "SELECT * FROM {$table} WHERE 1" ;
            $result = mysqli_query($this->link,$sql) or die("Lỗi Truy Vấn fetchAll " .mysqli_error($this->link));
            $data = [];
            if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            return $data;
        }

        public function fetchOne($table , $query)
        {
            $sql  = "SELECT * FROM {$table} WHERE ";
            $sql .= $query;
            $sql .= "LIMIT 1";
            $result = mysqli_query($this->link,$sql) or die("Lỗi  truy vấn fetchOne " .mysqli_error($this->link));
            return mysqli_fetch_assoc($result);
        }

        public function insert($table, array $data)
        {
            //code
            $sql = "INSERT INTO {$table} ";
            $columns = implode(',', array_keys($data));
            $values  = "";
            $sql .= '(' . $columns . ')';
            foreach($data as $field => $value) {
                if(is_string($value)) {
                    $values .= "'". mysqli_real_escape_string($this->link,$value) ."',";
                } else {
                    $values .= mysqli_real_escape_string($this->link,$value) . ',';
                }
            }
            $values = substr($values, 0, -1);
            $sql .= " VALUES (" . $values . ')';
            // _debug($sql);die;
            mysqli_query($this->link, $sql) or die("Lỗi  query  insert ----" .mysqli_error($this->link));
            return mysqli_insert_id($this->link);
        }
    }
    $db = new Database;
    $user = $db->fetchAll("user");
    
