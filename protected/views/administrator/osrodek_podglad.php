<h2>Dane ośrodka.</h2>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
		'nazwa',
		'adres',
		'kod',
		'miasto',
		 array('name'=> 'Województwo:', 
                       'value' => Wojewodztwa::model()->findByPk($model->WojewodztwaID)->nazwa_wojewodztwa),
	),
)); ?>

      <div class="row buttons">
        <?php echo CHtml::button('Edytuj', array('submit' => Yii::app()->createUrl("/administrator/osrodek_edytuj", array("id"=> $model->id))  )); ?>
	<?php echo CHtml::button('Lista ośrodków', array('submit' => Yii::app()->createUrl("/administrator/osrodek_lista")  )); ?>
      </div>