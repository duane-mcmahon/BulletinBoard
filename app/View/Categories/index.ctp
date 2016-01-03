<div class="categories index">
	<h2><?php __('Categories');?></h2>
	<table cellpadding="0" cellspacing="0" class="table">
	<tr>
			<th><?php echo $this->Paginator->sort('cat_id');?></th>
			<th><?php echo "Category Name";?></th>
			<th><?php echo "Description";?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($categories as $category):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
        <td><font color="#dc143c"><?php echo $category['Category']['cat_id']; ?></font></td>
        <td><?php echo $category['Category']['cat_name']; ?></td>
        <td><?php echo $category['Category']['cat_description']; ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $category['Category']['cat_id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $category['Category']['cat_id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $category['Category']['cat_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $category['Category']['cat_id'])); ?>
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
</div>
