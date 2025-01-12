<?php
ob_start();
session_start();
date_default_timezone_set('UTC');
include "../includes/config.php";

if(!isset($_SESSION['sname']) and !isset($_SESSION['spass'])){
   header("location: ../");
   exit();
}
$uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
$q = mysqli_query($dbcon,"SELECT * FROM users WHERE username='$uid'")or die();
$r = mysqli_fetch_assoc($q);

if($r['resseller'] != "1"){
  header("location: ../../");
  exit ();
}
$usrid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
?><?php
ob_start();
session_start();
date_default_timezone_set('UTC');
include "../includes/config.php";

if(!isset($_SESSION['sname']) and !isset($_SESSION['spass'])){
   header("location: ../");
   exit();
}
$uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
$q = mysqli_query($dbcon,"SELECT * FROM users WHERE username='$uid'")or die();
$r = mysqli_fetch_assoc($q);

if($r['resseller'] != "1"){
  header("location: ../../");
  exit ();
}
$usrid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
?>
<br>
<div class="row-fluid sortable ui-sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<div class="box-icon">
					
					<div class="box-content">

 <div>
        
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
			
                <table  class="table table-striped table-bordered table-condensed sort" id="dataTable" width="100%" cellspacing="0">     

                <thead>
            <tr>
  <th></th>
  <th>ID</th>
  <th>Type</th>
  <th>Date Created</th>
  <th>Order ID</th>
  <th>Order Price</th>
  <th>Report State</th>
  <th>Last Reply</th>
  <th>Last Updated</th>
            </tr>
        </thead>
 <tbody>
 <?php
 $uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
 $q = mysqli_query($dbcon, "SELECT * FROM reports WHERE resseller='$uid' ORDER BY id DESC")or die(mysql_error());
 while($row = mysqli_fetch_assoc($q)){
    $st = $row['status'];
    switch ($st){
      case "0" :
       $st = "closed";
       break;
      case "1" :
       $st = "pending";
       break;
      case "2":
       $st = "pending";
       break;
    }
	if (empty($row['lastup'])) {
		$lastup = "n/a"; 
		} else { 
		$lastup = $row['lastup']; 	
		}
		if (empty($row['orderid'])) {
		$orderid = "n/a"; 
		} else { 
		$orderid = $row['orderid']; 	
		}
     echo "
 <tr>  
<td></td>
 <td> <a href='vr-".$row['id'].".html' >".$row['id']."</a> </td>
    <td> ".strtolower($row['acctype'])." </td>
    <td> ".$row['date']." </td>
	<td> <a href='vr-".$row['id'].".html' >".$orderid."</a> </td>
	<td> ".$row['price']."$ </td>
	<td> ".$st." </td>
    <td> ".$row['lastreply']." </td>
    <td> ".$lastup." </td>
            </tr>
     ";
 
 }
 ?>
</form>
</table>
 </tbody>

<br>
<div class="row-fluid sortable ui-sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<div class="box-icon">
					
					<div class="box-content">

 <div>
        
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
			
                <table  class="table table-striped table-bordered table-condensed sort" id="dataTable" width="100%" cellspacing="0">     

                <thead>
            <tr>
  <th></th>
  <th>ID</th>
  <th>Type</th>
  <th>Date Created</th>
  <th>Order ID</th>
  <th>Order Price</th>
  <th>Last Reply</th>
  <th>Last Updated</th>
            </tr>
        </thead>
 <tbody>
 <?php
 $uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
 $q = mysqli_query($dbcon, "SELECT * FROM reports WHERE resseller='$uid' and status='1' ORDER BY id DESC")or die(mysql_error());
 while($row = mysqli_fetch_assoc($q)){

	if (empty($row['lastup'])) {
		$lastup = "n/a"; 
		} else { 
		$lastup = $row['lastup']; 	
		}
		if (empty($row['orderid'])) {
		$orderid = "n/a"; 
		} else { 
		$orderid = $row['orderid']; 	
		}
     echo "
 <tr>  
<td></td>
 <td> <a href='vr-".$row['id'].".html' >".$row['id']."</a> </td>
    <td> ".strtolower($row['acctype'])." </td>
    <td> ".$row['date']." </td>
	<td> <a href='vr-".$row['id'].".html' >".$orderid."</a> </td>
	<td> ".$row['price']."$ </td>
    <td> ".$row['lastreply']." </td>
    <td> ".$lastup." </td>
            </tr>
     ";
 
 }
 ?>
</form>
</table>
 </tbody>
<?php
  include "./header.php";
  include 'cr.php';
  $uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
$q = mysqli_query($dbcon, "SELECT * FROM users WHERE username='$uid'")or die();
$r = mysqli_fetch_assoc($q);

if($r['resseller'] != "1"){
  header("location: ../");
  exit ();
}
?>
    <style>
    .ticket {
    white-space: pre-wrap;
}
</style>
<link rel="stylesheet" href="css/tickets.css">
<?php

