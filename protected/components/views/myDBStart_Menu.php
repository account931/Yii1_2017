<ul>
	<li><?php echo CHtml::link('111,array('post/create')); ?></li>
	<li><?php echo CHtml::link('222',array('post/admin')); ?></li>
	<li><?php echo CHtml::link('Approve your Comments',array('comment/index')) . ' (' . Comment::model()->pendingCommentCount . ')'; ?></li>
        <li><?php echo CHtml::link('3333?',array('site/logout')); ?></li>
	<li><?php echo CHtml::link('44444!',array('site/logout')); ?></li>
</ul>