<?php 
if($this->status == false) 
{
	echo $this->error_message;
?>
	<div class='d-db-modal-view-options'>
	 	<div onclick="CloseEdit()" class='d-db-modal-view-option option-color-grey'>Close</div>
	 </div>
<?php	 
}
else 
{
$email = "";
$first_name = "";
$last_name = "";
$role = "";
$telephone = "";
$mobile = "";
$id = 0;
$imgId = 0;
if($this->model != null)
{
	$id = $this->model[0]['id'];
	$email = $this->model[0]['email'];
	$first_name = $this->model[0]['first_name'] != null ? $this->model[0]['first_name'] : "";
	$last_name = $this->model[0]['last_name'] != null ? $this->model[0]['last_name'] : "";
	$mobile = $this->model[0]['mobile_number'] != null ? $this->model[0]['mobile_number'] : "";
	$role = $this->model[0]['role'] != null ? $this->model[0]['role'] : "";
	$telephone = $this->model[0]['telephone_number'] != null ? $this->model[0]['telephone_number'] : "";
	$imgId = $this->model[0]['avatar_id'] != null ? $this->model[0]['avatar_id'] : 0;
}

?>
<h1 id='editUserFormTitle' class='d-db-edit-form-title'><?php echo $this->title ?></h1>
<form id='editUserForm' method='post' action='<?php echo URL . "dashboard/create_or_edit_user"; ?>'>
<input id='editUserForm_UserId' hidden name='id' type='text' value='<?php echo $id; ?>'>
<table class='d-db-edit-table edit-table-left'>
<tr>
<?php
if($id == 0) {
?>
	<th id='editUserForm_EmailLabel'>Email</th><td><input id='editUserForm_EmailInput' name='email' type='text' value='<?php echo $email; ?>'></td>
<?php 
} else { 
?>
	<th>Email (can not change)</th><td><?php echo $email; ?></td>
<?php } ?>
</tr>
<tr>
<th>First name</th><td><input name='first_name' type='text' value='<?php echo $first_name; ?>'></td>
</tr>
<tr>
<th>New Password</th><td><input id='editUserForm_PasswordInput' name='password' type='password' value=''></td>
</tr>
<tr>
<th>Last name</th><td><input name='last_name' type='text' value='<?php echo $last_name; ?>'></td>
</tr>
<tr>
<th>Telephone number </th><td><input name='telephone_number' type='text' value='<?php echo $telephone; ?>'></td>
</tr>
<tr>
<th>Mobile number</th><td><input name='mobile_number' type='text' value='<?php echo $mobile; ?>'></td>
</tr>
<tr>
<th>Role</th>
<td>
	<input <?php echo ($role == '' || $role == 'guest') ? 'checked' : '';  ?> type="radio" name="role" value="guest"> Guest<br>
	<input <?php echo ($role == 'admin') ? 'checked' : '';  ?> type="radio" name="role" value="admin"> Admin
</td>
</tr>
<tr>
<th>Avatar</th>
<td>
<div class='d-image-input-wrapper'>
  <input name='avatar' img-max-height="500" img-max-width="1200" class='d-image-input pending' type='text' value='<?php echo $imgId; ?>' />
</div>
</td>
</tr>
</table>
<div class='d-db-modal-view-options'>
	<div onclick='SubmitEditUserForm()' class='d-db-modal-view-option option-color-green'>Save</div>
	<div onclick="CloseEdit()" class='d-db-modal-view-option option-color-grey'>Close</div>
	<div style=" <?php echo ($id == 0 ? 'display: none' : '') ?>" id='editUserForm_DeleteDiv' onclick='DeleteUser()' class='d-db-modal-view-option option-color-red'>Delete</div>
</div>
</form>
<?php
}
?>