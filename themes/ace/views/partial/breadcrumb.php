<script type="text/javascript">
	try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
</script>

<ul class="breadcrumb">
	<li>
		<i class="icon-home home-icon"></i>
		<a href="#">Dashboard</a>
	</li>
	<?php
	if(!empty($data)){
		foreach($data as $key=>$value){
			$name = @$value['name'];
			if(!empty($value['active']) && $value['active'] == true){
				echo "<li class='active'>{$name}</li>";
			}else{
				$url = @$value['url'];
				echo "<li><a href='{$url}'>{$name}</a></li>";
			}
		}
	}
	?>
	
</ul>