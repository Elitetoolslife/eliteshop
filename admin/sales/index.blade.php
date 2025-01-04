
<?php
// Include necessary files
include "header.php";
include "cr.php";

// Get the report ID from the request
$id = $_GET['id'];
$myid = mysqli_real_escape_string($dbcon, $id);

// Fetch the report details
$get = mysqli_query($dbcon, "SELECT * FROM reports WHERE id='$myid'");
$row = mysqli_fetch_assoc($get);
?>
<?php
 ob_start();
 date_default_timezone_set('GMT');

session_start();
include "../includes/config.php";


$id = $_GET['id'];
$myid = mysqli_real_escape_string($dbcon, $id);


$get = mysqli_query($dbcon, "SELECT * FROM reports WHERE id='$myid'");
$row = mysqli_fetch_assoc($get);

$date = date("Y-m-d h:i:sa");
$reseller_id = $row['reseller_id'];
$buyer = $row['user_id'];
$acctype = $row['account_type'];
$sid = $row['order_id'];
$price = $row['price'];
$d = $row['report_date'];
// Check connection
   $msg     = '
  <div class="panel panel-default">
  <div class="panel-body">
<b>Refund request has been rejected.<br>Thank you for using Jerux.</b>
 </div>
  <div class="panel-footer"><div class="label label-danger">Admin</div> - '.date("d/m/Y h:i:s a").'</div>
  </div>
  ';
  $date = date("d/m/Y h:i:s a");
  $qq = mysqli_query($dbcon, "UPDATE reports SET memo = CONCAT(memo,'$msg'),status = ('0'),seen='1',lastreply='Admin',lastup='$date',state='rejected' WHERE id='$myid'")or die("mysql error");
  header("location: viewr.php?id=$myid"); 

