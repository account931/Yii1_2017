<?php
// it  is  a  view  for LOGGED  users (myAdd menu).If  a  used  is  not  logged  it  shows-  view->pages-addmine.php

echo "<h1>Mark your  time, wait Google Docs  to load </h1>";

echo CHtml::encode("Hello, ".Yii::app()->user->name);

?>


<!--<script>$("#testLoad").load("http://www.google.com");</script>-->
<div id="testLoad" style="width:98%;height:600px;">r</div>

<script>
        $("#testLoad").html('<object style ="width:98%;height:200%;" data=" http://example2.esy.es/myWazeTime/index.php?user= "/>');
</script>