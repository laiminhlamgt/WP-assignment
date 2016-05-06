<?php

// Duong Tran 2016 0423
// Define an enumeration for User Role

abstract class RoleEnum {
    const Admin = 'admin';
    const User = 'user';
}

abstract class DashboardFileDirEnum {
	const ROOT = 'views/dashboard/';
	const CSS = 'scr/css/';
	const JS = 'scr/js/';
	const COMPONENT = 'scr/component/';
	const CHART = 'scr/charts/';
}

abstract class PostStatus {
    const Pending = 1;
    const Approved = 2;
    const Edited = 3;
}

?>