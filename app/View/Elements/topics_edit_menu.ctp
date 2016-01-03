<div id="avmenu">
    <h2 class="hide">Menu:</h2>

    <div class="actionable">
        <h3><?php __('Actions'); ?></h3>
        <ul>

            <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Topic.topic_id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Topic.topic_id'))); ?></li>
            <li><?php echo $this->Html->link(__('Back', true), 'javascript:window.history.back()'); ?> </li>
            <li><?php echo $this->Html->link(__('Home', true), array('controller' => 'pages', 'action' => 'display')); ?></li>
        </ul>
    </div>

    <div class="announce">
        <h3>Whats new ?</h3>

        <p><strong>4 Janvier , 2007:</strong><br/>
            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </p>

        <p class="textright"><a href="index.html">More Info...</a></p>
    </div>
</div>