<?php echo $this->error; ?>
<?php
	if($this->error != 404)
	{
		echo 'error : ' . $this->error_message;
	} 
	else
	{
		echo 'This page doesnt exists';
	}
?>

