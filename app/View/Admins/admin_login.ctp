<div class="login-box">
	<div class="icons">
		<?php echo $this->Html->link('<i class="halflings-icon home"></i>','/',array('escape' => false)); ?>
		<a href="#"><i class="halflings-icon cog"></i></a>
	</div>
	<h2>Login to your account</h2>
	<?php echo $this->Session->flash();?>	
	 <?php echo $this->Form->create('Admin',array('url'=>array('controller'=>'Admins','action'=>'login'),'inputDefaults'=>array('label'=>false,'div'=>false,'novalidate'=>true))); ?>
		<fieldset>
			
			<div class="input-prepend" title="Email">
				<span class="add-on"><i class="halflings-icon user"></i></span>	
				<?php echo $this->Form->input('email',array(
				'class'=>'input-large span10',
				'placeholder' => 'Enter email'
				)); ?>
			</div>
			<div class="clearfix"></div>

			<div class="input-prepend" title="Password">
				<span class="add-on"><i class="halflings-icon lock"></i></span>
				<?php echo $this->Form->input('password',array(
				'class'=>'input-large span10',
				'placeholder' => 'Enter password'
				)); ?>
			</div>
			<div class="button-login">	
				<?php echo $this->Form->input(__('Login'),array(
				'class'=>'btn btn-primary',
				'type' => 'submit'
				)); ?>
			</div>
			<div class="clearfix"></div>
	<?php echo $this->Form->end(); ?>
		
</div>