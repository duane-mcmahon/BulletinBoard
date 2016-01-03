<div class="topics form">
<?php echo $this->Form->create('Topic');?>
	<fieldset>
		<legend><?php __('Edit Topic'); ?></legend>
	<?php
		echo $this->Form->input('topic_id');
		echo $this->Form->input('topic_subject');
		echo $this->Form->input('topic_date');
    echo $this->Form->input('topic_cat', array('type' => 'hidden'));
    echo $this->Form->input('topic_by', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
