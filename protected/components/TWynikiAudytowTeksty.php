<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SlownikPodpowiedzi
 *
 * @author studio
 */


class TWynikiAudytowTeksty {
    
    private $textPozycjonowanie = array();
    private $textArtefakty = array();
    private $textInne = array();
    
    private $x_1_1_zero = '0 pkt - Fragment sutka niewidoczny na zdjęciu; '; 
    private $x_1_1_pol = '0,5 pkt – Nieznaczny fragment sutka niewidoczny na zdjęciu (np. fragment skóry); ';

    private $x_1_2_zero = '0 pkt - Nie spełnione są oba ważne kryteria: mięsień piersiowy nie sięga wysokości brodawki i nie jest uwidoczniona jego wystarczająca część; ';
    private $x_1_2_pol = '0,5 pkt –  Jedno kryterium jest niespełnione w nieznacznym zakresie np. wąski mięsień piersiowy lub mięsień piersiowy nie sięga do wysokości brodawki (maksymalnie 5 mm); ';

    private $x_1_3_zero = '0 pkt - Niewidoczny fałd podsutkowy; ';
    private $x_1_3_pol = '0,5 pkt – Fałd podsutkowy wąski lub fałd z nakładającą się tkanką; ';

    private $x_1_4_zero = '0 pkt -  Obecność fałdów skórnych/tkankowych w 2 okolicach sutka; ';
    private $x_1_4_pol = '0,5 pkt – Obecność fałdów skórnych/tkankowych tylko w jednej okolicy nieprzesłaniających stożka gruczołowego; ';

    private $x_1_5_zero = '0 pkt - Całkowita asymetria ułożenia; ';
    private $x_1_5_pol = '0,5 pkt – Ułożenie niesymetryczne w niewielkim zakresie (do 10 mm); ';

    private $x_1_6_zero = '0 pkt - Fragment sutka niewidoczny na zdjęciu; ';
    private $x_1_6_pol = '0,5 pkt – Nieznaczny fragment sutka niewidoczny na zdjęciu (np. fragment skóry); ';

    private $x_1_7_zero = '0 pkt - Boczne położenie brodawki lub położenie przyśrodkowe więcej niż 15 mm; ';
    private $x_1_7_pol = '0,5 pkt – Przyśrodkowe położenie brodawki 11-15 mm; ';

    private $x_1_8_zero = '0 pkt - Obecność fałdów skórnych/tkankowych w 2 okolicach sutka; ';
    private $x_1_8_pol = '0,5 pkt – Obecność fałdów skórnych/tkankowych tylko w jednej okolicy nieprzesłaniających stożka gruczołowego; ';

    private $x_1_9_zero = '0 pkt - Brodawka niewyrzutowana; ';
    private $x_1_9_pol = '0,5 pkt – Brodawka trafiona ortoradialnie; ';

    private $x_1_10_zero = '0 pkt - Całkowita asymetria ułożenia; ';
    private $x_1_10_pol = '0,5 pkt – Ułożenie niesymetryczne w niewielkim zakresie (do 10 mm); ';

    private $x_2_all_zero = '0 pkt - Duża ilość artefaktów, uniemożliwia wiarygodną ocenę; ';
    private $x_2_all_jeden = '1 pkt – Średnia ilość artefaktów, wpływa na ocenę; ';
    private $x_2_all_dwa = '2 pkt – Mała ilość artefaktów, nie wpływa na ocenę; ';
    private $x_2_all_trzy = '3 pkt – Brak artefaktów; ';

    private $x_3_1_prefix = 'Ekspozycja – ocenie podlegają warunki ekspozycji pozwalające na uwidocznienie struktur anatomicznych, tj. tkanka gruczołowa, tłuszczowa, włóknista, naczynia: ';
    private $x_3_1_jeden = '1 pkt – Ekspozycja zła; ';
    private $x_3_1_dwa = '2 pkt – Ekspozycja mierna; ';
    private $x_3_1_trzy = '3 pkt – Ekspozycja odpowiednia; ';
    private $x_3_1_cztery = '4 pkt – Ekspozycja dobra; ';
    private $x_3_1_piec = '5 pkt – Ekspozycja bardzo dobra; ';

