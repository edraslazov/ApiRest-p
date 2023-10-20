<?php

class User {

    public function index() {
        
        require_once "config/configDatabase.php";
        require_once "database/PostgresConnection.php";

        try {
            // $conn PostgresConnection::connect($host, $port, $dbname, $user, $pass);
            PostgresConnection::connect($host, $port, $dbname, $user, $pass);
            $users = PostgresConnection::selectAll("SELECT * FROM users");
            // $users = $conn->query("SELECT * FROM users");
            return $users;
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
        finally {
            
            PostgresConnection::close();
        }
        
    }

    public function show($userId) {
        
        require_once "config/configDatabase.php";
        require_once "database/PostgresConnection.php";

        try {
            PostgresConnection::connect($host, $port, $dbname, $user, $pass);
            $users = PostgresConnection::selectById("SELECT * FROM users WHERE id = $userId");
            return $users;
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
        finally {
            
            PostgresConnection::close();
        }
        
    }

    public function put($userId, $data) {
        
        require_once "config/configDatabase.php";
        require_once "database/PostgresConnection.php";

        try {
            PostgresConnection::connect($host, $port, $dbname, $user, $pass);
            $users = PostgresConnection::put("UPDATE users SET username=:username, password=:password WHERE id = $userId", $data);
            
            header("Location: " . BASE_DIR . "user/$userId/edit");
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
        finally {
            
            PostgresConnection::close();
        }
        
    }

    public function delete($userId) {
        
        require_once "config/configDatabase.php";
        require_once "database/PostgresConnection.php";

        try {
            PostgresConnection::connect($host, $port, $dbname, $user, $pass);
            $users = PostgresConnection::delete("DELETE FROM users WHERE id = $userId", $data);
            
            header("Location: " . BASE_DIR . "user");
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
        finally {
            
            PostgresConnection::close();
        }
        
    }

    public function store($data) {

        require_once "config/configDatabase.php";
        require_once "database/PostgresConnection.php";

        try {

            PostgresConnection::connect($host, $port, $dbname, $user, $pass);
            $sql = "INSERT INTO users(username, password) VALUES(:username, :password)";
            PostgresConnection::insert($sql, $data);

            header("Location: " . BASE_DIR . "user/index/");
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
        finally {
            
            PostgresConnection::close();
        }
    }
}