<title><?php echo (isset($this->title)) ? $this->title : ''; ?></title>
<meta charset="utf-8">

<?php if ($this->error != 404) { ?>

<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css/bjqs.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css/font.css">

<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/common.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/minh-search-detail.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/mlam.css">

<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/image.css">

<script src="<?php echo URL; ?>public/js/jquery-1.12.2.min.js" charset="utf-8"></script>
<script src="<?php echo URL; ?>public/js/jquery.secret-source.min.js" charset="utf-8"></script>
<script src="<?php echo URL; ?>public/dist/js/bootstrap.min.js" charset="utf-8"></script>

<script src="<?php echo URL; ?>public/js/image.js" charset="utf-8"></script>
<?php

}

if (isset($this->js)) {
  echo '<script src="' . URL . $this->js . '" charset="utf-8"></script>';
}

 ?>
