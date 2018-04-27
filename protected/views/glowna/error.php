<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Coś poszło nie tak... pracujemy nad naprawieniem tego błędu <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>