

<h1>Tymczasowa strona debugowania - Debug </h1>

PODAMIANA WOJEWODZTWA
<h2><?php
$model = Uzytkownicy::model()->findByPk(Yii::app()->user->id); //tutaj id usera z tabeli
//$model = new Uzytkownicy();
echo Wojewodztwa::model()->findByPk($model->WojewodztwaID)->nazwa_wojewodztwa.'<-tutaj';
echo Wojewodztwa::model()->findByPk($model->WojewodztwaID)->nazwa_wojewodztwa;


?></h2>

<!-- CWebUser Yii::app()->user-> ---------------------------------------------------------------- -->
Yii::app()->user->name - Returns the unique identifier for the user (e.g. username).
<h2><?php echo Yii::app()->user->name; ?></h2>

Yii::app()->user->id - Returns a value that uniquely represents the user.
<h2> <?php echo Yii::app()->user->id; ?></h2>

Yii::app()->user->isGuest 
<h2> <?php echo Yii::app()->user->isGuest===null?Yii::app()->user->isGuest:'null - nie jest gościem'; ?></h2>

Yii::app()->user->guestName - the name for a guest user.
<h2> <?php echo Yii::app()->user->guestName; ?></h2>

Yii::app()->user->loginUrl - Returns the URL that the user should be redirected to after successful login.
<h2> <?php echo Yii::app()->user->loginUrl; ?></h2>

Yii::app()->user->stateKeyPrefix - a prefix for the name of the session variables storing user session data.
<h2> <?php echo Yii::app()->user->stateKeyPrefix; ?></h2>

Yii::app()->user->returnUrl - Returns the URL that the user should be redirected to after successful login.
<h2> <?php echo Yii::app()->user->returnUrl; ?></h2>



<!-- CController Yii::app()->  ---------------------------------------------------------------------------  -->
Yii::app()->name - the application name.
<h2> <?php echo Yii::app()->name; ?></h2>

Yii::app()->baseUrl - Returns the relative URL for the application. This is a shortcut method to CHttpRequest::getBaseUrl().
<h2> <?php echo Yii::app()->baseUrl; ?></h2>



<!-- CController, .\config\main.php,  Yii::app()->params['param']; ---------------------------------------- -->
Yii::app()->params['admin_email'] - application-level parameters - .\config\main.php
<h2> <?php echo Yii::app()->params['admin_email']; ?></h2>

Yii::app()->params['prawa_zastrz'] - application-level parameters - .\config\main.php
<h2> <?php echo Yii::app()->params['prawa_zastrz']; ?></h2>


<!-- SiteController(CController), w view!! $this->layout --------------------------------------------------------->
$this->layout -= SiteController
<h2><?php echo $this->layout ?></h2>

<!-- ------------------------------------------------------------------------------------------- -->

Yii::app()->request->baseUrl
<h2><?php echo Yii::app()->request->baseUrl; ?></h2>



session user_id

Yii::app()->session->getCount() - Liczba itemow w sesji.
<h2><?php echo Yii::app()->session->getCount(); ?></h2>   

Yii::app()->session->wszystko  
<?php 
     foreach(Yii::app()->session->getKeys() as $name=>$value)
         {
            $a1 = Yii::app()->session->get($value);
            echo '<h2>'.$name.'- '.$value.' - '.$a1.'</h2 /n>'; 
         }
?>  

echo 
<h2><?php echo Yii::app()->session['rok']; ?></h2>   



 
<!--
Yii::app()->session['var'] = 'value';
echo Yii::app()->session['var']; // Prints "value"

<h4> iterator === 
    <?php 
    
//    $iterator = Yii::app()->session->getIterator();
//    $iterator->next();
//    
//    $array = Yii::app()->session->toArray();
//    $arrayiter = new CListIterator($array);
//    $arrayiter->next();
//    
//    
//    echo 'a'.$arrayiter->valid().'</n>';
//    echo 'a'.$arrayiter->current().'</n>';
//    echo 'b'.$iterator->valid().'</n>';
//    echo 'b'.$iterator->current().'</n>';
    ?> 
</h4> 
-->