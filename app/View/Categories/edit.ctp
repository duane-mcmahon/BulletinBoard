<div class="categories form">
<?php echo $this->Form->create('Category');?>
	<fieldset>
		<legend><?php __('Edit Category'); ?></legend>
	<?php
		echo $this->Form->input('cat_id');
		echo $this->Form->input('cat_name');
		echo $this->Form->input('cat_description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actionable">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Category.cat_id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Category.cat_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Topics', true), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category Topics', true), array('controller' => 'topics', 'action' => 'add')); ?> </li>
	</ul>
</div>