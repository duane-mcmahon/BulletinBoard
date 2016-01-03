<div class="users index">
	<h2><?php __('Users');?></h2>
	<table cellpadding="0" cellspacing="0" class="table">
	<tr>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('user_name');?></th>
			<th><?php echo $this->Paginator->sort('user_email');?></th>
			<th><?php echo $this->Paginator->sort('user_membership_date');?></th>
			<th><?php echo $this->Paginator->sort('last_name');?></th>
			<th><?php echo $this->Paginator->sort('first_name');?></th>
        <th><?php if (AuthComponent::user('role_id') == 2) echo $this->Paginator->sort('address'); ?></th>
        <th><?php echo $this->Paginator->sort('role_id'); ?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
        <td><font color="#dc143c"><?php echo $user['User']['user_id']; ?></font></td>
        <td><?php echo $user['User']['user_name']; ?></td>
		<td><?php echo $user['User']['user_email']; ?>&nbsp;</td>
        <td><?php echo substr($user['User']['user_membership_date'], 0, 10); ?></td>
        <td><?php echo $user['User']['last_name']; ?></td>
        <td><?php echo $user['User']['first_name']; ?></td>
        <td><?php if (AuthComponent::user('role_id') == 2) echo $user['User']['address']; ?></td>
        <td><?php switch ($user['User']['role_id']) {

                case 1:
                    echo "Registered User";
                    break;
                case 2:
                    echo "Administrator";
                    break;
                default:
                    echo "Manager";

            }; ?>&nbsp;</td>
        <td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $user['User']['user_id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['user_id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['user_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['user_id'])); ?>
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
