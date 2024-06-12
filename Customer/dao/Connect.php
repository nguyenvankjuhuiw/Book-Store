<?php

class Connect {
    private $server = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'BookStore';

    public function cnt()
    {
        $connect = mysqli_connect($this->server, $this->username, $this->password, $this->database);
        mysqli_set_charset($connect, 'utf8');
        $loi = mysqli_error($connect);
        if($loi){
            die("Ket noi that bai");
            exit();
        }
        return $connect;
    }

    public function select($sql)
    {
        $connect = $this->cnt();
        $result = mysqli_query($connect, $sql);
        mysqli_close($connect);
        return $result;
    }

    public function execute($sql): bool 
    {
        $connect = $this->cnt();
        mysqli_query($connect, $sql);
        $error = mysqli_error($connect);
        mysqli_close($connect);
        
        if($error){
            return false;
        }
        return true;
    }
}

?>