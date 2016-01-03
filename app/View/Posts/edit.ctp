<div class="posts form">
<?php echo $this->Form->create('Post');?>
	<fieldset>
		<legend><?php __('Edit Post'); ?></legend>
	<?php
		echo $this->Form->input('post_id');
		echo $this->Form->input('post_content');
        echo $this->Form->input('post_date', array('type' => 'hidden'));
        echo $this->Form->input('post_cat', array('type' => 'hidden'));
        echo $this->Form->input('Topic.topic_subject');
        echo $this->Form->input('Post.post_topic', array('type' => 'hidden'));
        echo $this->Form->input('post_by', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
