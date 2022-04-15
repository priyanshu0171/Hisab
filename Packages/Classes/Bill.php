<?php
class Bill extends DatabaseHandler {

    // Function to fetch last row of the database
    private function getLastBillId() {
        $sql = "SELECT * FROM `bill` ORDER BY `bill_id` DESC LIMIT 1";
        $result = $this -> connect() -> query($sql);
        $number_of_rows = $result->num_rows;
        if ($number_of_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
                $bill_id = $row['bill_id'];
            }
        }
        return $bill_id;
    }

    // Function to add Divided amount in database
    private function addDividedAmount($divided_amount, $bill_id) {
        $sql = "UPDATE `bill` SET `jay`='$divided_amount',`yash`='$divided_amount',`kalyan`='$divided_amount',`priyanshu`='$divided_amount' WHERE `bill_id` = '$bill_id'";
        $result = $this -> connect() -> query($sql);
        if ($result) 
            return true;            
        else
            return false;
    }

    // Function to create new bill in the database 
    public function createNewBill($bill_name, $paid_by, $amount){
        if (empty($bill_name) || empty($paid_by) || empty($amount)) {
            return;
        }
        $sql = "INSERT INTO `bill`(`bill_id`, `bill_name`, `paid_by`, `amount`) VALUES (NULL,'$bill_name','$paid_by','$amount')";
        $result = $this -> connect() -> query($sql);
        if ($result) {
            $bill_id = $this -> getLastBillId();
            $divided_amount = $amount/4;
            $status = $this -> addDividedAmount($divided_amount, $bill_id);
            if ($status)
                return $bill_id;
            else
                return false;
        }
    }

    // Function to get bill's details by using bill_id
    public function getBillById($bill_id) {
        $sql = "SELECT * FROM `bill` WHERE `bill_id` = '$bill_id'";
        $result = $this -> connect() -> query($sql);
        $number_of_rows = $result->num_rows;
        if ($number_of_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function splitBill($from, $to, $amount, $bill_id, $user_id) {
        $sql = "INSERT INTO `splits`(`id`, `from`, `to`, `amount`, `bill_id`, `user_id`, `status`) VALUES (NULL,'$from','$to','$amount','$bill_id', '$user_id', 'UNPAID')";
        $result = $this -> connect() -> query($sql);
        if ($result) {
            return true;
        }
    }
    public function getSplitByUserId($uid) {
        $sql = "SELECT * FROM `splits` WHERE `user_id` = '$uid' ORDER BY `id` DESC";
        $result = $this -> connect() -> query($sql);
        $number_of_rows = $result->num_rows;
        if ($number_of_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function changeStatus($splitid) {
        $sql = "SELECT `status` FROM `splits` WHERE `id` = '$splitid'";
        $result = $this -> connect() -> query($sql);
        $number_of_rows = $result->num_rows;
        if ($number_of_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
                if ($row['status']=='UNPAID') {
                    $sql = "UPDATE `splits` SET `status` = 'PAID' WHERE `id` = '$splitid'";
                    $result = $this -> connect() -> query($sql);
                    if ($result) {
                        return true;
                    }
                } else {
                    $sql = "UPDATE `splits` SET `status` = 'UNPAID' WHERE `id` = '$splitid'";
                    $result = $this -> connect() -> query($sql);
                    if ($result) {
                        return true;
                    }
                }
            }
           
        }
    }
}