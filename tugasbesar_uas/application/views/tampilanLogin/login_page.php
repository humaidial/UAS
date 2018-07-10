<?php $this->load->view('include/header'); ?>

<div class="container-fluid">
	<div class="login-panel">
		<center>
			<img src="<?php echo config_item('img'); ?>logo" />
		</center>
		<div class='panel panel-default'>
			<div class='panel-body'>
				<?php echo form_open('tampilanLogin', array('id' => 'FormLogin')); ?>
					<div class="form-group">
						<label>Username</label>
						<div class="input-group">
							<div class="input-group-addon">
								<span class='glyphicon glyphicon-user'></span>
							</div>
							<?php 
							echo form_input(array(
								'name' => 'username', 
								'class' => 'form-control', 
								'autocomplete' => 'off', 
								'autofocus' => 'autofocus'
							)); 
							?>
						</div>
					</div>
					<div class="form-group">
						<label>Password</label>
						<div class="input-group">
							<div class="input-group-addon">
								<span class='glyphicon glyphicon-lock'></span>
							</div>
							<?php 
							echo form_password(array(
								'name' => 'password', 
								'class' => 'form-control', 
								'id' => 'InputPassword'
							)); 
							?>
						</div>
					</div>

					<button type="submit" class="btn btn-primary">
						<span class='glyphicon glyphicon-log-in' aria-hidden="true"></span> Sign In
					</button>
					<button type="reset" class="btn btn-default" id='ResetData'>Reset</button>
				<?php echo form_close(); ?>

				<div id='ResponseInput'></div>
			</div>
		</div>
		<p class='footer'><?php echo config_item('web_footer'); ?></p>
	</div>
</div>