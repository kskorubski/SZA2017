<?php

class CSVGenerator {
    
    private $endLine = PHP_EOL;
    private $headerArray = array();
    private $dataArray = array();
    private $dataProvider;
    private $fileName;
    private $model;
     
    public function __construct($model) {
        $this->model = $model;       
         
    }
    private function convert($text){
        return iconv("UTF-8","cp1250", $text);
    } 
    
    public function setDataProvider($dataProvider){ //        $dataProvider = $model->raport_zaliczone(); 
        $this->dataProvider = $dataProvider;
        $this->dataProvider->pagination->pageSize = $this->model->count();               
    }
    
    public function setHeader (array $listaNaglowka){
        $this->headerArray = $listaNaglowka;
    }
    
    public function setData (array $listaDanych){
         $this->dataArray = $listaDanych;    
         
         
    }  
    public function makeDataCSV($ktoryRaport) {
        
        if($ktoryRaport == 'RaportWgParametrow'){
            echo ";;;;Pozycjonowanie;;;;;;Artefakty;;;;;;Inne parametry";
            echo $this->endLine;
            echo ";;;;".$this->convert('Gruczołowe').";;;".$this->convert('Tłuszczowe').";;;".$this->convert('Gruczołowe').";;;".$this->convert('Tłuszczowe').";;;".$this->convert('Gruczołowe').";;;".$this->convert('Tłuszczowe').";;;Etykieta";
            echo $this->endLine;
        }
        if($ktoryRaport == 'RaportWgWojewodztw'){
            echo ";".$this->convert('Średnia liczba punktów').";;;".$this->convert('Zaliczyło audyt').";;;".$this->convert('Nie zaliczyło audytu').";;;W tym nie oceniono";
            echo $this->endLine;
        }
        if($ktoryRaport == 'RaportWgWojewodztwParametry'){
            echo ";;Pozycjonowanie;;;;Artefakty;;;;Inne parametry;;;;Etykieta";
            echo $this->endLine;
            echo ";;".$this->convert('Gruczołowe').";;".$this->convert('Tłuszczowe').";;".$this->convert('Gruczołowe').";;".$this->convert('Tłuszczowe').";;".$this->convert('Gruczołowe').";;".$this->convert('Tłuszczowe')."";
            echo $this->endLine;
        }
        if($ktoryRaport == 'RaportAudytorowOstrosc'){
            echo ";;;;;Pozycjonowanie;;;;Artefakty;;Inne parametry";
            echo $this->endLine;
            echo ";;;;;".$this->convert('Gruczołowe').";;".$this->convert('Tłuszczowe').";;".$this->convert('Gruczołowe').";".$this->convert('Tłuszczowe').";".$this->convert('Gruczołowe').";".$this->convert('Tłuszczowe').";";
            echo $this->endLine;            
        }
        
        foreach ($this->headerArray as $header){
            echo $this->convert($header.';');
            
        }
        echo $this->endLine;
        
        switch ($ktoryRaport){
            case 'RaportWgPunktacji':
                foreach ($this->dataProvider->data as $models) {        
                
                    echo $this->convert($models->osrodek->nazwa).';'.$this->convert($models->osrodek->miasto).';\''.$models->identyfikator_zestawu.'\';'.$this->convert($models->wojewodztwa->nazwa_wojewodztwa).';'.(($models->metodaID==2)?("Analogowa"):("Cyfrowa")).';'.str_replace(".",",",$models->getMyUzyskanaRazemWynik()).';'.str_replace(".",",",$models->getMyUzyskanaRazemPercent()).';'.$models->getMyLiczbaZaliczonychParametrow().';'.$this->convert($models->getMyCzySpelnioneUtkanie()).';'.(($models->zaliczenie==2)?("Tak"):(($models->zaliczenie==1)?("Nie"):("???"))).';'.$this->endLine;          
                    

                } 
                break;
            case 'RaportOcenioneWszystkie':
                foreach ($this->dataProvider->data as $models) {        
                
                    echo $this->convert($models->osrodek->nazwa).';'.$this->convert($models->osrodek->adres).';'.$this->convert($models->osrodek->miasto).';'.$this->convert($models->wojewodztwa->nazwa_wojewodztwa).';'.(($models->zaliczenie==2)?("Tak"):(($models->zaliczenie==1)?("Nie"):("???"))).';'.$this->endLine;          
                } 
                break;
            case 'RaportWgParametrow':
                foreach ($this->dataProvider->data as $models) {        
                
                    echo $this->convert($models->osrodek->nazwa).';'.$this->convert($models->osrodek->miasto).';'.$this->convert($models->wojewodztwa->nazwa_wojewodztwa).';\''.$models->identyfikator_zestawu.'\';'.
                                        str_replace(".",",",($models->getMyWynikiParametrow()['poz_grucz_pkt'])).';'.str_replace(".",",",($models->getMyWynikiParametrow()['poz_grucz_procent'])).';'.((($models->getMyWynikiParametrow()['poz_grucz_zal']) == "<div id='green'>TAK</div>")?("Tak"):((($models->getMyWynikiParametrow()['poz_grucz_zal']) == "<div id='red'>NIE</div>")?("Nie"):("???"))).';'.
                                        str_replace(".",",",($models->getMyWynikiParametrow()['poz_tluszcz_pkt'])).';'.str_replace(".",",",($models->getMyWynikiParametrow()['poz_tluszcz_procent'])).';'.((($models->getMyWynikiParametrow()['poz_tluszcz_zal']) == "<div id='green'>TAK</div>")?("Tak"):((($models->getMyWynikiParametrow()['poz_tluszcz_zal']) == "<div id='red'>NIE</div>")?("Nie"):("???"))).';'.
                                        str_replace(".",",",($models->getMyWynikiParametrow()['art_grucz_pkt'])).';'.str_replace(".",",",($models->getMyWynikiParametrow()['art_grucz_procent'])).';'.((($models->getMyWynikiParametrow()['art_grucz_zal']) == "<div id='green'>TAK</div>")?("Tak"):((($models->getMyWynikiParametrow()['art_grucz_zal']) == "<div id='red'>NIE</div>")?("Nie"):("???"))).';'.
                                        str_replace(".",",",($models->getMyWynikiParametrow()['art_tluszcz_pkt'])).';'.str_replace(".",",",($models->getMyWynikiParametrow()['art_tluszcz_procent'])).';'.((($models->getMyWynikiParametrow()['art_tluszcz_zal']) == "<div id='green'>TAK</div>")?("Tak"):((($models->getMyWynikiParametrow()['art_tluszcz_zal']) == "<div id='red'>NIE</div>")?("Nie"):("???"))).';'.
                                        str_replace(".",",",($models->getMyWynikiParametrow()['inne_grucz_pkt'])).';'.str_replace(".",",",($models->getMyWynikiParametrow()['inne_grucz_procent'])).';'.((($models->getMyWynikiParametrow()['inne_grucz_zal']) == "<div id='green'>TAK</div>")?("Tak"):((($models->getMyWynikiParametrow()['inne_grucz_zal']) == "<div id='red'>NIE</div>")?("Nie"):("???"))).';'.
                                        str_replace(".",",",($models->getMyWynikiParametrow()['inne_tluszcz_pkt'])).';'.str_replace(".",",",($models->getMyWynikiParametrow()['inne_tluszcz_procent'])).';'.((($models->getMyWynikiParametrow()['inne_tluszcz_zal']) == "<div id='green'>TAK</div>")?("Tak"):((($models->getMyWynikiParametrow()['inne_tluszcz_zal']) == "<div id='red'>NIE</div>")?("Nie"):("???"))).';'.
                                        str_replace(".",",",($models->getMyWynikiParametrow()['ety_pkt'])).';'.str_replace(".",",",($models->getMyWynikiParametrow()['ety_procent'])).';'.((($models->getMyWynikiParametrow()['ety_zal']) == "<div id='green'>TAK</div>")?("Tak"):((($models->getMyWynikiParametrow()['ety_zal']) == "<div id='red'>NIE</div>")?("Nie"):("???"))).';'.
                                        str_replace(".",",",$models->getMyUzyskanaRazemWynik()).';'.str_replace(".",",",$models->getMyUzyskanaRazemPercent()).';'.$models->getMyLiczbaZaliczonychParametrow().';'.$this->convert($models->getMyCzySpelnioneUtkanie()).';'.(($models->metodaID==2)?("Analogowa"):("Cyfrowa")).';'.(($models->zaliczenie==2)?("Tak"):(($models->zaliczenie==1)?("Nie"):("???"))).';'.$this->endLine;          
                } 
                break;
            case 'RaportWgWojewodztw':
                foreach ($this->dataProvider->data as $models) {        
                
                    echo $this->convert($models->wojewodztwa->nazwa_wojewodztwa).';'.$models->liczba_osrodkow.';'.str_replace(".",",",round($models->getMyWynikiDlaWojewodztw($models->getMyIdWojewodztwa(), 1), 2)).';'.str_replace(".",",",round($models->getMyWynikiDlaWojewodztwProcentowo($models->getMyIdWojewodztwa(), 2), 2)).';'.$models->zaliczone.';'.str_replace(".",",",round($models->getMyWynikiDlaWojewodztw($models->getMyIdWojewodztwa(), 3), 2)).';'.str_replace(".",",",round($models->getMyWynikiDlaWojewodztwProcentowo($models->getMyIdWojewodztwa(), 1), 2)).';'.$models->niezaliczone.';'.str_replace(".",",",round($models->getMyWynikiDlaWojewodztw($models->getMyIdWojewodztwa(), 2), 2)).';'.str_replace(".",",",round($models->getMyWynikiDlaWojewodztwProcentowo($models->getMyIdWojewodztwa(), 3), 2)).';'.$models->getMyIleBrakUtkania($models->getMyIdWojewodztwa()).';'.$models->brak_audytu.';'.$this->endLine;          

                } 
                break;
            case 'RaportWgWojewodztwParametry':
                foreach ($this->dataProvider->data as $models) {        
                
                    echo $this->convert($models->wojewodztwa->nazwa_wojewodztwa).';'.$models->liczba_osrodkow.';'.$models->getMyParamtery($models->getMyIdWojewodztwa(), "poz_L").';'.str_replace(".",",",round(($models->getMyParamtery($models->getMyIdWojewodztwa(), "poz_L")/$models->liczba_osrodkow)*100, 2)).';'.$models->getMyParamtery($models->getMyIdWojewodztwa(), "poz_P").';'.str_replace(".",",",round(($models->getMyParamtery($models->getMyIdWojewodztwa(), "poz_P")/$models->liczba_osrodkow)*100, 2)).';'.$models->getMyParamtery($models->getMyIdWojewodztwa(), "art_L").';'.str_replace(".",",",round(($models->getMyParamtery($models->getMyIdWojewodztwa(), "art_L")/$models->liczba_osrodkow)*100, 2)).';'.$models->getMyParamtery($models->getMyIdWojewodztwa(), "art_P").';'.str_replace(".",",",round(($models->getMyParamtery($models->getMyIdWojewodztwa(), "art_P")/$models->liczba_osrodkow)*100, 2)).';'.$models->getMyParamtery($models->getMyIdWojewodztwa(), "inne_L").';'.str_replace(".",",",round(($models->getMyParamtery($models->getMyIdWojewodztwa(), "inne_L")/$models->liczba_osrodkow)*100, 2)).';'.$models->getMyParamtery($models->getMyIdWojewodztwa(), "inne_P").';'.str_replace(".",",",round(($models->getMyParamtery($models->getMyIdWojewodztwa(), "inne_P")/$models->liczba_osrodkow)*100, 2)).';'.$models->getMyParamtery($models->getMyIdWojewodztwa(), "ety").';'.str_replace(".",",",round(($models->getMyParamtery($models->getMyIdWojewodztwa(), "ety")/$models->liczba_osrodkow)*100, 2)).';'.$this->endLine;          

                } 
                break;
            case 'RaportWgWojewodztwLZalParametry':
                foreach ($this->dataProvider->data as $models) {        
               
                    echo $this->convert($models->wojewodztwa->nazwa_wojewodztwa).';'.$models->liczba_osrodkow.';'.$models->getMyIloscZalParametrow($models->getMyIdWojewodztwa(), "7").';'.str_replace(".",",",round(($models->getMyIloscZalParametrow($models->getMyIdWojewodztwa(), "7")/$models->liczba_osrodkow)*100, 2)).';'.$models->getMyIloscZalParametrow($models->getMyIdWojewodztwa(), "6").';'.str_replace(".",",",round(($models->getMyIloscZalParametrow($models->getMyIdWojewodztwa(), "6")/$models->liczba_osrodkow)*100, 2)).';'.$models->getMyIloscZalParametrow($models->getMyIdWojewodztwa(), "5").';'.str_replace(".",",",round(($models->getMyIloscZalParametrow($models->getMyIdWojewodztwa(), "5")/$models->liczba_osrodkow)*100, 2)).';'.$models->getMyIloscZalParametrow($models->getMyIdWojewodztwa(), "4").';'.str_replace(".",",",round(($models->getMyIloscZalParametrow($models->getMyIdWojewodztwa(), "4")/$models->liczba_osrodkow)*100, 2)).';'.$models->getMyIloscZalParametrow($models->getMyIdWojewodztwa(), "3").';'.str_replace(".",",",round(($models->getMyIloscZalParametrow($models->getMyIdWojewodztwa(), "3")/$models->liczba_osrodkow)*100, 2)).';'.$models->getMyIloscZalParametrow($models->getMyIdWojewodztwa(), "2").';'.str_replace(".",",",round(($models->getMyIloscZalParametrow($models->getMyIdWojewodztwa(), "2")/$models->liczba_osrodkow)*100, 2)).';'.$models->getMyIloscZalParametrow($models->getMyIdWojewodztwa(), "1").';'.str_replace(".",",",round(($models->getMyIloscZalParametrow($models->getMyIdWojewodztwa(), "1")/$models->liczba_osrodkow)*100, 2)).';'.$models->getMyIloscZalParametrow($models->getMyIdWojewodztwa(), "0").';'.str_replace(".",",",round(($models->getMyIloscZalParametrow($models->getMyIdWojewodztwa(), "0")/$models->liczba_osrodkow)*100, 2)).';'.$this->endLine;          

                } 
                break;
            case 'RaportDaneDotAudytorow':
                foreach ($this->dataProvider->data as $models) {        
               
                    echo $this->convert($models->nazwisko).';'.$this->convert($models->imie).';'.$models->username.';'.$this->convert($models->nazwa_zespolu).';'.$models->audyty_oceniane.';'.$models->audyty_etapI.';'.$models->audyty_etapII.';'.$models->zaliczone_audyty.';'.$models->niezaliczone_audyty.$this->endLine;          

                } 
                break;
            case 'RaportAudytorowOstrosc':
                foreach ($this->dataProvider->data as $models) {        
               
                    echo $this->convert($models->nazwisko).';'.$this->convert($models->imie).';'.$models->username.';'.$this->convert($models->nazwa_zespolu).';'.$models->audyty_oceniane.';'.$models->getMyOcenyOstrosc("poz_skosna_L").';'.$models->getMyOcenyOstrosc("poz_kranio_L").';'.$models->getMyOcenyOstrosc("poz_skosna_P").';'.$models->getMyOcenyOstrosc("poz_kranio_P").';'.$models->getMyOcenyOstrosc("art_L").';'.$models->getMyOcenyOstrosc("art_P").';'.$models->getMyOcenyOstrosc("inne_L").';'.$models->getMyOcenyOstrosc("inne_P").$this->endLine;          
            
                } 
                 echo $this->endLine;
                 echo $this->endLine;
                 echo $this->convert("Zestawienie ostrości ocen dla etykiety");
                 echo $this->endLine;
                 echo "Liczba ocenionych etykiet;Etykieta (analogowe);Dane na etykiecie;".$this->convert("Pozostałe paramtery").";".$this->convert("Etykieta całość").$this->endLine;  
                 echo $this->model->getMyOcenyOstroscEtykieta('liczbaEtykiet').";".str_replace(".",",", $this->model->getMyOcenyOstroscEtykieta('ety_etykieta')).";".str_replace(".",",", $this->model->getMyOcenyOstroscEtykieta('ety_dane_na_etykiecie')).";".str_replace(".",",", $this->model->getMyOcenyOstroscEtykieta('ety_parametry_ekspozycji')).";".str_replace(".",",", $this->model->getMyOcenyOstroscEtykieta('ety_uzyskane'));  
                
                break;
                
        }
        

                
    }
           
}
?>