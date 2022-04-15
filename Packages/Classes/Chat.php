<?php
class Chat extends DatabaseHandler {
    public function sendMessage($msg, $username, $uid) {
        $sql = "INSERT INTO `chats`(`id`, `send_by`, `msg`, `uid`) VALUES (NULL,'$username','$msg', '$uid')";
        $result = $this -> connect() -> query($sql);
        if ($result) {
            return true;
        }
    }
    public function getMessage() {
        $sql = "SELECT * FROM `chats` ORDER BY `date`";
        $result = $this -> connect() -> query($sql);
        $number_of_rows = $result->num_rows;
        if ($number_of_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}