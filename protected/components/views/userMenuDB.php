
<!-- NOT IN USE!!!!!!!!!!!!!!-->
<ul>
	<li><?php echo CHtml::link('Create_user->isGuest',array('post/create')); ?></li>
	<li><?php echo CHtml::link('Manage_user->isGuest',array('post/admin')); ?></li>
	<li><?php echo CHtml::link('Approve_user->isGuest',array('comment/index')) . ' (' . Comment::model()->pendingCommentCount . ')'; ?></li>
        <li><?php echo CHtml::link('Mores_user->isGuest?',array('site/logout')); ?></li>
	<li><?php echo CHtml::link('Go  home!_user->isGuest',array('site/logout')); ?></li>
</ul>