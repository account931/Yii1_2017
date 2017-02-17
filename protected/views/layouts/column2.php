<?php $this->beginContent('/layouts/main'); ?>




<div class="container">


	




<!------------------- Main block (can swap it)-------------->
<div class="span-18">
		<div id="content"><!--<p>hello from views/layouts/column2.php(+menu is  there)</p>-->
			<?php echo $content; ?> <!-- all  blogs  drom DB are extracted  here?= NO!!!!!!!!!!!!!!!-All content of  central -->
		</div><!-- content -->
</div>
<!-------------------- END Main block----------------------->








<!-----------------YET LEFT SIdeBar (can swap it)------------------------>

	<div class="span-6 last">
		<div id="sidebar">

			<?php /*if(!Yii::app()->user->isGuest) {*/          $this->widget('UserMenu');        /*}*/
                               //mine  Edit=>dispaly  an alternative  menu  for  non authorized  visitors; 
                                    /*else {$this->widget('UserMenuDB');}*/
                                 //if(Yii::app()->user->isGuest) {$this->widget('UserMenuDB');}
                              // END mine  Edit=>dispaly  an alternative  menu  for  non authorized  visitors; 
                           ?>


     

    

			
			
		</div><!-- sidebar -->
	</div>

<!-----------------END LEFT SIdeBar----------------------->





















</div><!--container-->


<?php $this->endContent(); ?>