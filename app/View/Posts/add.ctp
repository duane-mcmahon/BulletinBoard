<div class="form-group">

<?php echo $this->Form->create('Post');?>
	<fieldset>
		<legend><?php __('Add Post'); ?></legend>
	<?php

        echo $this->Form->input('post_cat',
        array(
            'options' => $pagecontent,
            'label' => 'Category'
        ));

        echo $this->Form->input('Topic.topic_subject',  array(

            'label'=> 'Topic', array('label' => 'Topic', 'type' => 'text')));

            echo $this->Form->textarea('post_content', ['escape' => true, 'label' => 'Body', 'style'=>'width:100%; height:350px;']);

    ?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

