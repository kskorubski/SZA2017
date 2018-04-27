<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('glowna','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

//Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        //domysln strona glowna
	// 'baseUrl'=>array('glowna/index'),
	'name'=>'S.Z.A. Aplikacja',
        //tutaj ustawiam startowy/domyślny kontroler
        //'defaultController'=>'glowna',
    
        // jezyk
        'language'=>'pl',
    
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
//                'ext.eexcelview.*', 
//                'ext.ecsvexport.*', 
//                'ext.CSVExport.*'
	),
     
	'modules'=>array(
		'gii'=>array(
                    'generatorPaths' => array('bootstrap.gii'),
			'class'=>'system.gii.GiiModule',
			'password'=>'sza123',
			'ipFilters'=>array('127.0.0.1','::1','*.*,*.*'),
		),
	),

	// application components
	'components'=>array(
                'kalkulatorWyniku'=>array('class'=>'TWynikiAudytowMi'),
                'kalkulatorEtykiety'=>array('class'=>'TWynikiEtykiety'), //v 2017
                'CGridViewPlus' => array('class' => 'CGridViewPlus',),
                'CSVGenerator' => array('class' => 'CSVGenerator',),
          
            
		'user'=>array(
			'allowAutoLogin'=>false,
                        'autoUpdateFlash' => false,),
            
		'urlManager'=>array(
                        'showScriptName'=>true,
//			'rules'=>array('<view:(audyty|info|sitemap)>'=>'site'),
                    ),
                
            
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=sza',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',),
		
		'errorHandler'=>array(
			'errorAction'=>'glowna/error',),
            
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',),
				array(
					'class'=>'CWebLogRoute',),),),
            
            
  'ePdf' => array(
        'class'         => 'ext.yii-pdf.EYiiPdf',
        'params'        => array(
            'mpdf'     => array(
                'librarySourcePath' => 'application.vendor.mpdf.*',
                'constants'         => array(
                    '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                ),
                'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
            ),
            'HTML2PDF' => array(
                'librarySourcePath' => 'application.vendors.html2pdf.*',
                'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
                /*'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                    'orientation' => 'P', // landscape or portrait orientation
                    'format'      => 'A4', // format A4, A5, ...
                    'language'    => 'en', // language: fr, en, it ...
                    'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                    'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                    'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                )*/
            )
        ),
    ),
    //...
            
        ),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'prawa_zastrz'=>'Wszystkie prawa zastrzeżone!',
		'defaultPageSize' => 10,
	),
);