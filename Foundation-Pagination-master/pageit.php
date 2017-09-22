<?
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
/****************************end of paginatioan************************/

?>
