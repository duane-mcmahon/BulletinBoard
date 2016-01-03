<div class="users form">

<?php echo $this->Form->create('User');
	echo "<fieldset>";
		echo "<legend> User Registration </legend>"?>
	<?php

        $currentdatetime = date('Y-m-d H:i:s');

		echo $this->Form->input('user_name', array('type' => 'text', 'autocomplete'=>'off'));

		echo $this->Form->input('user_pass', array('type'=>'password', 'autocomplete'=>'off'));

		echo $this->Form->input('user_email', array('type'=>'email', 'value'=>'', 'autocomplete'=>'off'));

        echo $this->Form->input('user_membership_date', array('type' => 'hidden', 'value' => $currentdatetime));

		echo $this->Form->input('last_name', array('type' => 'text',  'value'=>'', 'autocomplete'=>'off'));

		echo $this->Form->input('first_name', array('type' => 'text',  'value'=>'', 'autocomplete'=>'off'));

		echo $this->Form->input('address', array('type' => 'text',  'value'=>'', 'autocomplete'=>'off'));

        echo $this->Form->input('role_id', array('type' => 'hidden', 'value' => '1'));

	?>

    <?php echo "</fieldset>"; ?>

    <?php echo $this->Form->end(__('Submit', true));?>

    </div>
