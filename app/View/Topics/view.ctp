<div class="topics view">
<h2><?php  __('Topic');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo "Subject: "; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $topic['Topic']['topic_subject']; ?><br />
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo "Publication Date: "; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo substr($topic['Topic']['topic_date'], 0, -8); ?><br />
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo "Category: "; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $topic['Category']['cat_name']; ?><br />
			&nbsp;
		</dd>

	</dl>
</div>



	