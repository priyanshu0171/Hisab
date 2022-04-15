<?php
// error_reporting(0);
include './Packages/Classes/DatabaseHandler.php';
include './Packages/Classes/Users.php';
include './Packages/Classes/Bill.php';
include './Packages/Classes/Chat.php';
$bill = new Bill();
$chat = new Chat();
if (isset($_POST['createbill'])) {
    $bill_name = $_POST['bill_name'];
    $paid_by = $_POST['name'];
    $amount = $_POST['total'];
    $uid = $_POST['uid'];

    $res = $bill->createNewBill($bill_name, $paid_by, $amount);
    if ($res) {
        // echo "Bill Created Successfully";
        header("Location: ./createbill.php?userid=$uid&billid=$res");
    }
} else if (isset($_POST['splitbill'])) {
    $kalyan = $_POST['kalyan'];
    $jay = $_POST['jay'];
    $yash = $_POST['yash'];
    $priyanshu = $_POST['priyanshu'];
    $bill_id = $_POST['billid'];
    $uid = $_POST['uid'];
    $arr = array(
        'kalyan',
        'jay',
        'yash',
        'priyanshu'
    );
    $amountsArr = array(
        "kalyan" => $kalyan,
        "jay" => $jay,
        "yash" => $yash,
        "priyanshu" => $priyanshu
    );
    $userid = array(
        "kalyan" => 2,
        "jay" => 1,
        "yash" => 3,
        "priyanshu" => 4
    );

    if (empty($priyanshu)) {
        $to = "Priyanshu";
        $amount = $kalyan;
        for ($i = 0; $i <= 3; $i++) {
            if ($arr[$i] == 'priyanshu') {
                continue;
            } else {
                $bill->splitBill(ucfirst($arr[$i]), $to, $amountsArr[$arr[$i]], $bill_id, $userid[$arr[$i]]);
            }
        }
    } else if (empty($kalyan)) {
        $to = "Kalyan";
        $amount = $priyanshu;
        for ($i = 0; $i <= 3; $i++) {
            if ($arr[$i] == 'kalyan') {
                continue;
            } else {
                $bill->splitBill(ucfirst($arr[$i]), $to, $amountsArr[$arr[$i]], $bill_id, $userid[$arr[$i]]);
            }
        }
    } else if (empty($yash)) {
        $to = "Yash";
        $amount = $kalyan;
        for ($i = 0; $i <= 3; $i++) {
            if ($arr[$i] == 'yash') {
                continue;
            } else {
                $bill->splitBill(ucfirst($arr[$i]), $to, $amountsArr[$arr[$i]], $bill_id, $userid[$arr[$i]]);
            }
        }
    } else if (empty($jay)) {
        $to = "Jay";
        $amount = $kalyan;
        for ($i = 0; $i <= 3; $i++) {
            if ($arr[$i] == 'jay') {
                continue;
            } else {
                $bill->splitBill(ucfirst($arr[$i]), $to, $amountsArr[$arr[$i]], $bill_id, $userid[$arr[$i]]);
            }
        }
    }
    header("Location: ./menu.php?userid=$uid&msg=New Split Created Succesfully");
} else if (isset($_POST['changeStatus'])) {
    $splitid = $_POST['splitid'];
    $uid = $_POST['uid'];
    if ($bill->changeStatus($splitid)) {
        header("Location: ./bills.php?userid=$uid");
    }
} else if (isset($_POST['sendMessage'])) {
    $msg = $_POST['message'];
    $uname = $_POST['username'];
    $uid = $_POST['uid'];
    if ($chat->sendMessage($msg, $uname, $uid)) {
        header("Location: ./conversation.php?userid=$uid");
    }
} else {
    echo '
    <html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Menu
    </title>
    <link rel="stylesheet" href="./Assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
    <p class="text-center text-danger mt-5 text-uppercase">400 Error - Bad Request</p>
    <p class="text-center text-white">Please Return to the home page</p>
    <div class="text-center">
        <a href="./" class="text-decoration-none fw-bold text-uppercase btn btn-light">Home</a>
    </div>
    </body>
    </html>
    ';
}
