<?php
/**
 * Created by PhpStorm.
 * User: Nikola Stašić
 * Date: 7/22/2017
 * Time: 2:57 PM
 */

require('class/Msisdn.php');


$number = $_POST['msisdn_no'];
$validate = new Msisdn($number);
$result = json_decode($validate->validation());

$subNumber = substr($number, 6);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>msisdnTask</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">

            <div class="inner cover">

                <div class="alert alert-<?php

                switch ($result->checker) {
                    case 1:
                        echo "danger";
                        break;
                    case 2:
                        echo "success";
                        break;
                    case 3:
                        echo "warning";
                        break;
                }

                ?>" role="alert"><?= $result->validation ?></div>

                <h1 class="cover-heading">Number info: </h1>
                <br>

                <table class="table">
                    <thead>
                    <tr>
                        <th>MNO identifier</th>
                        <th>Country dialling code</th>
                        <th>Subscriber number</th>
                        <th>Country identifier</th>
                    </tr>
                    </thead>
                    <tbody>


                    <tr><? if (count($result->msisdn_info) > 0) { ?>
                            <td> <?= "0" . $result->msisdn_info->mn_id; ?></td>
                            <td> <?= "+" . $result->msisdn_info->country_id; ?></td>
                            <td><?= $subNumber ?></td>
                            <td><?= $result->msisdn_info->country_name; ?></td>
                        <? } else {?>
                            <td></td>
                        <?php }?>
                    </tr>
                    </tbody>
                </table>


            </div>

            <div class="mastfoot">
                <div class="inner">
                    <p>PhP Task for <a href="http://www.inspironsolutions.com/">InspSol</a>, by <a
                            href="https://www.linkedin.com/in/nikola-sta%C5%A1i%C4%87-b60290147/">Stašić Nikola</a>.
                    </p>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
