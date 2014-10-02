<?php
	
	$data = [];
	$str = $_GET['q'];
	$str = str_replace(" ", "%20",$str);
	$var  = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=".$str."&maxResults=5");
	$var = json_decode($var);
	$var = $var->items;
	foreach ($var as $item) {
		    $arr = [];
		    $arr['title'] = $item->volumeInfo->title;
    	 	    $arr['subtitle'] = $item->volumeInfo->subtitle;
		    $arr['smallThumbnail'] = 	$item->volumeInfo->imageLinks->smallThumbnail;
		    $arr['author'] = $item->volumeInfo->authors[0];	
		    //array_push($data,$item->volumeInfo->title);
		    array_push($data,$arr);	
	}
	echo json_encode($data);
	
?>
