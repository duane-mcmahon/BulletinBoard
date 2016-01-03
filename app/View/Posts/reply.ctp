<div class="form-group">

    <?php echo $this->Form->create('Post', array('role' => 'form')); ?>
    <fieldset>
        <legend><?php __('Add Reply'); ?></legend>

            <?php

            //echo $this->Form->input('Topic.topic_subject',  array(
            //  'label'=> 'Post Topic'));
            echo $this->Form->textarea('post_content', ['escape' => true, 'style'=>'width:100%; height:350px;']);


            ?>



    </fieldset>
    <?php echo $this->Form->end(__('Submit', true));?>
</div>

