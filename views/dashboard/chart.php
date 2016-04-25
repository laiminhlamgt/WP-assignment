<div class='chart-can'>
<?php
    require DashboardFileDirEnum::CHART . $this->chart_name . '.php';
?>
</div>

<div class='d-db-chart-group'>
    <div onclick='window.location.href =  <?php echo '"' . URL . 'dashboard/chart?chartname=post_chart' . '"'; ?>'  class='d-db-chart-item'>
        Site ViSit Chart
    </div>
    <div onclick='window.location.href = <?php echo '"' . URL  . 'dashboard/chart?chartname=site-visit-chart' . '"'; ?>'  class='d-db-chart-item'>
        Post Chart
    </div>
</div>
