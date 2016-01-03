<div class="navbar-header">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>
    <a class="navbar-brand" href="#">Login</a>
</div>
<div id="navbar" class="navbar-collapse collapse">

        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>


    <table>

        <tr>
            <td>Username: </td>
            <td> <div class="form-group">
                    <?php

                    echo $this->Form->input('user_name', array("label" => false, "div"=>false, "class" => false)); ?></div>

              </td>
        </tr>
        <tr>
            <td>Password: </td>
            <td> <div class="form-group">  <?php

                echo $this->Form->input('user_pass', array("label" => false, "div"=>false, "class" => false));  ?> </div>

            </td>
</tr>
<tr>
    <td rowspan="1"><br /></td> </tr>
    <td colspan="1"><?php echo $this->Form->end('Login'); ?>
    </td>
</tr>
</table>





</div><!--/.navbar-collapse -->


<!-- http://stackoverflow.com/questions/10472998/cakephp-display-form-elements-inline   -->