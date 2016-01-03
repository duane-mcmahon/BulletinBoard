

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h2>Menu:</h2>
            </li>
            <li><?php echo $this->Html->link(__('Search Posts', true), array('controller' => 'posts', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Search Topics', true), array('controller' => 'topics', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Search Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Create a Post', true), array('controller' => 'posts', 'action' => 'add')); ?></li>
            <?php if ($this->Session->read('Auth.User')) {

                echo "<li>";
                echo $this->Html->link(__('Edit Account', true), array('controller' => 'users', 'action' => 'edit', (AuthComponent::user('user_id'))));
                echo "</li>";

            } ?>
        </ul>




    </div>
    <!-- /#sidebar-wrapper -->