?>
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div id="divPage">
            <script>
                $('html, body').scrollTop($(document).height());
            </script>
            <div class="form-group col-lg-5">
                <?php
                echo '<h3>Report #' . $myid . '</h3>' . $row['memo'];
                ?>

                <form method="post">
                    <div class="input-group">
                        <textarea class="form-control custom-control" rows="3" name="rep" style="resize:none" required></textarea>
                        <span class="input-group-addon btn btn-primary" onclick="$(this).closest('form').submit();">Reply</span>
                    </div>
                    <input type="hidden" name="add" value="rep" />
                </form>
                <?php
                if (preg_match("#1#i", $row['status'])) {
                    echo '<a href="closereport.php?id=' . $myid . '" class="btn label-danger"><font color="white">Close</font></a>';
                }

                if (preg_match("#Not Yet !#i", $row['refunded'])) {
                    echo '<a href="refundr.php?id=' . $myid . '" class="btn label-success"><font color="white">refund</font></a>';
                } elseif (preg_match("#Refunded#i", $row['refunded'])) {
                    echo '<center><a href="" class="btn label-info"><font color="white">refunded</font></a></center>';
                } elseif (preg_match("#not Refunded#i", $row['refunded'])) {
                    echo '<center><a href="" class="btn label-info"><font color="white">Not refunded</font></a></center>';
                }

                if (isset($_POST['add']) and $_POST['rep']) {
                    $lvisi = mysqli_real_escape_string($dbcon, $_POST['rep']);
                    $date = date("d/m/Y h:i:s a");
                    $msg = '<div class="panel panel-default"><div class="panel-body"><div class="ticket"><b>' . htmlspecialchars($lvisi) . '</b></div></div><div class="panel-footer"><div class="label label-danger">Admin</div></div></div>';

                    $qq = mysqli_query($dbcon, "UPDATE reports SET memo = CONCAT(memo,'$msg'), status = '1', seen_status='1', last_reply='Admin', report_date='$date' WHERE id='$myid'") or die("mysql error");

                    header("Refresh:0");
                }
                ?>
            </div>
        </div>

        <?php
        $srrrr = mysqli_query($dbcon, "SELECT * FROM reports WHERE id='$id'") or die(mysqli_error());
        $rrrrx = mysqli_fetch_assoc($srrrr);

        function srl($item)
        {
            return trim($item);
        }
        ?>

        <div class="col-lg-7">
            <div class="bs-component">
                <div class="well well">
                    <h5><b>Item Information</b></h5>
                    <?php
                    ////////////////// Cpanel
                    if ($rrrrx['account_type'] == "cpanel") {
                        $itemid = $rrrrx['s_id'];
                        $qe = mysqli_query($dbcon, "SELECT * FROM cpanels WHERE id='$itemid'") or die(mysqli_error());
                        while ($rowe = mysqli_fetch_assoc($qe)) {
                            $country = $rowe['country'];
                            $hosting = $rowe['infos'];
                            $price = $rowe['price'];
                            $information = $rowe['url'];
                            $d = explode("|", $information);
                            $url = srl($d[0]);
                            $login = srl($d[1]);
                            $pass = srl($d[2]);
                            $maindom = parse_url($url, PHP_URL_HOST);
                            $domain = $rowe['domain'];
                            $code = array_search("$country", $countrycodes);
                            $countrycode = strtolower($code);
                    ?>

                            <table class="table">
                                <tr>
                                    <td>Country</td>
                                    <td><b><span class="flag-icon flag-icon-<?php echo htmlspecialchars($countrycode); ?>"></span> <?php echo htmlspecialchars($country); ?></b></td>
                                </tr>
                                <tr>
                                    <td>Detect Hosting</td>
                                    <td><b><?php echo htmlspecialchars($hosting); ?></b></td>
                                </tr>
                                <tr>
                                    <td>Domain</td>
                                    <td><b><?php echo $domain; ?></b></td>
                                </tr>
                                <tr>
                                    <td>Url</td>
                                    <td><b><a href='http://<?php echo $maindom; ?>:2083' onclick='window.open(this.href);return false;'>https://<?php echo $maindom; ?>:2083</a></b></td>
                                </tr>
                                <tr>
                                    <td>non-https Url</td>
                                    <td><b><a href='http://<?php echo $maindom; ?>:2082' onclick='window.open(this.href);return false;'>http://<?php echo $maindom; ?>:2082</a></b></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><b><input id='username' onClick='this.setSelectionRange(0, this.value.length)' value='<?php echo htmlspecialchars($login); ?>' /></b></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><b><input id='password' onClick='this.setSelectionRange(0, this.value.length)' value='<?php echo htmlspecialchars($pass); ?>' /></b></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td><b><?php echo htmlspecialchars($price); ?>$</b></td>
                                </tr>
                            </table>
                    <?php
                        }
                    }
                    //////////////End if cPanel
                    ?>
                    <?php
                    ////////////////// Shell
                    if ($rrrrx['account_type'] == "shell") {
                        $itemid = $rrrrx['s_id'];
                        $qe = mysqli_query($dbcon, "SELECT * FROM stufs WHERE id='$itemid'") or die(mysqli_error());
                        while ($rowe = mysqli_fetch_assoc($qe)) {
                            $country = $rowe['country'];
                            $information = $rowe['url'];
                            $price = $rowe['price'];
                            $code = array_search("$country", $countrycodes);
                            $countrycode = strtolower($code);
                    ?>
                            <table class="table">
                                <tr>
                                    <td>Country</td>
                                    <td><b><span class="flag-icon flag-icon-<?php echo htmlspecialchars($countrycode); ?>"></span> <?php echo htmlspecialchars($country); ?></b></td>
                                </tr>
                                <tr>
                                    <td>Shell</td>
                                    <td><b><a href='<?php echo htmlspecialchars($information); ?>' onclick='window.open(this.href);return false;'><?php echo htmlspecialchars($information); ?></a></b></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td><b><?php echo htmlspecialchars($price); ?>$</b></td>
                                </tr>
                            </table>
                    <?php
                        }
                    }
                    //////////////End if Shell
                    ?>
                    <?php
                    ////////////////// rdp
                    if ($rrrrx['account_type'] == "rdp") {
                        $itemid = $rrrrx['s_id'];
                        $qe = mysqli_query($dbcon, "SELECT * FROM rdps WHERE id='$itemid'") or die(mysqli_error());
                        while ($rowe = mysqli_fetch_assoc($qe)) {
                            $country = $rowe['country'];
                            $access = $rowe['access'];
                            $windows = $rowe['windows'];
                            $ram = $rowe['ram'];
                            $state = $rowe['city'];
                            $hosting = $rowe['hosting'];
                            $information = $rowe['url'];
                            $price = $rowe['price'];
                            $code = array_search("$country", $countrycodes);
                            $countrycode = strtolower($code);
                            $information = $rowe['url'];
                            $d = explode("|", $information);
                            $url = srl($d[0]);
                            $login = srl($d[1]);
                            $pass = srl($d[2]);
                    ?>
                            <table class="table">
                                <tr>
                                    <td>Country</td>
                                    <td><b><span class="flag-icon flag-icon-<?php echo htmlspecialchars($countrycode); ?>"></span> <?php echo htmlspecialchars($country); ?></b></td>
                                </tr>
                                <tr>
                                    <td>State</td>
                                    <td><b><?php echo htmlspecialchars($state); ?></b></td>
                                </tr>
                                <tr>
                                    <td>Host</td>
                                    <td><b>
                                            <div class="form-group">
                                                <div class="input-group col-xs-9">
                                                    <input class='form-control input-sm' id='host' onClick='this.setSelectionRange(0, this.value.length)' value='<?php echo htmlspecialchars($url); ?>' />
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary btn-sm copyit" data-clipboard-target="#host">Copy <i class="glyphicon glyphicon-copy"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </b></td>
                                </tr>
                                <tr>
                                    <td>Login</td>
                                    <td><b>
                                            <div class="form-group">
                                                <div class="input-group col-xs-9">
                                                    <input class='form-control input-sm' id='login' onClick='this.setSelectionRange(0, this.value.length)' value='<?php echo htmlspecialchars($login); ?>' />
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary btn-sm copyit" data-clipboard-target="#login">Copy <i class="glyphicon glyphicon-copy"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </b></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><b>
                                            <div class="form-group">
                                                <div class="input-group col-xs-9">
                                                    <input class='form-control input-sm' id='password' onClick='this.setSelectionRange(0, this.value.length)' value='<?php echo htmlspecialchars($pass); ?>' />
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary btn-sm copyit" data-clipboard-target="#password">Copy <i class="glyphicon glyphicon-copy"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </b></td>
                                </tr>
                                <tr>
                                    <td>Windows</td>
                                    <td><b><?php echo htmlspecialchars($windows); ?></b></td>
                                </tr>
                                <tr>
                                    <td>Access</td>
                                    <td><b><?php echo htmlspecialchars($access); ?></b></td>
                                </tr>
                                <tr>
                                    <td>Ram</td>
                                    <td><b><?php echo htmlspecialchars($ram); ?></b></td>
                                </tr>
                                <tr>
                                    <td>Detect Hosting</td>
                                    <td><b><?php echo htmlspecialchars($hosting); ?></b></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td><b><?php echo htmlspecialchars($price); ?>$</b></td>
                                </tr>
                            </table>
                    <?php
                        }
                    }
                    //////////////End if rdp
                    ?>

                    <?php
                    ////////////////// Mailer
                    if ($rrrrx['account_type'] == "mailer") {
                        $itemid = $rrrrx['s_id'];
                        $qe = mysqli_query($dbcon, "SELECT * FROM mailers WHERE id='$itemid'") or die(mysqli_error());
                        while ($rowe = mysqli_fetch_assoc($qe)) {
                            $country = $rowe['country'];
                            $information = $rowe['url'];
                            $price = $rowe['price'];
                            $code = array_search("$country", $countrycodes);
                            $countrycode = strtolower($code);
                    ?>
                            <table class="table">
                                <tr>
                                    <td>Country</td>
                                    <td><b><span class="flag-icon flag-icon-<?php echo htmlspecialchars($countrycode); ?>"></span> <?php echo htmlspecialchars($country); ?></b></td>
                                </tr>
                                <tr>
                                    <td>Mailer</td>
                                    <td><b><a href='<?php echo htmlspecialchars($information); ?>' onclick='window.open(this.href);return false;'><?php echo htmlspecialchars($information); ?></a></b></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td><b><?php echo htmlspecialchars($price); ?>$</b></td>
                                </tr>
                            </table>
                    <?php
                        }
                    }
                    //////////////End if mailer
                    ?>

                    <?php
                    ////////////////// Smtp
                    if ($rrrrx['account_type'] == "smtp") {
                        $itemid = $rrrrx['s_id'];
                        $qe = mysqli_query($dbcon, "SELECT * FROM smtps WHERE id='$itemid'") or die(mysqli_error());
                        while ($rowe = mysqli_fetch_assoc($qe)) {
                            $country = $rowe['country'];
                            $hosting = $rowe['infos'];
                            $information = $rowe['url'];
                            $price = $rowe['price'];
                            $d = explode("|", $information);
                            $url = srl($d[0]);
                            $login = srl($d[1]);
                            $pass = srl($d[2]);
                            $port = srl($d[3]);
                            $maindom = parse_url($url, PHP_URL_HOST);
                            $code = array_search("$country", $countrycodes);
                            $countrycode = strtolower($code);
                    ?>
                            <table class="table">
                                <tr>
                                    <td>Country</td>
                                    <td><b><span class="flag-icon flag-icon-<?php echo htmlspecialchars($countrycode); ?>"></span> <?php echo htmlspecialchars($country); ?></b></td>
                                </tr>
                                <tr>
                                    <td>HOST/IP</td>
                                    <td><b><input id='host/ip' onClick='this.setSelectionRange(0, this.value.length)' value='<?php echo htmlspecialchars($url); ?>' /></b></td>
                                </tr>
                                <tr>
                                    <td>Port</td>
                                    <td><b><?php echo htmlspecialchars($port); ?></b></td>
                                </tr>
                                <tr>
                                    <td>User</td>
                                    <td><b><input id='user' onClick='this.setSelectionRange(0, this.value.length)' value='<?php echo htmlspecialchars($login); ?>' /></b></td>
                                </tr>
                                <tr>
                                    <td>Pass</td>
                                    <td><b><input id='pass' onClick='this.setSelectionRange(0, this.value.length)' value='<?php echo htmlspecialchars($pass); ?>' /></b></td>
                                </tr>
                                <tr>
                                    <td>Sender Email</td>
                                    <td><b><input id='senderemail' onClick='this.setSelectionRange(0, this.value.length)' value='<?php echo htmlspecialchars($login); ?>' /></b></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td><b><?php echo htmlspecialchars($price); ?>$</b></td>
                                </tr>
                            </table>
                    <?php
                        }
                    }
                    //////////////End if Smtp
                    ?>

                    <?php
                    ////////////////// Leads
                    if ($rrrrx['account_type'] == "leads") {
                        $itemid = $rrrrx['s_id'];
                        $qe = mysqli_query($dbcon, "SELECT * FROM leads WHERE id='$itemid'") or die(mysqli_error());
                        while ($rowe = mysqli_fetch_assoc($qe)) {
                            $country = $rowe['country'];
                            $description = $rowe['infos'];
                            $number = $rowe['number'];
                            $information = $rowe['url'];
                            $price = $rowe['price'];
                            $code = array_search("$country", $countrycodes);
                            $countrycode = strtolower($code);
                    ?>
                            <table class="table">
                                <tr>
                                    <td>Country</td>
                                    <td><b><span class="flag-icon flag-icon-<?php echo htmlspecialchars($countrycode); ?>"></span> <?php echo htmlspecialchars($country); ?></b></td>
                                </tr>
                                <tr>
                                    <td>Number</td>
                                    <td><b><?php echo htmlspecialchars($number); ?></b></td>
                                </tr>
                                <tr>
                                    <td>About</td>
                                    <td><b><?php echo htmlspecialchars($description); ?></b></td>
                                </tr>
                                <tr>
                                    <td>Download</td>
                                    <td><b><a href='<?php echo htmlspecialchars($information); ?>' onclick='window.open(this.href);return false;'><?php echo htmlspecialchars($information); ?></a></b></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td><b><?php echo htmlspecialchars($price); ?>$</b></td>
                                </tr>
                            </table>
                    <?php
                        }
                    }
                    //////////////End if leads
                    ?>

                    <?php
                    ////////////////// premium
                    if ($rrrrx['account_type'] == "account") {
                        $itemid = $rrrrx['s_id'];
                        $qe = mysqli_query($dbcon, "SELECT * FROM accounts WHERE id='$itemid'") or die(mysqli_error());
                        while ($rowe = mysqli_fetch_assoc($qe)) {
                            $country = $rowe['country'];
                            $site = $rowe['sitename'];
                            $description = $rowe['infos'];
                           

                            $information = $rowe['url'];
                            $price = $rowe['price'];
                            $login = $rowe['login'];
                            $pass = $rowe['pass'];
                            $code = array_search("$country", $countrycodes);
                            $countrycode = strtolower($code);
                    ?>

                    <table class="table">
                    <tr>
                      <td>Country</td>
                      <td><b><span class="flag-icon flag-icon-<?php echo htmlspecialchars($countrycode); ?>"></span> <?php echo htmlspecialchars($country); ?></b></td>
                    </tr>

                      <tr>
                      <td>Available Information</td>
                      <td><b><?php echo htmlspecialchars($description); ?></b></td>
                    </tr>

                      <tr>
                      <td>Website</td>
                      <td><b><a><?php echo htmlspecialchars($site); ?></a></b></td>
                    </tr>

                      <tr>
                      <td>Account Info</td>
                      <td><b><textarea rows='10' cols='30' ><?php echo htmlspecialchars($information); ?></textarea></b></td>
                    </tr>

                      <tr>
                      <td>Login</td>
                      <td><b><?php echo htmlspecialchars($login); ?></b></td>
                    </tr>

                      <tr>
                      <td>Password</td>
                      <td><b><?php echo htmlspecialchars($pass); ?></b></td>
                    </tr>

                      <tr>
                      <td>Price</td>
                      <td><b><?php echo htmlspecialchars($price); ?>$</b></td>
                    </tr>
                    </table>
                    <?php
                        }
                    }
                    //////////////End if premium
                    ?>

                    </div>         
            </div></div>    

            </div>
            </div>
            </div>
