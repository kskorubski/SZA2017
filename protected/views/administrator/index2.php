<page><h1>Exemple d'utilisation</h1></page>

<?php

///opt/lampp/htdocs/sza/protected/extensions/yii-pdf/MPDF57
//include('../mpdf.php');
//require_once('../sza/protected/extensions/yii-pdf/MPDF57/mpdf.php');
//$mpdf=new mPDF();
//
//
//
//
//
//$mpdf->WriteHTML('<p>Hallo World</p>');
//$mpdf->Output();
//exit;
//$asd = $html;
//
//
//
////
//              $model=new Uzytkownicy('search');
//        $mPDF1 = Yii::app()->ePdf->mpdf();
//        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
//        $mPDF1->WriteHTML($this->render('uzytkownicy_lista', array('model'=>$model), true));
//        # Outputs ready PDF
//        $mPDF1->Output();
        #       # mPDF
//        $mPDF1 = Yii::app()->ePdf->mpdf();
// 
//        # You can easily override default constructor's params
//        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A5');
// 
//        # render (full page)
//        $mPDF1->WriteHTML($this->render('index', array(), true));
// 
//        # Load a stylesheet
//        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
//        $mPDF1->WriteHTML($stylesheet, 1);
// 
//        # renderPartial (only 'view' of current controller)
//        $mPDF1->WriteHTML($this->renderPartial('index', array(), true));
// 
//        # Renders image
//        $mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/bg.gif' ));
// 
//        # Outputs ready PDF
//        $mPDF1->Output();


//         document.location.reload(true);

?>
	<?php echo CHtml::button("DRUKUJ",array('title'=>"Topic",'onclick'=>'js:drukuj();')); ?>
	<?php echo CHtml::button("okno",array('title'=>"Topic",'onclick'=>'js:okno();')); ?>
	<?php echo CHtml::button("schowaj",array('title'=>"Topic",'onclick'=>'js:schowaj();')); ?>






	<?php echo CHtml::ajaxSubmitButton("Zapisz", 
                     array('administrator/asd'),
                    array(
                    "type" => "POST",
                    "beforeSend" => "function( request )
                                {
                                document.getElementById('content').style.display = 'none';
                                }",  
                    "success" => "function( data )
                                {
                                }",
                    
                    "data" => array( 
                    "id" => "asd"
                                    ),
                        )
                    ); 
?>

<script type="text/javascript">

function schowaj() {
     document.getElementById("content").style.display = 'none';
     
 
}



function okno() {
     var htmlcode =  document.getElementById("content").innerHTML;
        window.open("htmlcode", "page", "width=700, height=400");
}


function drukuj() 
       {
//            var htmlcode =  document.getElementById("content").innerHTML;
            var htmlcode =  document.innerHTML;
            $.ajax({
                type: 'POST',
                url: '<?php echo Yii::app()->createAbsoluteUrl("administrator/drukuj"); ?>',
                data: {htmlcode:htmlcode},
                
                success:function(data){
                     alert(data);
                },
                dataType:'html'
            });
       }



</script>