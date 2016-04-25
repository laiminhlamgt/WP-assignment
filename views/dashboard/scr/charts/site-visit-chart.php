<?php

	//Chart for site visit
	$l1 = array(2, 3, 1, 4, 3,6,1,8,3,1);
    $l2 = array(1, 4, 3, 2, 5,6,1,2,5,1);

    $pc = new C_PhpChartX(array($l1,$l2),'chart1');
    $pc->add_plugins(array('canvasTextRenderer'));
	$pc->set_animate(true);
	$pc->set_title(array('text'=>'site visit chart'));
    $pc->set_stack_series(true);
    $pc->set_grid(array('background'=>'#fefbf3','borderWidth'=>'2.5'));
    $pc->set_series_default(array('fill'=> true, 'showMarker'=> false, 'shadow'=> false));
    $pc->set_xaxes(array(
         'xaxis'=>array('pad'=>1.0, 'numberTicks'=>10, 'autoscale'=>false)
    ));

    $pc->add_series(array('color'=>'rgba(68, 124, 147, 0.7)'));
    // $pc->add_series(array('color'=>'rgba(150, 35, 90, 0.7)'));
    $pc->draw(800,400);
?>

<script>
	 $('.pg_notify').remove();
</script>