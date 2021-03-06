<?php include_once('header1.php'); ?>

<?php include_once('nav1.php'); ?>

<!-- Main -->
<br>
<div class="container">
  
  <!-- upper section -->
  <div class="row">
    <div class="col-sm-8 col-md-offset-2">
	   <div class="row">
			<div class="panel panel-success">
			  <div class="panel-heading"><h4><i class="fa fa-search" aria-hidden="true"></i>&nbsp; Search:</h4></div>
				<div class="panel-body">
				<form method="GET">
				<table border="0" style="border-collapse: separate; padding 10px; border-spacing: 10px 1px;"><tr><td>
					<input type="text" name="search" class="form-control" style="width:100%;" placeholder="Name or ID number" required autofocus></td><td>
					<button type="submit" class="btn btn-success">Go</button></td>
				</table>
				</form>
				To see all the graduates in a table, use our <a href="<?php echo base_url().'admin/list_view'; ?>">List View</a>!<br>
				<hr>
				<table border='0' style="border-collapse: separate; padding auto; border-spacing: 2px 2px; width: 100%;" >
				<?php 

				if(!empty($list)) {
					$now = time();
					$units = 1;
					foreach($list as $row) {	
					echo '<tr><td rowspan="2"><a href="'.base_url().'admin/search/'.$row->idnumber.'""><img src="'.base_url().'/images/'.$row->picture.'" width="70" height="70" style="border-radius:25px 25px;"></a></td>';
					echo '<td colspan="1">Name: <strong>'.$row->firstname.' '.$row->lastname.'</strong></td>';
					if(timespan(strtotime($row->lastupdate),$now,$units) == timespan(strtotime('0000-00-00'),$now,$units)) {
						echo '<td>Last update: <b>Not active</b></td></tr>';
					} else {
						echo '<td>Last update: <b>'.timespan(strtotime($row->lastupdate),$now,$units).' ago</b></td></tr>';
					}
					echo '<tr><td style="vertical-align:top;">Account Type: <i style="color:green;font-weight:bold;">Graduate/User</i></td>';
					echo '<td style="text-align: left; font-size: 12px;" colspan="2"><a href="'.base_url().'admin/search/'.$row->idnumber.'"><button class="btn btn-success"><i class="glyphicon glyphicon-search" style="font-size:12px;"></i> View full profile</button></a></td></tr><tr><td></tr>';
					}
				} elseif(!empty($vlist)) {
					$now = time();
					$units = 1;

					foreach($vlist as $row) {	
					echo '<tr><td rowspan="2"><a href="'.base_url().'admin/search/'.$row->idnumber.'""><img src="'.base_url().'/images/'.$row->picture.'" width="70" height="70" style="border-radius:25px 25px;"></a></td>';
					echo '<td colspan="1">Name: <strong>'.$row->firstname.' '.$row->lastname.'</strong></td>';
					
					if(timespan(strtotime($row->lastupdate),$now,$units) == timespan(strtotime('0000-00-00'),$now,$units)) {
						echo '<td>Last update: <b>Not active</b></td></tr>';
					} else {
						echo '<td>Last update: <b>'.timespan(strtotime($row->lastupdate),$now,$units).' ago</b></td></tr>';
					}
					echo '<tr><td style="vertical-align:top;">Account Type: <i style="color:red;font-weight:bold;">Validator</i></td>';
					echo '<td style="text-align: left; font-size: 12px;" colspan="2"><a href="'.base_url().'admin/search/'.$row->idnumber.'"><button class="btn btn-success"><i class="glyphicon glyphicon-search" style="font-size:12px;"></i> View full profile</button></a></td></tr><tr><td></tr>';
					}

				} else { 
					echo 'None found';
					}
				?>
				</table>
				</div><!--/panel-body-->
			</div><!--/panel-->		
       </div><!--/row-->
  	</div><!--/col-span-9-->
  </div><!--/row-->
  <!-- /upper section -->
  
</div><!--/container-->
<!-- /Main -->


<?php include_once('footer1.php'); ?>