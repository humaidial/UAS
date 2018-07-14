<?php
$controller = $this->router->fetch_class();
$level = $this->session->userdata('ap_level');
?>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo site_url(); ?>">
				<img alt="<?php echo config_item('web_title'); ?>" src="<?php echo config_item('img'); ?>logo_small.png">
			</a>
		</div>

		<p class="navbar-text">Anda login sebagai <?php echo $this->session->userdata('ap_level_caption'); ?></p>