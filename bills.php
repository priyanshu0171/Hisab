<?php
error_reporting(0);
$uid = $_GET['userid'];
include './Packages/Classes/DatabaseHandler.php';
include 'Packages/Classes/Bill.php';
$billInstance = new Bill();
$bills = $billInstance->getSplitByUserId($uid);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Menu
    </title>
    <link rel="stylesheet" href="./Assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .text-success {
            color: #09a849 !important;
        }

        .text-danger {
            color: #ff2e2e !important;
        }

        .bg-danger {
            background: #ff2e2e !important;
        }

        .bg-success {
            background: #09a849 !important;
        }
    </style>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");

        * {
            font-family: "Roboto", sans-serif;
        }

        body {
            background: #121212 !important;
        }

        .logo-heading {
            color: #ff9900 !important;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: bold;
            text-align: center;
            font-size: 34px;
        }

        .color-orange {
            color: #ff9900 !important;
            font-size: 12px;
        }

        .text-dim {
            color: #3a3a3a !important;
            font-weight: bold;
        }

        .version {
            color: #ff9900 !important;
            font-size: 10px;
            font-weight: bold;
            opacity: 73%;
        }

        .card {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            background-color: #545454 !important;
            color: #ff9900 !important;
            border-radius: 10px !important;
            -webkit-box-shadow: 4px 4px 4px 0 #000;
            box-shadow: 4px 4px 4px 0 #000;
        }

        .card:hover {
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .card svg {
            stroke: white !important;
            position: relative;
            top: 10px;
        }

        .username {
            color: #ff9900 !important;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 3px;
            text-transform: uppercase;
            position: relative;
            top: 25px;
        }

        .orange {
            color: #ff9900 !important;
        }

        .backbtn {
            padding: 15px;
        }

        .backbtn:hover {
            color: white !important;
            padding-left: 5px;
            -webkit-transition: padding 0.5s ease;
            transition: padding 0.5s ease;
        }

        .backbtn a {
            color: #ff9900 !important;
        }

        .backbtn a:hover {
            color: white;
            padding-left: 5px;
            -webkit-transition: padding 0.5s ease;
            transition: padding 0.5s ease;
        }

        .backbtn svg {
            stroke: 2 !important;
            height: 35px;
        }

        .user-right {
            padding: 15px;
            margin-top: 5px;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 18px;
        }

        .hw-88 {
            height: 89px;
            width: 89px;
        }

        .f-15 {
            font-size: 15px;
        }

        .heading {
            font-size: 18px;
            position: relative;
            top: 2px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .paidby {
            padding: 5px 0;
            background-color: #545454 !important;
        }

        .paidby p {
            letter-spacing: 1px;
            font-weight: bold;
        }

        input {
            border: 2px solid #545454 !important;
            border-radius: 5px !important;
            padding: 0 5px;
            text-align: center;
            font-weight: bold;
            margin: 3px 3px !important;
        }

        input:focus {
            border: none !important;
            border: 2px solid #ff9900 !important;
            -webkit-box-shadow: none;
            box-shadow: none;
            outline: none;
        }

        .btn:focus {
            outline: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
        }

        .btn-outline-primary {
            border: 2px solid #ff9900 !important;
            color: #ff9900 !important;
            font-weight: bold;
            text-transform: uppercase;
        }

        .btn-outline-primary:hover {
            background-color: #ff9900 !important;
            color: white !important;
        }

        .btn-submit {
            border: 2px solid #ff9900 !important;
            background-color: #ff9900 !important;
            color: #121212 !important;
            font-weight: bold !important;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-size: 18px !important;
            width: 142px !important;
            height: 45px !important;
            border-radius: 10px 0 0 0 !important;
            position: fixed;
            bottom: 0 !important;
            right: 0 !important;
        }

        .btn-submit:hover {
            border: 2px solid white !important;
            background: #000 !important;
            color: white !important;
        }

        /* The snackbar - position it at the bottom and in the middle of the screen */
        #snackbar {
            visibility: hidden;
            /* Hidden by default. Visible on click */
            min-width: 250px;
            /* Set a default minimum width */
            margin-left: -125px;
            /* Divide value of min-width by 2 */
            background-color: #333;
            /* Black background color */
            color: #ff9900 !important;
            /* White text color */
            text-align: center;
            /* Centered text */
            border-radius: 10px;
            /* Rounded borders */
            padding: 16px;
            /* Padding */
            position: fixed;
            /* Sit on top of the screen */
            z-index: 1;
            /* Add a z-index if needed */
            left: 50%;
            /* Center the snackbar */
            bottom: 30px;
            /* 30px from the bottom */
        }

        /* Show the snackbar when clicking on a button (class added with JavaScript) */
        #snackbar.show {
            visibility: visible;
            /* Show the snackbar */
            /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
    However, delay the fade out process for 2.5 seconds */
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        /* Animations to fade the snackbar in and out */
        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }

        .bill-cards {
            background-color: #545454 !important;
            border-radius: 10px;
            -webkit-box-shadow: 4px 4px 4px #000000;
            box-shadow: 4px 4px 4px #000000;
            padding: 20px;
        }

        .bill-cards p {
            letter-spacing: 1px !important;
            font-size: 15px !important;
            font-weight: bold;
            margin-bottom: 0;
        }

        .bill-cards small {
            font-size: 10px !important;
        }

        .bill-cards h4 {
            color: #ff9900 !important;
            font-size: 30px;
            letter-spacing: 1px;
        }

        .bill-cards .mark-btn {
            background-color: #ff2e2e;
            height: 40px;
            width: 40px;
            border: 5px solid #121212;
            border-radius: 100%;
            float: right !important;
            -webkit-box-shadow: 0px 5px 5px #00000025;
            box-shadow: 0px 5px 5px #00000025;
        }

        .bill-cards .mark-btn:hover {
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .text-success {
            color: #09a849 !important;
        }

        .text-danger {
            color: #ff2e2e !important;
        }

        .bg-danger {
            background: #ff2e2e;
        }

        .bg-success {
            background: #09a849;
            background-color: #09a849;
        }

        /*# sourceMappingURL=main.css.map */
    </style>
</head>

<body>
    <header class="container">
        <div class="row">
            <div class="col-6">
                <div class="backbtn ps-3">
                    <a href="./menu.php?userid=<?php echo $uid; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-6">
                <p class="user-right orange float-end pe-3">
                    Bills
                </p>
            </div>
        </div>
    </header>
    <div class="container mt-4">
        <?php
        // Fetching bill data with user id
        if (!$bills) {
            echo '
        <div class="text-center mt-5 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-slash"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg>
        </div>
        ';
            echo '
        <p class="text-center f-15 text-white text-capitalize" style="
            letter-spacing: 1px;
            font-weight: 500;
        ">No bills to show.</p>
        ';
        } else {


            foreach ($bills as $bill) {
                $fullbill = $billInstance->getBillById($bill['bill_id']);
                foreach ($fullbill as $billbits) {
                    $billname = $billbits['bill_name'];
                    $billdate = $billbits['date'];
                }
                echo '
            <div class="bill-container px-2">
                <div class="container bill-cards">
                   <div class="row">
                       <div class="col-6">
                           <div class="text-white">
                              <p class="orange">' . $bill['to'] . '</p>
                           </div>
                           <p class="';
                if ($bill['status'] == 'PAID') {
                    echo 'text-success';
                } else {
                    echo 'text-danger';
                }
                echo ' text-uppercase">' . $bill['status'] . '</p>
                           <p class="mt-4 text-white">Bill For: ' . $billname . '</p>
                        <p class="text-white">' . explode("-", explode(" ", $billdate)[0])[2] . '-' . explode("-", explode(" ", $billdate)[0])[1] . '-' . explode("-", explode(" ", $billdate)[0])[0] . '</p>

                       </div>
                       <div class="col-6 my-auto ms-auto">
                           <h4 class="text-end">
                            ₹' . $bill['amount'] . '
                           </h4>
                       </div>
                       <form method="post" action="./scripts.php">
                        <div class="w-100">
                            <input type="hidden" value="' . $bill['id'] . '" name="splitid">
                            <input type="hidden" value="' . $uid . '" name="uid">
                            <button class="mark-btn';
                if ($bill['status'] == 'PAID') {
                    echo ' bg-success';
                } else {
                    echo ' bg-danger';
                }
                echo '" type="submit" name="changeStatus"></button>
                        </div>
                       </form>
                       
                   </div>
                </div>
            </div>
            ';
            }
        }
        ?>
    </div>
    <br><br>
</body>

</html>