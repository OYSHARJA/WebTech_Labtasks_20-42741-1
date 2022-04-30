<?php 

require_once ('../model/model.php');

function fetchAllEvent(){
	return showAllEvent();

}
function fetchEvent($id){
	return showEvent($id);

}
