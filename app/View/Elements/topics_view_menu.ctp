<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <h2>Menu:</h2>
        </li>
        <li><?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $topic['Topic']['topic_id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $topic['Topic']['topic_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $topic['Topic']['topic_id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Create a Post', true), array('controller' => 'posts', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Search Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Home', true), array('controller' => 'pages', 'action' => 'display')); ?></li>
        <li><?php echo $this->Html->link(__('Back', true), 'javascript:window.history.back()'); ?> </li>

        <?php if ($this->Session->read('Auth.User')) {

            echo "<li>";
            echo $this->Html->link(__('Edit Account', true), array('controller' => 'users', 'action' => 'edit', (AuthComponent::user('user_id'))));
            echo "</li>";

        } ?>
    </ul>




</div>
<!-- /#sidebar-wrapper -->