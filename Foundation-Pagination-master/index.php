<?php
include('theader.php');
/**
Modified Sept 22 2017
 * @author James Blanchette Independent Technical Services
 * @copyright 2013 -2017
MIT Licensed for use as per license conditions

* lists all pages
 */

/*
example of getting records from database
$db_username        = 'usename'; //MySql database username
$db_password        = 'password'; //MySql database password
$db_name            = 'databasename'; //MySql database name
$db_host            = 'localhost'; //MySql hostname or IP
$con = new mysqli($db_host, $db_username, $db_password,$db_name); //connect to MySql
if ($con->connect_error) { //Output any connection error
    die('Error : ('. $con->connect_errno .') '. $con->connect_error);
}
$sqrows="SELECT  * FROM products where ptype1='$p1' ";
$rec = mysqli_query($con,$sqrows) or die(mysqli_error($con)) ;
$totalrowslocal = mysqli_num_rows($rec);

$limitvalue = $page * $limit - ($limit);
$results = $con->query("SELECT  * FROM products where ptype1='$p1' limit $limitvalue,$limit ");
//Display fetched records as you please


$count = mysqli_num_rows($results);
//echo "<BR> COUNT $count <BR>";
	if ($count >= 1)			{
		while ($row = mysqli_fetch_assoc($results)){
$newrow++;
				$pid=$row["id"];
				$productname=$row["productname"];
				$image=$row["image"];
				$price=$row["price"];
				$nprice=number_format($price, 2);
				$sku=$row["sku"];
				// get variations
				$var1name=$row["var1name"];
				//echo " Var1Name $var1name <br>";
				$var2name=$row["var2name"];
				//echo " Var2Name $var2name <br>";
				$var1=$row["var1"];
				$var2=$row["var2"];
				// get stock 
				$stock=$row["stock"];
				//$usestock=$row["usestock"];
		if ($newrow==4){
		$newrow=0;
		//</div>
		//<div class="row">
		}
?>


*/

// TESTING
$limit =15;   // limit of how many records to recieve must be set before you call this
$totalrowslocal=320;  // the number returned from the database query


// end testing

/*************************** pagination *************************/
if (isset($_GET["page"])){
	$page=$_GET["page"];
}else{
$page = 1;
}


$here=$_SERVER['PHP_SELF'];
$pages = "<p align='center'>  ";
$numofpages = ceil($totalrowslocal / $limit);
//echo "PAGE # = ".$page."<BR><HR>";
if($page >= 1){
	?>
	<div class="pagination-centered">
  <ul class="pagination">
  
	<?
	if($numofpages >= 5){
	if ($page==1){
	}else{
$pref=$here.'?page=1';
		?>
		 <li><a href="<?=$pref?>">&llarr;</a></li>
		 <?
}
}

	$pageprev = $page-1;
	if ($pageprev<=0){
	
	}else{
	
	$pref=$here.'?page='.$pageprev;
		?>
		 <li><a href="<?=$pref?>">&lt;</a></li>
		 <?
		 }
}
$starting = $page - 4;
$ending = $page + 4;
if($starting <= 0) $starting = 1;
if($ending >= $numofpages) $ending = $numofpages;
if ($starting + 4 <= $ending){
$endingout=	$starting + 4;
}else{
	$endingout=$ending;
}
if ($page-$starting >=4 && $page <> 1){
	$endingout++;
	$starting++;
		if ($endingout >=$numofpages){
		$endingout=$numofpages;
		}
}

for($i = $starting; $i <= $endingout; $i++){
	if($page == $i){
		
		$pref=$here.'?page='.$i;
		?>
		 <li><a href="<?=$pref?>"><b><?=$i?></b></a></li>
		 <?
	}else{
		
		$pref=$here.'?page='.$i;
		?>
		 <li><a href="<?=$pref?>"><?=$i?></a></li>
		 <?
	}
	}
if($page < $numofpages){
	$pagenext = ($page + 1);
	
	$pref=$here.'?page='.$pagenext;
		?>
		 <li><a href="<?=$pref?>">&gt;</a></li>
		 <?
}
if($numofpages >= 5){

$pref=$here.'?page='.$numofpages;

if ($page==$numofpages){

}else{
		?>
		 <li><a href="<?=$pref?>">&rrarr;</a></li>
		 <?
}
}

?>

  </ul>
</div>
<?
/****************************end of pagination************************/
?>

<?

include('tfooter.php');
?>
