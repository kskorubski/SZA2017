<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WynikiAudytu
 *
 * @author studio
 */
 class TWynikiAudytow { 
        var $model_ankieta;
        var $model_etykieta;
        var $metoda;
//1. Pozycjonowanie        
        var $poz_skosna_uzyskana_L;
        var $poz_skosna_uzyskana_P;
        const POZ_SKOSNA_MAX_L = 9;
        const POZ_SKOSNA_MAX_P = 9;
        var $poz_kranio_uzyskana_L;
        var $poz_kranio_uzyskana_P;
        const POZ_KRANIO_MAX_L = 9;
        const POZ_KRANIO_MAX_P = 9;
        var $poz_suma_uzyskana_L;
        var $poz_suma_uzyskana_P;
        var $poz_suma_uzyskana_percent_L;
        var $poz_suma_uzyskana_percent_P;
        const POZ_SUMA_MAX_L = 18;
        const POZ_SUMA_MAX_P = 18;
        var $poz_zaliczono_L;
        var $poz_zaliczono_P;
//2. Artefakty        
        var $art_uzyskana_L;
        var $art_uzyskana_P;
        var $art_uzyskana_percent_L;
        var $art_uzyskana_percent_P;
        const ART_MAX_CYFRA_L = 3;        
        const ART_MAX_CYFRA_P = 3;
        const ART_MAX_ANALOG_L = 24;        
        const ART_MAX_ANALOG_P = 24;
        var $art_zaliczono_L;
        var $art_zaliczono_P;
//3. Inne parametry oceny mammogamow  
        var $inne_uzyskana_L;
        var $inne_uzyskana_P;
        var $inne_uzyskana_percent_L;
        var $inne_uzyskana_percent_P;
        const INNE_MAX_L = 15;
        const INNE_MAX_P = 15;
        var $inne_zaliczono_L;
        var $inne_zaliczono_P;
//4. Etykieta
        var $ety_uzyskana;
        var $ety_uzyskana_percent;
        const ETY_MAX_CYFRA = 15;
        const ETY_MAX_ANALOG = 24;
        var $ety_zaliczono;
        
//podsumowanie
        var $uzyskana_razem_wagi; //suma uzyskanych + wagi jezeli jest osiagniety poziom akceptowalny
        const MAX_RAZEM_CYFRA = 87;
        const MAX_RAZEM_ANALOG = 138;
        var $max_razem_wagi; //cyfra lub analog po utworzeniu obiektu w zaleznosci od podanej metody jako argument
        var $uzyskana_razem_percent;

//wagi
        const zaPozycjonowanie = 6;
        const zaArtefakty = 5;
        const zaInne = 5;
        const zaEtykiete = 3;
//progi zaliczeniowe w pkt.
        var $progZalPoz;
        var $progZalArt;
        var $progZalInne;
        var $progZalEtykieta;
        var $progZalSuma;
        

        
        
        function WynikiAudytow($model_ankieta, $model_etykieta, $metoda){
            $this->model_ankieta = $model_ankieta;
            $this->model_etykieta = $model_etykieta;
            $this->metoda = $metoda;    
            
            $this->sumator();
            
            $this->progZalPoz = (0.6 * self::POZ_SUMA_MAX_L); //tylko dla L zrobione bo niema sensu P jest taka sama.
            $this->progZalInne = (0.6 * self::INNE_MAX_L);
            
            switch ($metoda){
                case 'cyfrowa':   
                    $this->progZalArt = (0.65 * self::ART_MAX_CYFRA_L);
                    $this->progZalEtykieta = (0.6 * self::ETY_MAX_CYFRA);
                    $this->progZalSuma = (0.7 * (self::MAX_RAZEM_CYFRA+(2*self::zaPozycjonowanie)+(2*self::zaArtefakty)+(2*self::zaInne)+self::zaEtykiete));
                    $this->max_razem_wagi = self::MAX_RAZEM_CYFRA+(2*self::zaPozycjonowanie)+(2*self::zaArtefakty)+(2*self::zaInne)+self::zaEtykiete;
                    break;
                case 'analogowa':   
                    $this->progZalArt = (0.85 * self::ART_MAX_ANALOG_L);
                    $this->progZalEtykieta = (0.6 * self::ETY_MAX_ANALOG);
                    $this->progZalSuma = (0.7 * (self::MAX_RAZEM_ANALOG+(2*self::zaPozycjonowanie)+(2*self::zaArtefakty)+(2*self::zaInne)+self::zaEtykiete));
                    $this->max_razem_wagi = self::MAX_RAZEM_ANALOG+(2*self::zaPozycjonowanie)+(2*self::zaArtefakty)+(2*self::zaInne)+self::zaEtykiete;
                    break;
            }
        }
        
        function sumator() {
            $this->poz_skosna_uzyskana_L = $this->model_ankieta->x1_1a+$this->model_ankieta->x1_1b+$this->model_ankieta->x1_2a+$this->model_ankieta->x1_2b+$this->model_ankieta->x1_3a+$this->model_ankieta->x1_3b+
                    $this->model_ankieta->x1_4a+$this->model_ankieta->x1_4b+$this->model_ankieta->x1_5a;
            
            $this->poz_skosna_uzyskana_P = $this->model_ankieta->x1_1c+$this->model_ankieta->x1_1d+$this->model_ankieta->x1_2c+$this->model_ankieta->x1_2d+$this->model_ankieta->x1_3c+$this->model_ankieta->x1_3d+
                    $this->model_ankieta->x1_4c+$this->model_ankieta->x1_4d+$this->model_ankieta->x1_5b;
            
            $this->poz_kranio_uzyskana_L = $this->model_ankieta->x1_6a+$this->model_ankieta->x1_6b+$this->model_ankieta->x1_7a+$this->model_ankieta->x1_7b+
                    $this->model_ankieta->x1_8a+$this->model_ankieta->x1_8b+$this->model_ankieta->x1_9a+$this->model_ankieta->x1_9b+$this->model_ankieta->x1_10a;
            
            $this->poz_kranio_uzyskana_P = $this->model_ankieta->x1_6c+$this->model_ankieta->x1_6d+$this->model_ankieta->x1_7c+$this->model_ankieta->x1_7d+
                    $this->model_ankieta->x1_8c+$this->model_ankieta->x1_8d+$this->model_ankieta->x1_9c+$this->model_ankieta->x1_9d+$this->model_ankieta->x1_10b;
    
            if($this->metoda == 'cyfrowa'){
                $this->art_uzyskana_L = $this->model_ankieta->x2_1a;
                $this->art_uzyskana_P = $this->model_ankieta->x2_1b;
                
            }else if ($this->metoda == 'analogowa'){
                $this->art_uzyskana_L = $this->model_ankieta->x2_1a+$this->model_ankieta->x2_2a+$this->model_ankieta->x2_3a+$this->model_ankieta->x2_4a+$this->model_ankieta->x2_5a+$this->model_ankieta->x2_6a+$this->model_ankieta->x2_7a+$this->model_ankieta->x2_9a;
                $this->art_uzyskana_P = $this->model_ankieta->x2_1b+$this->model_ankieta->x2_2b+$this->model_ankieta->x2_3b+$this->model_ankieta->x2_4b+$this->model_ankieta->x2_5b+$this->model_ankieta->x2_6b+$this->model_ankieta->x2_7b+$this->model_ankieta->x2_9b;
            }
                        
            $this->inne_uzyskana_L = $this->model_ankieta->x3_1a+$this->model_ankieta->x3_2a+$this->model_ankieta->x3_3a;
            $this->inne_uzyskana_P = $this->model_ankieta->x3_1b+$this->model_ankieta->x3_2b+$this->model_ankieta->x3_3b;
             
            if($this->metoda == 'cyfrowa'){
                 $this->ety_uzyskana = $this->model_etykieta->x4_1+$this->model_etykieta->x4_2+$this->model_etykieta->x4_3+$this->model_etykieta->x4_4+
                         $this->model_etykieta->x4_5+$this->model_etykieta->x4_6+$this->model_etykieta->x4_7+$this->model_etykieta->x4_8+$this->model_etykieta->x4_9+
                         $this->model_etykieta->x4_10+$this->model_etykieta->x4_11+$this->model_etykieta->x4_12+$this->model_etykieta->x4_13+$this->model_etykieta->x4_14+
                           $this->model_etykieta->x4_15;
                
            }else if ($this->metoda == 'analogowa'){
                $this->ety_uzyskana = $this->model_etykieta->x4_1+$this->model_etykieta->x4_2+$this->model_etykieta->x4_3+$this->model_etykieta->x4_4+
                        $this->model_etykieta->x4_5+$this->model_etykieta->x4_6+$this->model_etykieta->x4_7+$this->model_etykieta->x4_8+$this->model_etykieta->x4_9+
                        $this->model_etykieta->x4_10+$this->model_etykieta->x4_11+$this->model_etykieta->x4_12+$this->model_etykieta->x4_13+$this->model_etykieta->x4_14+
                        $this->model_etykieta->x4_15+$this->model_etykieta->x4_16+$this->model_etykieta->x4_17+$this->model_etykieta->x4_18+$this->model_etykieta->x4_19+$this->model_etykieta->x4_20;
                
            }
            $this->poz_suma_uzyskana_L = $this->poz_skosna_uzyskana_L+$this->poz_kranio_uzyskana_L;
            $this->poz_suma_uzyskana_P = $this->poz_skosna_uzyskana_P+$this->poz_kranio_uzyskana_P;
            
            
        }
        function getUtkanie_L() {
            return $this->model_ankieta->x1_1b_podpowiedz;
        }
        function getUtkanie_P() {
            return $this->model_ankieta->x1_1c_podpowiedz;
        }
        function getPOZ_SKOSNA_MAX_L() {
            return self::POZ_SKOSNA_MAX_L;
        }
        function getPOZ_SKOSNA_MAX_P() {
            return self::POZ_SKOSNA_MAX_P;
        }
        function getPOZ_KRANIO_MAX_L() {
            return self::POZ_SKOSNA_MAX_L;
        }
        function getPOZ_KRANIO_MAX_P() {
            return self::POZ_KRANIO_MAX_P;
        }
        function getPOZ_SUMA_MAX_L() {
            return self::POZ_SUMA_MAX_L;
        }
        function getPOZ_SUMA_MAX_P() {
            return self::POZ_SUMA_MAX_P;
        }
        function getART_MAX_ANALOG_L() {
            return self::ART_MAX_ANALOG_L;
        }
        function getART_MAX_ANALOG_P() {
            return self::ART_MAX_ANALOG_P;
        }
        function getART_MAX_CYFRA_L() {
            return self::ART_MAX_CYFRA_L;
        }
        function getART_MAX_CYFRA_P() {
            return self::ART_MAX_CYFRA_P;
        }
        function getINNE_MAX_L() {
            return self::INNE_MAX_L;
        }
        function getINNE_MAX_P() {
            return self::INNE_MAX_P;
        }
        function getETY_MAX_CYFRA() {
            return self::ETY_MAX_CYFRA;
        }
        function getETY_MAX_ANALOG() {
            return self::ETY_MAX_ANALOG;
        }
        
        function getPoz_skosna_uzyskana_L() {
            return $this->poz_skosna_uzyskana_L;
        }
        function getPoz_skosna_uzyskana_P() {
            return $this->poz_skosna_uzyskana_P;
        }
        function getPoz_kranio_uzyskana_L() {
            return $this->poz_kranio_uzyskana_L;
        }
        function getPoz_kranio_uzyskana_P() {
            return $this->poz_kranio_uzyskana_P;
        }
        function getPoz_suma_uzyskana_L() {
            return $this->poz_suma_uzyskana_L;
        }
        function getPoz_suma_uzyskana_P() {
            return $this->poz_suma_uzyskana_P;
        }
        function getArt_uzyskana_L() {
            return $this->art_uzyskana_L;
        }
        function getArt_uzyskana_P() {
            return $this->art_uzyskana_P;
        }
        function getInne_uzyskana_L() {
            return $this->inne_uzyskana_L;
        }
        function getInne_uzyskana_P() {
            return $this->inne_uzyskana_P;
        }
        function getEty_uzyskana() {
            return $this->ety_uzyskana;
        }
        function getPoz_suma_uzyskana_percent_L() {
            $this->poz_suma_uzyskana_percent_L = ($this->poz_suma_uzyskana_L/self::POZ_SUMA_MAX_L)*100;
            $wynik = $this->roundDown($this->poz_suma_uzyskana_percent_L);
            return $wynik; 
        }
        function getPoz_suma_uzyskana_percent_P() {
            $this->poz_suma_uzyskana_percent_P = ($this->poz_suma_uzyskana_P/self::POZ_SUMA_MAX_P)*100;
            $wynik = $this->roundDown($this->poz_suma_uzyskana_percent_P);
            return $wynik; 
        }
        function getArt_uzyskana_percent_L() {
            $this->art_uzyskana_percent_L = ($this->art_uzyskana_L/self::ART_MAX_ANALOG_L)*100;
            $wynik = $this->roundDown($this->art_uzyskana_percent_L);
            return $wynik;
        }
        function getArt_uzyskana_percent_P() {
            $this->art_uzyskana_percent_P = ($this->art_uzyskana_P/self::ART_MAX_ANALOG_P)*100;
            $wynik = $this->roundDown($this->art_uzyskana_percent_P);
            return $wynik;
        }
        function getInne_uzyskana_percent_L() {
            $this->inne_uzyskana_percent_L = ($this->inne_uzyskana_L/self::INNE_MAX_L)*100;
            $wynik = $this->roundDown($this->inne_uzyskana_percent_L);
            return $wynik;
        }
        function getInne_uzyskana_percent_P() {
            $this->inne_uzyskana_percent_P = ($this->inne_uzyskana_P/self::INNE_MAX_P)*100;
            $wynik = $this->roundDown($this->inne_uzyskana_percent_P);
            return $wynik;
        }
        function getEty_uzyskana_percent() {
            $this->ety_uzyskana_percent = ($this->ety_uzyskana/self::ETY_MAX_ANALOG)*100;
            $wynik = $this->roundDown($this->ety_uzyskana_percent);
            return $wynik;
        }
        function getPoz_zaliczono_L() {
            if($this->poz_suma_uzyskana_L > $this->progZalPoz){
                $this->poz_zaliczono_L = "<div id='green'>TAK</div>";
            }else {
                $this->poz_zaliczono_L = "<div id='red'>NIE</div>";
            }
            return $this->poz_zaliczono_L;
        }
        function getPoz_zaliczono_P() {
            if($this->poz_suma_uzyskana_P > $this->progZalPoz){
                $this->poz_zaliczono_P = "<div id='green'>TAK</div>";
            }else {
                $this->poz_zaliczono_P = "<div id='red'>NIE</div>";
            }
            return $this->poz_zaliczono_P;
        }
        function getArt_zaliczono_L() {
            if($this->art_uzyskana_L > $this->progZalArt){
                $this->art_zaliczono_L = "<div id='green'>TAK</div>";
            }else {
                $this->art_zaliczono_L = "<div id='red'>NIE</div>";
            }
            return $this->art_zaliczono_L;
        }
        function getArt_zaliczono_P() {
            if($this->art_uzyskana_P > $this->progZalArt){
                $this->art_zaliczono_P = "<div id='green'>TAK</div>";
            }else {
                $this->art_zaliczono_P = "<div id='red'>NIE</div>";
            }
            return $this->art_zaliczono_P;
        }
        function getInne_zaliczono_L() {
            if($this->inne_uzyskana_L > $this->progZalInne){
                $this->inne_zaliczono_L = "<div id='green'>TAK</div>";
            }else {
                $this->inne_zaliczono_L = "<div id='red'>NIE</div>";
            }
            return $this->inne_zaliczono_L;
        }
        function getInne_zaliczono_P() {
            if($this->inne_uzyskana_P > $this->progZalInne){
                $this->inne_zaliczono_P = "<div id='green'>TAK</div>";
            }else {
                $this->inne_zaliczono_P = "<div id='red'>NIE</div>";
            }
            return $this->inne_zaliczono_P;
        }
        function getEty_zaliczono() {
            if($this->ety_uzyskana > $this->progZalEtykieta){
                $this->ety_zaliczono = "<div id='green'>TAK</div>";
            }else {
                $this->ety_zaliczono = "<div id='red'>NIE</div>";
            }
            return $this->ety_zaliczono;
        }
        function getMax_razem_wagi() {
            
            return $this->max_razem_wagi;
        }
        function getUzyskana_razem_wagi() {
            $this->uzyskana_razem_wagi = 0;
            
            if($this->poz_suma_uzyskana_L > $this->progZalPoz){
                $this->uzyskana_razem_wagi = $this->uzyskana_razem_wagi+($this->poz_suma_uzyskana_L+self::zaPozycjonowanie);
            }else {
               $this->uzyskana_razem_wagi = $this->uzyskana_razem_wagi+$this->poz_suma_uzyskana_L;
            }
            if($this->poz_suma_uzyskana_P > $this->progZalPoz){
                $this->uzyskana_razem_wagi = $this->uzyskana_razem_wagi+($this->poz_suma_uzyskana_P+self::zaPozycjonowanie);
            }else {
               $this->uzyskana_razem_wagi = $this->uzyskana_razem_wagi+$this->poz_suma_uzyskana_P;
            }
            if($this->art_uzyskana_L > $this->progZalArt){
                $this->uzyskana_razem_wagi = $this->uzyskana_razem_wagi+($this->art_uzyskana_L+self::zaArtefakty);
            }else {
               $this->uzyskana_razem_wagi = $this->uzyskana_razem_wagi+$this->art_uzyskana_L;
            }
            if($this->art_uzyskana_P > $this->progZalArt){
                $this->uzyskana_razem_wagi = $this->uzyskana_razem_wagi+($this->art_uzyskana_P+self::zaArtefakty);
            }else {
               $this->uzyskana_razem_wagi = $this->uzyskana_razem_wagi+$this->art_uzyskana_P;
            }
            if($this->inne_uzyskana_L > $this->progZalInne){
                $this->uzyskana_razem_wagi = $this->uzyskana_razem_wagi+($this->inne_uzyskana_L+self::zaInne);
            }else {
               $this->uzyskana_razem_wagi = $this->uzyskana_razem_wagi+$this->inne_uzyskana_L;
            }
            if($this->inne_uzyskana_P > $this->progZalInne){
                $this->uzyskana_razem_wagi = $this->uzyskana_razem_wagi+($this->inne_uzyskana_P+self::zaInne);
            }else {
               $this->uzyskana_razem_wagi = $this->uzyskana_razem_wagi+$this->inne_uzyskana_P;
            }
            if($this->ety_uzyskana > $this->progZalEtykieta){
                $this->uzyskana_razem_wagi = $this->uzyskana_razem_wagi+($this->ety_uzyskana+self::zaEtykiete);
            }else {
               $this->uzyskana_razem_wagi = $this->uzyskana_razem_wagi+$this->ety_uzyskana;
            }
                                
            return $this->uzyskana_razem_wagi;
        }
        function getUzyskana_razem_percent() {
            
            $uzyskaneZWagami = $this->getUzyskana_razem_wagi();
            $wynik = ($uzyskaneZWagami/$this->max_razem_wagi)*100;
            $wynik = floor($wynik*100)/100;
            $this->uzyskana_razem_percent = number_format($wynik, 2); 
            
            return $this->uzyskana_razem_percent;
        }
        function czy_zaliczono() {
            
            if($this->getUzyskana_razem_wagi() >= $this->progZalSuma){
                $wynik = true;
            }else if($this->getUzyskana_razem_wagi() < $this->progZalSuma){
                $wynik = false;
            }
            
            return $wynik;
        }
        
        function roundDown($liczba) {
            $liczba = floor($liczba*100)/100; //sluzy temu zeby zaokraglic liczbe w dol do 2 miejsc po przecinku.
            $liczbaRet = number_format($liczba, 2); 
            
            return $liczbaRet; 
        }

    }
?>