    private $x_3_2_prefix = 'Kontrast – ocenie podlega kontrast pozwalający na odróżnienie struktur anatomicznych tj. elementy gruczołowe, włókniste, naczyniowe: ';
    private $x_3_2_jeden = '1 pkt – Kontrast zły; ';
    private $x_3_2_dwa = '2 pkt – Kontrast mierny; ';
    private $x_3_2_trzy = '3 pkt – Kontrast odpowiedni; ';
    private $x_3_2_cztery = '4 pkt – Kontrast dobry; ';
    private $x_3_2_piec = '5 pkt – Kontrast bardzo dobry; ';

    private $x_3_3_prefix = 'Ostrość – ocenie podlega ostrość granic poszczególnych struktur anatomicznych, tj. zarys skóry, naczyń krwionośnych, tkanki włóknistej, rozetki skórne na tle mięśnia piersiowego: ';
    private $x_3_3_jeden = '1 pkt – Ostrość zła; ';
    private $x_3_3_dwa = '2 pkt – Ostrość mierna; ';
    private $x_3_3_trzy = '3 pkt – Ostrość odpowiednia; ';
    private $x_3_3_cztery = '4 pkt – Ostrość dobra; ';
    private $x_3_3_piec = '5 pkt – Ostrość bardzo dobra; ';
    
    function getTextPozycjonowanie(){
        return $this->textPozycjonowanie;
    }
    function getTextArtefakty(){
        return $this->textArtefakty;
    }
    function getTextInne(){
        return $this->textInne;
    }  
    