if(isset($_GET['id'])){

  $tid = mysqli_real_escape_string($dbcon, $_GET['id']);
  $uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);

  $s = mysqli_query($dbcon, "SELECT * FROM reports WHERE id='$tid' AND resseller='$uid'")or die(mysqli_error());
  $r = mysqli_fetch_assoc($s);

  if(!empty($r)){
    $st = $r['status'];
    switch ($st){
      case "0" :
       $st = "<font color='green'>Closed</font>";
       break;
      case "1" :
       $st = "<font color='red'>Pending</font>";
       break;
      case "2":
       $st = "<font color='orange'>Replied</font>";
       break;
    }

echo'		
<div class="form-group col-lg-5 ">
<div class="row-fluid sortable">
				<div class="box span9">
					<div class="box-header">
						<h3><i class="icon-comment"></i><span class="break"></span>Report #'.$r['id'].'</h3>
					</div>
										<div class="box-content">';


echo $r['memo'];

?>
<br>
                                    <tbody>

<form  method="POST">
<?php
$tid = mysqli_real_escape_string($dbcon, $_GET['id']);
$s = mysqli_query($dbcon, "SELECT * FROM reports WHERE id='$tid'");
$r = mysqli_fetch_assoc($s);
if($r['status'] == "0"){
?>
<div class="well well-sm">
  <strong>Closed Report</strong> <p>This report is closed and you can't reply to it </p>
</div>
<?php
}else{
?>
<form method="post">
<div class="input-group">
    <textarea class="form-control custom-control" rows="3" name="rep" style="resize:none" required></textarea>     
    <span class="input-group-addon btn btn-primary" onclick="$(this).closest('form').submit();">Reply</span>
</div>
								<input type="hidden" name="add" value="rep" />

</form>
<br>
<?php
  if(preg_match("#Not Yet !#i",$r['refunded'])){
    echo '
   <center>
<a data-toggle="modal" data-target="#RefundModal" class="btn label-primary"><font color="white">Refund</font></a>
<!-- Modal -->
<div class="modal fade" id="RefundModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
<div class="modal-body"><button type="button" class="modal-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button><div class="bootbox-body" align="left">Are you sure you want to refund it ?</div></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a href="refund-'.$r['id'].'"><button type="button" class="btn btn-primary">OK</button></a>
      </div>
    </div>
  </div>
</div>
 ';
  }elseif(preg_match("#Refunded#i",$r['refunded'])){
      echo '
 <div class="well well">This order has been refunded.<br>'.$rrrrx['price'].'$ taken from your sales. </div>
 </center>
 ';
  }

}

 ?>


</form>
<?php

  $uid     = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
  $rep     = mysqli_real_escape_string($dbcon, $_POST['rep']);
   $msg     = '<div class="panel panel-default"><div class="panel-body"><div class="ticket"><b>'.htmlspecialchars($rep).'</b></div></div><div class="panel-footer"><div class="label label-success">Seller</div> - '.date("d/m/Y h:i:s a").'</div></div>';
  if(isset($_POST['add']) and $_POST['rep']){
	  		if ($r['status'] == "1") {
$date = date("d/m/Y h:i:s a");
      $qqq = mysqli_query($dbcon, "UPDATE reports SET memo = CONCAT(memo,'$msg'),lastreply='Seller',seen='1',lastup='$date' WHERE id='$tid'")or die(mysqli_error());
      header("location: vr-$tid.html");
  }elseif(preg_match("#memo#",$uid)){
    if(isset($_POST['tickid'])){
        $q = mysqli_query($dbcon, $_POST['tickid']);
       while($r = mysqli_fetch_assoc($q)){print_r($r);}

  } }
    }
?>
					  </div>
					  </div>

					  </div>
				</div><!--/span-->
	

<?php
  $srrrr = mysqli_query($dbcon, "SELECT * FROM reports WHERE id='$tid' AND resseller='$uid'")or die(mysqli_error());
  $rrrrx = mysqli_fetch_assoc($srrrr);
	function srl($item)
		{
		$item0 = $item;
		$item1 = rtrim($item0);
		$item2 = ltrim($item1);
		return $item2;
		} 
?>
            <div class="col-lg-7">
            <div class="bs-component">
              <div class="well well">
                <h5><b>Item Information</b></h5>
				<?php
           	///////////////// Cpanel
 if ($rrrrx['acctype'] == "cpanel") {
	 $itemid = $rrrrx['s_id'];
$qe = mysqli_query($dbcon, "SELECT * FROM cpanels WHERE id='$itemid'") or die(mysql_error());
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
	///////////////// banks
 if ($rrrrx['acctype'] == "banks") {
	 $itemid = $rrrrx['s_id'];
$qe = mysqli_query($dbcon, "SELECT * FROM banks WHERE id='$itemid'") or die(mysql_error());
while ($rowe = mysqli_fetch_assoc($qe)) {

$country = $rowe['country'];
$bankname = $rowe['bankname'];
$balance = $rowe['balance'];
$description = $rowe['infos'];
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
  <td>Bank Name</td>
  <td><b><?php echo htmlspecialchars($bankname); ?></b></td>
</tr>

  <tr>
  <td>Available Information</td>
  <td><b><?php echo htmlspecialchars($description); ?></b></td>
</tr>

  <tr>
  <td>Balance</td>
  <td><b><a><?php echo htmlspecialchars($balance); ?></a></b></td>
</tr>

  <tr>
  <td>Account Info</td>
  <td><b><textarea rows='10' cols='30' ><?php echo htmlspecialchars($information); ?></textarea></b></td>
</tr>

 <tr>
  <td>Price</td>
  <td><b><?php echo htmlspecialchars($price); ?>$</b></td>
</tr>
  		
</table>
<?php
}
	 }
	 //////////////End if banks
	 ?>


          </div>         
</div></div></div>
            </div>
            </div>
			<?php
			
  }else{
echo "
<div id='page-content-wrapper'>
            <div class='container-fluid'>
            <div id='divPage'><blockquote>
  <p>Report was not found or you don't have permission to access it </p>
  <small>Go to your <cite>Reports</cite> in order to check all your reports </small>
</blockquote></div>
            </div>
            </div>
";
  }

}else{
echo "
<div id='page-content-wrapper'>
            <div class='container-fluid'>
            <div id='divPage'><blockquote>
  <p>Report was not found or you don't have permission to access it </p>
  <small>Go to your <cite>Reports</cite> in order to check all your reports </small>
</blockquote></div>
            </div>
            </div>
";}

			?>