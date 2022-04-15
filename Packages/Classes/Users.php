<?php
class Users extends DatabaseHandler {
    public function getAllUsers() {
        $sql = "SELECT * FROM `users`";
        $result = $this -> connect() -> query($sql);
        $number_of_rows = $result->num_rows;
        if ($number_of_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function getUserById($uid) {
        $sql = "SELECT * FROM `users` WHERE `uid` = '$uid'";
        $result = $this -> connect() -> query($sql);
        $number_of_rows = $result->num_rows;
        if ($number_of_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}
