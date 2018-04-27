<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name)." ".CHtml::encode(Yii::app()->session['rok']); ?></div>
          
	</div><!-- header -->
<div id="mainMbMenu">
<?php $this->widget('application.extensions.mbmenu.MbMenu',array(
            'items'=>array(
//                array('label'=>'Start', 'url'=>array('/audytor/index')),
                
                array('label'=>'Audyty', 'url'=>array('/audytor/audyty'),
//                  'items'=>array(
//                    array('label'=>'sub 1 contact'),
//                    array('label'=>'sub 2 contact'),
//                  ),
                ),                
                
                array('label'=>'Odwołania', 'url'=>array('/audytor/odwolania'),
//                  'items'=>array(
//                    array('label'=>'sub 1 contact'),
//                    array('label'=>'sub 2 contact'),
//                  ),
                ),                 
                
//               array('label'=>'Rok ('.Yii::app()->session['rok'].')', 'url'=>array('/audytor/rok')),     
                
               array('label'=>'Wyloguj ('.Yii::app()->user->name.')', 'url'=>array('/glowna/logout'), 'visible'=>!Yii::app()->user->isGuest),
                
                

                
                
//                array('label'=>'Test2',
//                  'items'=>array(
//                    array('label'=>'Sub 1', 'url'=>array('/site/page','view'=>'sub1')),
//                    array('label'=>'Sub 2',
//                      'items'=>array(
//                        array('label'=>'Sub sub 1', 'url'=>array('/site/page','view'=>'subsub1')),
//                        array('label'=>'Sub sub 2', 'url'=>array('/site/page','view'=>'subsub2')),
//                      ),
//                    ),
//                  ),
//                ),
                
                
                
                
            ),
    )); ?>
	</div><!-- mainmenu -->
        
        
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by K.Skorubski<br/>
		<?php Yii::app()->params['prawa_zastrz']; ?><br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
