<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php __('Edit User'); ?></legend>


        <table>

            <tr>
                <td>User ID:</td>
                <td> <div class="form-group">
                        <?php

                        echo $this->Form->input('user_id', array("label" => false, "div"=>false, "class" => false)); ?></div>

                </td>
            </tr>
            <tr>
                <td>User Alias:</td>
                <td> <div class="form-group">  <?php

                        echo $this->Form->input('user_name', array("label" => false, "div"=>false, "class" => false));  ?> </div>

                </td>
            </tr>

            <tr>
                <td>Password:</td>
                <td> <div class="form-group">  <?php

                        echo $this->Form->input('user_pass', array("label" => false, "div"=>false, "class" => false, 'type' => 'password'));  ?> </div>

                </td>
            </tr>

            <tr>
                <td>Email:</td>
                <td> <div class="form-group">  <?php

                        echo $this->Form->input('user_email', array("label" => false, "div"=>false, "class" => false));  ?> </div>

                </td>
            </tr>



            <tr>
                <td>Given Name: </td>
                <td> <div class="form-group">  <?php

                        echo $this->Form->input('first_name', array("label" => false, "div"=>false, "class" => false));  ?> </div>

                </td>
            </tr>


            <tr>
                <td>Last Name: </td>
                <td> <div class="form-group">  <?php

                        echo $this->Form->input('last_name', array("label" => false, "div"=>false, "class" => false));  ?> </div>

                </td>
            </tr>

            <tr>
                <td>Address: </td>
                <td> <div class="form-group">  <?php

                        echo $this->Form->input('address', array("label" => false, "div"=>false, "class" => false));  ?> </div>



                </td>
            </tr>


            <tr>
                <td rowspan="1"><br /></td> </tr>
            <td colspan="1"><?php echo $this->Form->end('Submit'); ?>
            </td>
            </tr>
        </table>

<?php

//echo $this->Form->input('role_id', array('type' => 'select', 'options' => array(1 => 'Registered User', 2 => 'Administrator', null => "Super User/ Manager")));
//
//
// ?>

</div>
