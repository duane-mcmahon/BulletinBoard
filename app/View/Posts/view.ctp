<div class="posts view">
<h2><?php  __('Post'); ?></h2>

	<dl><?php $i = 0; $class = ' class="altrow"';?>


        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php echo 'Post Content: '; ?></dt>

        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $post['Post']['post_content']; ?><br/>
            &nbsp;
        </dd>


        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php echo 'Author: '; ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $post['User']['user_name']; ?><br/>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo 'Post Category: '; ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $post['Category']['cat_name']; ?><br />
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo 'Post Topic: '; ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $post['Topic']['topic_subject']; ?><br />
            &nbsp;
        </dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo 'Post Date: '; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo substr($post['Post']['post_date'], 0, 10); ?><br/>
			&nbsp;
		</dd>
        <?php if ($post['Post']['parent_id'] != null){ ?>


        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo 'Replies to: '; ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
                <?php echo "Post ID: "; ?>
            <?php echo $post['Post']['parent_id']; ?><br />
            &nbsp;
        </dd>


       <?php  }   ?>



        <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo 'Replies'; ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php

            foreach ($replies as $reply):

                echo "Post ID: " . $reply['Post']['post_id'];
                echo "<br />";
                echo "User Name: " . $reply['User']['user_name'];
                echo "<br />";
                echo "Date of publication: " . $reply['Post']['post_date'];
                echo "<br />";
                echo "<br />";
            endforeach;


            ?>
            &nbsp;
        </dd>
	</dl>
</div>

	<div class="related">
		<h3><?php __('Related Topics');?></h3>
	<?php if (!empty($post['PostTopic'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Topic Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $post['PostTopic']['topic_id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Topic Subject');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $post['PostTopic']['topic_subject'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Topic Date');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $post['PostTopic']['topic_date'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Topic Cat');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $post['PostTopic']['topic_cat'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Topic By');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $post['PostTopic']['topic_by'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>

	</div>
	