</div>
<?php
include "footer.php";
?>

<?php

include "header.php";
$q = mysqli_query($dbcon, "SELECT * FROM reports ORDER BY id desc ") or die("error");
$t = mysqli_num_rows($q);
global $t, $q;

?>

<?php

$sql = "SELECT * FROM purchases ORDER BY id DESC Limit 300";

$query = mysqli_query($dbcon, $sql);

if (!$query) {
    die('SQL Error: ' . mysqli_error($dbcon));
}
?>
<!-- /.box-header -->
<div class="box-body">
    <div class="alert alert-danger fade in radius-bordered alert-shadowed"><b>Last 300 Orders</b></div>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#stats" data-toggle="tab" aria-expanded="true"><span class="glyphicon glyphicon-stats"></span> Stats</a></li>
        <li class=""><a href="#myorders" data-toggle="tab" aria-expanded="false"><span class="glyphicon glyphicon-time"></span> All Orders</a></li>
    </ul>
    <?php
    $allsales = 0;
    $qer = mysqli_query($dbcon, "SELECT * FROM purchases") or die(mysql_error());
    while ($rpw = mysqli_fetch_assoc($qer)) {
        $allsales += $rpw['price'];
    }
    ?>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="stats">
            <div class="well well-sm">
                <h4>Sales Statistics</h4>
                <ul>
                    <li>All Sales : <b><?php $s12 = mysqli_query($dbcon, "SELECT * FROM purchases");
                                        $r11 = mysqli_num_rows($s12);
                                        echo $r11; ?></b> ($<?php echo $allsales; ?>)</li>

                </ul>
            </div>
        </div>
        <div class="tab-pane fade in" id="myorders">
            <br>
            <table width="100%" class="table table-striped table-bordered table-condensed sort" id="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Buyer</th>
                        <th>Seller</th>
                        <th>Type</th>
                        <th>Open</th>
                        <th>Price</th>
                        <th>Report ID</th>
                        <th>Report State</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                        $qer = mysqli_query($dbcon, "SELECT * FROM resseller WHERE id='" . $row['reseller_id'] . "'") or die(mysql_error());
                        while ($rpw = mysqli_fetch_assoc($qer))
                            $SellerNick = "seller" . $rpw["id"] . "";
                        $orderid = $row['id'];
                        if (empty($row['report_id'])) {
                            $reportnumber = "n/a";
                        } else {
                            $repid = $row['report_id'];
                            $reportnumber = "<a href='viewr.php?id=$repid'>" . $row['report_id'] . "</a>";
                        }
                        $qurez = mysqli_query($dbcon, "SELECT * FROM reports WHERE order_id='$orderid'") or die(mysql_error());
                        echo '<tr>
                        <td></td>
                        <td>' . $row['id'] . '</td>
                        <td>' . $row['user_id'] . '</td>
                        <td>' . $SellerNick . '</td>
                        <td>' . strtolower($row['purchase_type']) . '</td>
                        <td><button onclick="openitem(' . $row['id'] . ')" class="btn btn-primary btn-xs"> OPEN</button></td>
                        <td>' . $row['price'] . '$</td>
                        <td>' . $reportnumber . '</td>
                        <td>';
                        while ($rowez = mysqli_fetch_array($qurez)) {
                            echo $rowez['status'];
                        }
                        echo '</td>
                        <td>' . $row['purchase_date'] . '</td>
                        </tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        function openitem(order) {
            $("#myModalHeader").text('Order #' + order);
            $('#myModal').modal('show');
            $.ajax({
                type: 'GET',
                url: 'openorder.php?id=' + order,
                success: function(data) {
                    $("#modelbody").html(data).show();
                }
            });

        }
    </script>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalHeader"></h4>
                </div>
                <div class="modal-body" id="modelbody">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>

admin/sales/index.blade.php