    function TWynikiAudytowTeksty($model_ankiety, $metoda) {
        
    
        if($model_ankiety->x1_1b_podpowiedz != "Niespełnione kryterium utkania"){ //dla L
           
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_1a, "x_1_1");            
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_1b, "x_1_1");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_2a, "x_1_2");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_2b, "x_1_2");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_3a, "x_1_3");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_3b, "x_1_3");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            } 
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_4a, "x_1_4");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            } 
           
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_4b, "x_1_4");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_5a, "x_1_5");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_6a, "x_1_6");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_6b, "x_1_6");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_7a, "x_1_7");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_7b, "x_1_7");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            } 
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_8a, "x_1_8");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            } 
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_8b, "x_1_8");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            } 
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_9a, "x_1_9");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            } 
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_9b, "x_1_9");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }; 
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_10a, "x_1_10");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }
           //---
            
            $textTemp = $this->przypiszTextArt($model_ankiety->x2_1a);            
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '2'); 
            }    
            
            if($metoda == 'analogowa'){
                $textTemp = $this->przypiszTextArt($model_ankiety->x2_2a);            
                if($textTemp){
                    $this->dodajDoTablicy($textTemp, '2'); 
                }  

                $textTemp = $this->przypiszTextArt($model_ankiety->x2_3a);            
                if($textTemp){
                    $this->dodajDoTablicy($textTemp, '2'); 
                } ; 

                $textTemp = $this->przypiszTextArt($model_ankiety->x2_4a);            
                if($textTemp){
                    $this->dodajDoTablicy($textTemp, '2'); 
                }   

                $textTemp = $this->przypiszTextArt($model_ankiety->x2_5a);            
                if($textTemp){
                    $this->dodajDoTablicy($textTemp, '2'); 
                }           

                $textTemp = $this->przypiszTextArt($model_ankiety->x2_6a);            
                if($textTemp){
                    $this->dodajDoTablicy($textTemp, '2'); 
                }  

                $textTemp = $this->przypiszTextArt($model_ankiety->x2_7a);            
                if($textTemp){
                    $this->dodajDoTablicy($textTemp, '2'); 
                } 

                $textTemp = $this->przypiszTextArt($model_ankiety->x2_9a);            
                if($textTemp){
                    $this->dodajDoTablicy($textTemp, '2'); 
                }
            }
            //---
            $textTemp = $this->przypiszTextInne($model_ankiety->x3_1a, "x_3_1");            
            if($textTemp){
//                $this->dodajDoTablicy($this->x_3_1_prefix, '3');
                $this->dodajDoTablicy($textTemp, '3'); 
            }
            $textTemp = $this->przypiszTextInne($model_ankiety->x3_2a, "x_3_2");            
            if($textTemp){
//                $this->dodajDoTablicy($this->x_3_2_prefix, '3');
                $this->dodajDoTablicy($textTemp, '3'); 
            }
            $textTemp = $this->przypiszTextInne($model_ankiety->x3_3a, "x_3_3");            
            if($textTemp){
//                $this->dodajDoTablicy($this->x_3_3_prefix, '3');
                $this->dodajDoTablicy($textTemp, '3'); 
            }
            
       }
       if($model_ankiety->x1_1c_podpowiedz != "Niespełnione kryterium utkania"){ //dla P
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_1c, "x_1_1");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }  
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_1d, "x_1_1");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            } 
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_2c, 'x_1_2');          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }  
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_2d, "x_1_2");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            } 
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_3c, "x_1_3");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            } 
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_3d, "x_1_3");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }  
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_4c, "x_1_4");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            } 
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_4d, "x_1_4");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }  
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_5b, "x_1_5");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }  
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_6c, "x_1_6");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            } 
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_6d, "x_1_6");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }  
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_7c, "x_1_7");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }  
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_7d, "x_1_7");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }  
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_8c, "x_1_8");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }  
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_8d, "x_1_8");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }  
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_9c, "x_1_9");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            } 
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_9d, "x_1_9");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            } 
            
            $textTemp = $this->przypiszTextPoz($model_ankiety->x1_10b, "x_1_10");          
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '1'); 
            }  
            //---
             $textTemp = $this->przypiszTextArt($model_ankiety->x2_1b);            
            if($textTemp){
                $this->dodajDoTablicy($textTemp, '2'); 
            } 
            
            if($metoda == 'analogowa'){
                $textTemp = $this->przypiszTextArt($model_ankiety->x2_2b);            
                if($textTemp){
                    $this->dodajDoTablicy($textTemp, '2'); 
                } 

                $textTemp = $this->przypiszTextArt($model_ankiety->x2_3b);            
                if($textTemp){
                    $this->dodajDoTablicy($textTemp, '2'); 
                } 

                $textTemp = $this->przypiszTextArt($model_ankiety->x2_4b);            
                if($textTemp){
                    $this->dodajDoTablicy($textTemp, '2'); 
                } 

                $textTemp = $this->przypiszTextArt($model_ankiety->x2_5b);            
                if($textTemp){
                    $this->dodajDoTablicy($textTemp, '2'); 
                } 

                $textTemp = $this->przypiszTextArt($model_ankiety->x2_6b);            
                if($textTemp){
                    $this->dodajDoTablicy($textTemp, '2'); 
                } 

                $textTemp = $this->przypiszTextArt($model_ankiety->x2_7b);            
                if($textTemp){
                    $this->dodajDoTablicy($textTemp, '2'); 
                } 

                $textTemp = $this->przypiszTextArt($model_ankiety->x2_9b);            
                if($textTemp){
                    $this->dodajDoTablicy($textTemp, '2'); 
                }
            }
             //---
            $textTemp = $this->przypiszTextInne($model_ankiety->x3_1b, "x_3_1");            
            if($textTemp){
//                $this->dodajDoTablicy($this->x_3_1_prefix, '3'); 
                $this->dodajDoTablicy($textTemp, '3'); 
            }
            $textTemp = $this->przypiszTextInne($model_ankiety->x3_2b, "x_3_2");            
            if($textTemp){
//                $this->dodajDoTablicy($this->x_3_2_prefix, '3');
                $this->dodajDoTablicy($textTemp, '3'); 
            }
            $textTemp = $this->przypiszTextInne($model_ankiety->x3_3b, "x_3_3");            
            if($textTemp){
//                $this->dodajDoTablicy($this->x_3_3_prefix, '3');
                $this->dodajDoTablicy($textTemp, '3'); 
            }
            
            
        }
        
    }
    function dodajDoTablicy($tekst, $ktora_kat){
       
        switch ($ktora_kat){
            case '1':
                $licznik = 0;
                foreach ($this->textPozycjonowanie as $wynik){ 
                    if($wynik == $tekst){                
                        $licznik++;                
                    }
                }
                if ($licznik == 0){
                    $this->textPozycjonowanie[] = $tekst;
                }
                break;
            case '2':                                
                $licznik = 0;
                foreach ($this->textArtefakty as $wynik){ 
                    if($wynik == $tekst){                
                        $licznik++;                
                    }
                }
                if ($licznik == 0){
                    $this->textArtefakty[] = $tekst;
                }
                break;
            case '3':
                $licznik = 0;
                foreach ($this->textInne as $wynik){ 
                    if($wynik == $tekst){                
                        $licznik++;                
                    }
                }
                if ($licznik == 0){
                    $this->textInne[] = $tekst;
                }
                break;
        }
        
    }
 
    function przypiszTextPoz($val, $nr_pytania) {
        
        switch ($nr_pytania){
            case 'x_1_1':
                
                switch ($val){
                    case 0:
                        
                        $wynikText = $this->x_1_1_zero;
                        break;
                    case 0.5:
                       
                        $wynikText = $this->x_1_1_pol;
                        break;
                }

                break;
            case 'x_1_2':
                switch ($val){
                    case 0:
                        $wynikText = $this->x_1_2_zero;
                        break;
                    case 0.5:
                        $wynikText = $this->x_1_1_pol;
                        break;
                }
                break;
            case 'x_1_3':
                switch ($val){
                    case 0:
                        $wynikText = $this->x_1_3_zero;
                        break;
                    case 0.5:
                        $wynikText = $this->x_1_3_pol;
                        break;
                }
                break;
            case 'x_1_4':
                switch ($val){
                    case 0:
                        $wynikText = $this->x_1_4_zero;
                        break;
                    case 0.5:
                        $wynikText = $this->x_1_4_pol;
                        break;
                }
                break;
            case 'x_1_5':
                switch ($val){
                    case 0:
                        $wynikText = $this->x_1_5_zero;
                        break;
                    case 0.5:
                        $wynikText = $this->x_1_5_pol;
                        break;
                }
                break;
            case 'x_1_6':
                switch ($val){
                    case 0:
                        $wynikText = $this->x_1_6_zero;
                        break;
                    case 0.5:
                        $wynikText = $this->x_1_6_pol;
                        break;
                }
                break;
            case 'x_1_7':
                switch ($val){
                    case 0:
                        $wynikText = $this->x_1_7_zero;
                        break;
                    case 0.5:
                        $wynikText = $this->x_1_7_pol;
                        break;
                }
                break;
            case 'x_1_8':
                switch ($val){
                    case 0:
                        $wynikText = $this->x_1_8_zero;
                        break;
                    case 0.5:
                        $wynikText = $this->x_1_8_pol;
                        break;
                }
                break;
            case 'x_1_9':
                switch ($val){
                    case 0:
                        $wynikText = $this->x_1_9_zero;
                        break;
                    case 0.5:
                        $wynikText = $this->x_1_9_pol;
                        break;
                }
                break;
            case 'x_1_10':
                switch ($val){
                    case 0:
                        $wynikText = $this->x_1_10_zero;
                        break;
                    case 0.5:
                        $wynikText = $this->x_1_10_pol;
                        break;
                }
                break;
        }
        
        return $wynikText;
    }
    
     function przypiszTextArt($val) {
         
         switch ($val){
                    case 0:
                        $wynikText = $this->x_2_all_zero;
                        break;
                    case 1:
                        $wynikText = $this->x_2_all_jeden;
                        break;
                    case 2:
                        $wynikText = $this->x_2_all_dwa;
                        break;                    
                }
         
         return $wynikText; 
     }
     function przypiszTextInne($val, $nr_pytania) {
         
        switch ($nr_pytania){
            case 'x_3_1':
                switch ($val){
                    case 1:
                        $wynikText = $this->x_3_1_jeden;
                        break;
                    case 2:
                        $wynikText = $this->x_3_1_dwa;
                        break;
                    case 3:
                        $wynikText = $this->x_3_1_trzy;
                        break;
                    case 4:
                        $wynikText = $this->x_3_1_cztery;
                        break;
                }
                break;
            case 'x_3_2':
                switch ($val){
                    case 1:
                        $wynikText = $this->x_3_2_jeden;
                        break;
                    case 2:
                        $wynikText = $this->x_3_2_dwa;
                        break;
                    case 3:
                        $wynikText = $this->x_3_2_trzy;
                        break;
                    case 4:
                        $wynikText = $this->x_3_2_cztery;
                        break;
                }
                break;
            case 'x_3_3':
                switch ($val){
                    case 1:
                        $wynikText = $this->x_3_3_jeden;
                        break;
                    case 2:
                        $wynikText = $this->x_3_3_dwa;
                        break;
                    case 3:
                        $wynikText = $this->x_3_3_trzy;
                        break;
                    case 4:
                        $wynikText = $this->x_3_3_cztery;
                        break;
                }
                break;
        }
         
         return $wynikText; 
     }
}
?>