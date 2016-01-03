<div class="categories view">
<h2><?php  __('Category');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cat Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo "Category Name: "; ?>
			<?php echo $category['Category']['cat_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cat Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo "Description: "; ?>
			<?php echo $category['Category']['cat_description']; ?>
			&nbsp;
		</dd>

        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cat Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo "ID: "; ?>
            <?php echo $category['Category']['cat_id']; ?>
            &nbsp;
        </dd>

	</dl>
</div>

<div class="related">
	<h3><?php __('Related Topics');?></h3>
	<?php if (!empty($category['CategoryTopics'])):?>
	<table cellpadding = "0" cellspacing = "0" class="table">
	<tr>
		<th><?php __('Topic Id'); ?></th>
		<th><?php __('Topic Subject'); ?></th>
		<th><?php __('Topic Date'); ?></th>
		<th><?php __('Topic Cat'); ?></th>
		<th><?php __('Topic By'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($category['CategoryTopics'] as $categoryTopics):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $categoryTopics['topic_id'];?></td>
			<td><?php echo $categoryTopics['topic_subject'];?></td>
			<td><?php echo $categoryTopics['topic_date'];?></td>
			<td><?php echo $categoryTopics['topic_cat'];?></td>
			<td><?php echo $categoryTopics['topic_by'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'topics', 'action' => 'view', $categoryTopics['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'topics', 'action' => 'edit', $categoryTopics['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'topics', 'action' => 'delete', $categoryTopics['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $categoryTopics['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
