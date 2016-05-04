<title><?php echo (isset($this->title)) ? $this->title : 'dashboard'; ?></title>
<meta charset="utf-8">

<?php if ($this->error != 404) { ?>

<!-- load css -->
<link rel="stylesheet" type="text/css" href="<?php echo URL . DashboardFileDirEnum::ROOT . DashboardFileDirEnum::CSS; ?>admin-common.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/image.css">
<!-- load script -->
<script src="<?php echo URL; ?>public/js/jquery-1.12.2.min.js" charset="utf-8"></script>
<script src="<?php echo URL . DashboardFileDirEnum::ROOT . DashboardFileDirEnum::JS; ?>jquery-migrate-1.3.0.js" charset="utf-8"></script>
<script src="<?php echo URL . DashboardFileDirEnum::ROOT . DashboardFileDirEnum::JS; ?>admin-script.js" charset="utf-8"></script>
<script src="<?php echo URL; ?>public/js/image.js" charset="utf-8"></script>
<?php
}
?>
