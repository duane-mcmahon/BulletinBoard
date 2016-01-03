<div class="topics form">
    <?php echo $this->Form->create('Topic');?>
    <fieldset>
        <legend><?php __('Add Topic'); ?></legend>

        <table class="table">

            <tr>
                <td>Subject:</td>
                <td> <div class="form-group">
                        <?php
                        echo $this->Form->input('topic_subject', array("label" => false, "div"=>false, "class" => false, 'type' => 'text',  'value'=>'', 'autocomplete'=>'off')); ?> </div>

                    <div class="form-group"></td>
            </tr>
            <tr>
                <td>Category:</td>
                <td>  <div class="form-group"> <?php

                    echo $this->Form->input('topic_cat', array("label" => false, "div"=>false, "class" => false,
                        'options' => $pagecontent));  ?> </div></td>
</tr>
<tr>
<td>
    <div class="form-group">

        <?php
        $currentdatetime = date('Y-m-d H:i:s');

        echo $this->Form->input('topic_date', array('type' => 'hidden', 'value' => $currentdatetime));
        ?>


    </div>


</td>


    </tr>
<td><?php echo $this->Form->end('Submit', true); ?>
</td>
</tr>
</table>


</div>