<div class="users view">

<h2><?php  __('User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php echo __('User Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['user_id']; ?>
			&nbsp;
		</dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php echo __('User Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['user_name']; ?>
			&nbsp;
		</dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php echo __('User Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['user_email']; ?>
			&nbsp;
		</dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php echo __('User Membership Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo substr($user['User']['user_membership_date'], 0, 10); ?>
			&nbsp;
		</dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php echo __('Last Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['last_name']; ?>
			&nbsp;
		</dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php echo __('First Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['first_name']; ?>
			&nbsp;
		</dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php echo __('Address'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['address']; ?>
			&nbsp;
		</dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php echo __('User Level'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php switch ($user['User']['role_id']) {

                case 1:
                    echo "Registered User";
                    break;
                case 2:
                    echo "Administrator";
                    break;
                default:
                    echo "Manager";

            }; ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
    <h3><?php echo __('Posts'); ?></h3>
    <?php if (!empty($user['Post'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
        <th><?php echo __('Post Id'); ?></th>
        <th><?php echo __('Post Content'); ?></th>
        <th><?php echo __('Post Date'); ?></th>
        <th><?php echo __('Post Topic'); ?></th>


        <th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
    foreach ($user['Post'] as $contributions):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $contributions['post_id'];?></td>
            <td><?php echo substr($contributions['post_content'], 0, 100) . "...";?></td>
            <td><?php echo substr($contributions['post_date'], 0, 10);?></td>
			<td><?php echo $contributions['post_topic'];?></td>

            <td class="actions">
                <?php echo $this->Html->link(__('View', true), array('controller' => 'posts', 'action' => 'view', $contributions['post_id'])); ?>
                <?php echo $this->Html->link(__('Edit', true), array('controller' => 'posts', 'action' => 'edit', $contributions['post_id'])); ?>
                <?php echo $this->Html->link(__('Delete', true), array('controller' => 'posts', 'action' => 'delete', $contributions['post_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contributions['post_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
