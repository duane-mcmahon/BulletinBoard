<div class="posts index">
    <h2><?php __('Posts');
        //print_r($posts);
        ?></h2>
	<table cellpadding="0" cellspacing="0" class="table">
	<tr>
        <th><?php //echo $this->Paginator->sort('post_id');?></th>
			<th><?php echo $this->Paginator->sort('post_content');?></th>
        <th><?php echo $this->Paginator->sort('post_date', 'Date'); ?></th>
			<th><?php echo $this->Paginator->sort('post_topic');?></th>
            <th><?php echo $this->Paginator->sort('category');?></th>
			<th><?php echo $this->Paginator->sort('post_by');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php

	$i = 0;
	foreach ($posts as $post):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
        <td><font color="#dc143c"><?php echo $post['Post']['post_id']; ?></font></td>
        <td><?php echo substr($post['Post']['post_content'], 0, 130) . "..."; ?></td>
        <td><?php echo substr($post['Post']['post_date'], 0, 4); ?></td>
        <td><?php echo $post['Topic']['topic_subject']; ?></td>
        <td><?php echo $post['Category']['cat_name']; ?></td>
        <td><?php echo $post['User']['user_name']; ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $post['Post']['post_id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $post['Post']['post_id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $post['Post']['post_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $post['Post']['post_id'])); ?>
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

	<div class="pagination">
        <ul>

            <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
            |
            <?php echo $this->Paginator->numbers();?>
            |
            <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>


        </ul>

	</div>
<br />

    <div class="filters">
        <h3>Filters</h3>

        <?php
        echo $this->Form->create('Post', array('action' => 'search'));

        if (!isset($searchQuery)) {
            $searchQuery = '';
        }
        echo "<fieldset><legend>Category Query</legend>";
        echo $this->Form->input('categoryQuery',array('type'=>'select', 'label' => 'Category', 'empty' => '--select--', 'required' => 'true', 'options'=> $states));
        echo "</fieldset>";
        echo "<fieldset><legend>Search Query</legend>";
        echo $this->Form->input('searchQuery', array('type' => 'search', 'label' => 'Search Term', 'value'=>'', 'autocomplete'=>'off'));
        echo "</fieldset>";
        echo "<br />";
        echo "<br />";
        //<!-- A range of year(s) -->

        echo "<br />";echo "<br />";
        echo "<fieldset><legend>Date Query</legend>";
        echo $this->Form->input('Earliest:', array('type' => 'range', 'name' => 'range_input', 'id' => 'range_input', 'min' => substr($dates[0][0]['earliest'], 0, 4), 'max' => substr($dates[0][0]['latest'], 0, 4),
            'value' => substr($dates[0][0]['earliest'], 0, 4), 'oninput' => 'earliest.value=range_input.value'));

        echo "<output name='earliest' id='earliest' for='range_input'>" . substr($dates[0][0]['earliest'], 0, 4) . "</output>";
        echo "<br />";echo "<br />";
        echo $this->Form->input('Latest:', array('type' => 'range', 'name' => 'range_input2', 'id' => 'range_input2', 'min' => substr($dates[0][0]['earliest'], 0, 4), 'max' => substr($dates[0][0]['latest'], 0, 4),
            'value' => substr($dates[0][0]['latest'], 0, 4), 'oninput' => 'latest.value=range_input2.value'));

        echo "<output name='latest' id='latest' for='range_input2'>" . substr($dates[0][0]['latest'], 0, 4) . "</output></fieldset>";
        echo "<br />";echo "<br />";

        echo $this->Form->end(__('Search'));
        ?>

    </div>

</div>