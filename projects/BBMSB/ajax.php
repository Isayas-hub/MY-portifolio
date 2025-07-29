<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();
if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'login2'){
	$login = $crud->login2();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'logout2'){
	$logout = $crud->logout2();
	if($logout)
		echo $logout;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}
if($action == 'signup'){
	$save = $crud->signup();
	if($save)
		echo $save;
}
if($action == 'update_account'){
	$save = $crud->update_account();
	if($save)
		echo $save;
}
if($action == "save_settings"){
	$save = $crud->save_settings();
	if($save)
		echo $save;
}
if($action == "save_donor"){
	$save = $crud->save_donor();
	if($save)
		echo $save;
}

if($action == "delete_donor"){
	$delete = $crud->delete_donor();
	if($delete)
		echo $delete;
}


if($action == "delete_new_donor"){
	$delete = $crud->delete_new_donor();
	if($delete)
		echo $delete;
}

if($action == "delete_regdonor"){
	$delete = $crud->delete_regdonor();
	if($delete)
		echo $delete;
}

if($action == "save_donation"){
	$save = $crud->save_donation();
	if($save)
		echo $save;
}
if($action == "delete_donation"){
	$save = $crud->delete_donation();
	if($save)
		echo $save;
}

if($action == "save_request"){
	$save = $crud->save_request();
	if($save)
		echo $save;
}
if($action == "delete_request"){
	$save = $crud->delete_request();
	if($save)
		echo $save;
}
if($action == "get_available"){
	$get = $crud->get_available();
	if($get)
		echo $get;
}

if($action == "chk_request"){
	$get = $crud->chk_request();
	if($get)
		echo $get;
}
if($action == "save_handover"){
	$save = $crud->save_handover();
	if($save)
		echo $save;
}
if($action == "delete_handover"){
	$save = $crud->delete_handover();
	if($save)
		echo $save;
}

if($action == "save_announcementn"){
	$save = $crud->save_announcementn();
	if($save)
		echo $save;
}
if($action == "save_viewcomment"){
	$save = $crud->save_viewcomment();
	if($save)
		echo $save;
}
if($action == "delete_viewcomment"){
	$save = $crud->delete_viewcomment();
	if($save)
		echo $save;
}


if($action == "delete_view_new_comment"){
	$save = $crud->delete_viewcomment();
	if($save)
		echo $save;
}
if($action == "delete_announcementn"){
	$save = $crud->delete_announcementn();
	if($save)
		echo $save;
}
if($action == "delete_viewnewdonor"){
	$save = $crud->delete_viewnewdonor();
	if($save)
		echo $save;
}
ob_end_flush();
?>
