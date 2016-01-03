<div class="users form">
<?php echo $this->Form->create('Category');?>
	<fieldset>
		<legend><?php __('Add Category (Administrators only'); ?></legend>
	<?php
		echo $this->Form->input('cat_name',  array('type' => 'text', 'label' => 'Title',  'value'=>'', 'autocomplete'=>'off'));
		echo $this->Form->input('cat_description', array('type' => 'text', 'label' => 'Description',  'value'=>'', 'autocomplete'=>'off'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
