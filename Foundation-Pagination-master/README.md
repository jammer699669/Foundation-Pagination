# Foundation-Pagination
PHP front end to easily use the feature of foundation pagination


Included is the raw file pageit.php that you can include in your code

Requires a rew parameters

$limit  must be set so database calls work
$totalrowslocal is the value return from the database of all rows matching your request

Example
$sqrows="SELECT  * FROM products where ptype1='$p1' ";
$rec = mysqli_query($con,$sqrows) or die(mysqli_error($con)) ;
$totalrowslocal = mysqli_num_rows($rec);

$limitvalue = $page * $limit - ($limit);
$results = $con->query("SELECT  * FROM products where ptype1='$p1' limit $limitvalue,$limit ");



