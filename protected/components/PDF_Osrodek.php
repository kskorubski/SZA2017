<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class PDF_Osrodek
{
  
    public function model_osrodka_dla_id_audytu($id_audytu)
    {
        $osrodek = Audyty::model()->findByPk($id_audytu)->osrodek_id;
        $model_osrodek = Osrodki::model()->findByPk($osrodek);
    return $model_osrodek;
    }
}