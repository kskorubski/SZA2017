<?php /* @var $this Controller */ ?>
<?php //2014-08-18_KS?>
<?php include "TWynikiAudytow.php"; ?>   
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
                array('label'=>'Start', 'url'=>array('/administrator/index')),
                
         array('label'=>'Użytkownicy',
                  'items'=>array(
                    array('label'=>'Konta użytkowników',
                      'items'=>array(
                        array('label'=>'Utwórz nowe konto', 'url'=>array('/administrator/uzytkownicy_dodaj')),
                        array('label'=>'Zarządzaj kontami', 'url'=>array('/administrator/uzytkownicy_lista')),
                      ),
                    ),
                   array('label'=>'Zespoły audytorów',
                      'items'=>array(
                        array('label'=>'Utwórz/Edytuj zespół', 'url'=>array('/administrator/uzytkownicy_zespolyaud_dodaj_edytuj')),
                        array('label'=>'Zarządzaj zespołami', 'url'=>array('/administrator/uzytkownicy_zespolyaud_przypisz')),
                      ),
                    ),                      
                  ),
                ),                

                
         array('label'=>'Baza danych',
                  'items'=>array(
                    array('label'=>'Ośrodki',
                      'items'=>array(
                        array('label'=>'Utwórz nowy ośrodek', 'url'=>array('/administrator/osrodek_utworz')),
                        array('label'=>'Zarządzaj ośrodkami', 'url'=>array('/administrator/osrodek_lista')),
                      ),
                    ),
                   array('label'=>'Województwa',
                      'items'=>array(
//                        array('label'=>'Nadaj numery', 'url'=>array('/administrator/woj_dodaj_numer')),
                        array('label'=>'Zarządzaj numerami', 'url'=>array('/administrator/woj_zarzadzaj_numerami')),
                      ),
                    ),                      
                  ),
                ),   
                
                array('label'=>'Audyty', 
                  'items'=>array(
                    array('label'=>'Utwórz zestaw', 'url'=>array('/administrator/aud_utworz_zestaw')),
                    array('label'=>'Wypełnij etykiete', 'url'=>array('/administrator/aud_etykiety')),
                    array('label'=>'Przypisz zestaw', 'url'=>array('/administrator/aud_przypisz_zestaw')), 
                  ),
                ), 
                
                array('label'=>'Odwołania', 
                  'items'=>array(
//                    array('label'=>'Utwórz odwołanie', 'url'=>array('/administrator/odwolania_utworz_odwolanie')),
                    array('label'=>'Utwórz odwołanie', 'url'=>array('/administrator/odwolania_przypisz_zestaw')),
                  ),
                ),  
                array('label'=>'Raporty',
                  'items'=>array(
                   
//                      'items'=>array(
                        array('label'=>'Wyniki Audyty Aktywne', 'url'=>array('/administrator/raport_wyniki_audyt_aktywne')),      
                        array('label'=>'Wyniki Audytów', 'url'=>array('/administrator/raport_wyniki_audyt')),
                        array('label'=>'Wyniki Odwołań', 'url'=>array('/administrator/raport_wyniki_audyt_odwolanie')),                      
                        array('label'=>'Eksport wyników',
                            'items'=>array(
                                array('label'=>'Wyniki audytów wszystkich ', 'url'=>array('/administrator/_view_raport_ocenione_wszystkie'), 'itemOptions'=>array('class'=>'menu-raporty')),
                                array('label'=>'Wyniki audytów wg punktacji', 'url'=>array('/administrator/_view_raport_wg_punktacji'), 'itemOptions'=>array('class'=>'menu-raporty')),  
                                array('label'=>'Wyniki audytów wg parametrów', 'url'=>array('/administrator/_view_raport_wg_parametrow'), 'itemOptions'=>array('class'=>'menu-raporty')),  
                                array('label'=>'Wyniki w województwach', 'url'=>array('/administrator/_view_raport_wojewodztwa'), 'itemOptions'=>array('class'=>'menu-raporty')),  
                                array('label'=>'Wyniki w województwach wg parametrów', 'url'=>array('/administrator/_view_raport_wojewodztwa_wg_parametrow'), 'itemOptions'=>array('class'=>'menu-raporty')),  
                                array('label'=>'Wyniki w województwach wg liczby zal. parametrów', 'url'=>array('/administrator/_view_raport_wojewodztwa_wg_l_zal_parametrow'), 'itemOptions'=>array('class'=>'menu-raporty')),  
                        array('label'=>'Wyniki INNE', 'itemOptions'=>array('class'=>'menu-raporty'),
                            'items'=>array(
                                array('label'=>'Dane dot. audytorów ', 'url'=>array('/administrator/_view_raport_dane_dot_audytorow'), 'itemOptions'=>array('class'=>'menu-raporty')),
                                array('label'=>'Dane audytorów ostrość ', 'url'=>array('/administrator/_view_raport_audytorow_ostrosc'), 'itemOptions'=>array('class'=>'menu-raporty')),
                                
                                ),                                                                
                              ),  
                             ),
                            ),
                      
//                   array('label'=>'Zespoły audytorów',
//                      'items'=>array(
//                        array('label'=>'Utwórz/Edytuj zespół', 'url'=>array('/administrator/uzytkownicy_zespolyaud_dodaj_edytuj')),
//                        array('label'=>'Zarządzaj zespołami', 'url'=>array('/administrator/uzytkownicy_zespolyaud_przypisz')),
//                      ),
//                    ),                      
                  ),
                ),       
                array('label'=>'Rok ('.Yii::app()->session['rok'].')',
                  'items'=>array(
//                    array('label'=>'Utwórz odwołanie', 'url'=>array('/administrator/odwolania_utworz_odwolanie')),
                    array('label'=>'Przeloguj na rok 2014', 'url'=>array('/administrator/rok')),
                    array('label'=>'Przeloguj na rok 2015', 'url'=>array('/administrator/rok2015')),
                    array('label'=>'Przeloguj na rok 2016', 'url'=>array('/administrator/rok2016')),  
                  ),
                ),
//                array('label'=>'Rok ('.Yii::app()->session['rok'].')', 'url'=>array('/administrator/rok')),     
                
                array('label'=>'Wyloguj ('.Yii::app()->user->name.')', 'url'=>array('/administrator/logout'), 'visible'=>!Yii::app()->user->isGuest),
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
