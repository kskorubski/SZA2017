<?php 
switch ($_GET['metoda']) {
      case 2: 
            Yii::app()->session['ankieta-id-audytu']=$_GET['id_audytu'];
            $this->redirect(Yii::app()->createUrl('audytor/edit_analogowa'));
      break;
  
      case 3:
            Yii::app()->session['ankieta-id-audytu']=$_GET['id_audytu'];
            $this->redirect(Yii::app()->createUrl('audytor/edit_cyfrowa'));
      break;
  
  
            } 
?>