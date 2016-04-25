
<div class='d-db-mainTable-options'>
 <div class='d-db-mainTable-option' onclick='EditUser(0)'>Create</div>
</div>
<?php
if($this->model != null)
{
?>
<table border-collapse="collapse" id='mainTable'>
<tr>
<th style='width:50px;'></th>
<th>Email</th>
<th>First Name</th>
<th>Last Name</th>
<th>Telephone</th>
<th>Mobile</th>
<th>Role</th>
</tr>
<?php
	for ($i = 0; $i < count($this->model->data); $i++)
	{
?>
		<tr <?php echo 'id="tr_' . $this->model->data[$i]['id'] . '"'; ?> >
			<td><i onclick='EditUser(<?php echo $this->model->data[$i]['id']; ?>)' class="fa fa-pencil-square-o"></i></td>
			<td><?php echo $this->model->data[$i]['email']; ?></td>
			<td><?php echo $this->model->data[$i]['first_name']; ?></td>
			<td><?php echo $this->model->data[$i]['last_name']; ?></td>

			<td><?php echo $this->model->data[$i]['telephone_number']; ?></td>
			<td><?php echo $this->model->data[$i]['mobile_number']; ?></td>
			<td><?php echo $this->model->data[$i]['role']; ?></td>
		</tr>
<?php
	}
?>
</table>

<?php
	if($this->model->total_page > 0)
	{
		?>
		<div class='d-db-mainTable-page-container'><span>Page</span>
		<select class='d-db_mainTable-page' onchange='ChangePage(this)'>
		<?php
		for($i = 0; $i < $this->model->total_page; $i++)
		{
			?>
				<option <?php echo ($this->model->current_page == $i) ? 'selected="selected"' : '' ?> value='<?php echo $i; ?>'><?php echo $i + 1;	?></option>
			<?php
		}
		?>
		</select>
		</div>
		<?php
	}
}
?>