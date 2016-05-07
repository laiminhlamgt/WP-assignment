
<div class='d-db-mainTable-options'>
 <div class='d-db-mainTable-option' onclick='EditPost(0)'>Create</div>
</div>
<?php
if($this->model != null)
{
?>
<table border-collapse="collapse" id='mainTable'>
<tr>
<th style='width:50px;'></th>
<th>Image</th>
<th>Title</th>
<th>Description</th>
<th>Created</th>
<th>User</th>
</tr>
<?php
	for ($i = 0; $i < count($this->model->data); $i++)
	{
		$pictureId = $this->model->data[$i]['picture1_id'] > 0 ? $this->model->data[$i]['picture1_id'] : $this->model->data[$i]['picture2_id'];
		$postTitle = $this->model->data[$i]['post_title'];
		if($postTitle != null)
		{
			$postTitle = strlen($postTitle) > 100 ? substr($postTitle,0,100) : $postTitle;
		}

		$postDescription = $this->model->data[$i]['post_description'];
		if($postDescription != null)
		{
			$postDescription = strlen($postDescription) > 100 ? substr($postDescription,0,100) : $postDescription;
		}
?>
		<tr <?php echo 'id="tr_' . $this->model->data[$i]['id'] . '"'; ?> >
			<td><i onclick='EditPost(<?php echo $this->model->data[$i]['id']; ?>)' class="fa fa-pencil-square-o"></i></td>
			<td><img style='margin:0 auto;' class='d-image-img pending' image-id='<?php echo $pictureId; ?>' img-max-width="300" img-max-height="300"  /></td>
			<td><?php echo $postTitle; ?></td>
			<td><?php echo $postDescription; ?></td>
			<td><?php echo $this->model->data[$i]['created']; ?></td>
			<td>
			<div style='text-align: center;'><?php echo $this->model->data[$i]['full_name']; ?></div>
			<img style='margin:0 auto;' class='d-image-img pending' image-id='<?php echo $this->model->data[$i]['avatar_id']; ?>' img-max-width="300" img-max-height="300"  /></td>
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