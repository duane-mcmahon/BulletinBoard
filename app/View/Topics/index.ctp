<div class="topics index">
    <h2><?php __('Topics');?></h2>
    <table cellpadding="0" cellspacing="0" class="table">
        <tr>
            <th><?php echo $this->Paginator->sort('topic_id');?></th>
            <th><?php echo $this->Paginator->sort('topic_subject');?></th>
            <th><?php echo $this->Paginator->sort('topic_date');?></th>
            <th><?php echo $this->Paginator->sort('category');?></th>
            <th class="actions"><?php __('Actions');?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($topics as $topic):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class;?>>
                <td><font color="#dc143c"><?php echo $topic['Topic']['topic_id']; ?></font></td>
                <td><?php echo $topic['Topic']['topic_subject']; ?>&nbsp;</td>
                <td><?php echo substr($topic['Topic']['topic_date'], 0, 10); ?>&nbsp;</td>
                <td><?php echo $topic['Category']['cat_name']; ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View', true), array('action' => 'view', $topic['Topic']['topic_id'])); ?>
                    <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $topic['Topic']['topic_id'])); ?>
                    <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $topic['Topic']['topic_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $topic['Topic']['topic_id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
        ));
        ?>	</p>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
        | 	<?php echo $this->Paginator->numbers();?>
        |
        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
    </div>


    <div class="filters">
        <h3>Filters</h3>

        <?php
        echo $this->Form->create('Topic', array('action' => 'search'));
        if (!isset($searchQuery)) {
            $searchQuery = '';
        }
        echo "<fieldset><legend>Search Query</legend>";
        echo $this->Form->input('searchQuery', array('value' => h($searchQuery)));
        echo "</fieldset>";
        echo $this->Form->end(__('Search'));
        ?>

    </div>

</div>
