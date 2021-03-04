<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Visiting Card</title>
<link href="<?=base_url()?>resources/css/cardstyle.css" rel="stylesheet" type="text/css" />
</head>

<body onLoad="window.print()">
<p class="toptext">PLEASE PRESS FIRMLY</p>
<?php

	if(strlen($visitor->id) == 1){
		$id = '00'.$visitor->id;	
	} else if(strlen($visitor->id) == 2){
		$id = '0'.$visitor->id;	
	} else {
		$id = $visitor->id;	
	}
?>
<table border="0" width="350" cellpadding="0" cellspacing="0" align="center">
	<tr height="40" bgcolor="#C00">
    	<td colspan="4"><h1 style="color:#FFF; padding-left:20px">VISITOR PASS</h1><sup><?=$id?></sup></td>
    </tr>
    <tr>
    	<td>Name</td>
        <td colspan="3"><?=$visitor->title.'. '.$visitor->firstname.' '.$visitor->lastname?></td>
    </tr>
    <tr>
    	<td>Company</td>
        <td colspan="3"><?=$visitor->company?></td>
    </tr>
    <tr>
    	<td>Date</td>
        <td><?=date('d/m/Y', strtotime($visitor->arrival_date))?></td>
        <td>Time in</td>
        <td><?=$visitor->arrival_time?></td>
    </tr>
</table>
<div class="footer">
    <div class="fleft">Please return this pass to reception on departure</div>
    <div class="fright">Please note information on the reverse of pass</div>
</div>
</body>
</html>