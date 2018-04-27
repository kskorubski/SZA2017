<?php

/**
 * Description of WynikiEtykiety
 *
 * @author studio
 */
 class TWynikiEtykiety extends CApplicationComponent{     
        var $model_etykieta;
        var $metoda;

//Etykieta
        var $ety_uzyskana;
        var $progZalEtykieta;
        const ETY_MAX_CYFRA = 15;
        const ETY_MAX_ANALOG = 24;
        var $ety_zaliczono_status; //v 2017 potrzebne do zwrocenia statusu etykietu - determinuje dalszy przebieg audyt
        
        
        public function __construct() {
            
        }
        
        public function setData($model_etykieta,$metoda) {
            $this->model_etykieta = $model_etykieta;
            $this->metoda = $metoda;    
            $this->policz();            
        }        

        public function policz(){
  
            $this->sumator();
            
            switch ($this->metoda){
                case 'cyfrowa':   
                    $this->progZalEtykieta = (0.6 * $this->ETY_MAX_CYFRA);
                    break;
                case 'analogowa':   
                    $this->progZalEtykieta = (0.6 * self::ETY_MAX_ANALOG);
                    break;
            }
        }
        
        function sumator() {

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
  
        }
       
        function getETY_MAX_CYFRA() {
            return self::ETY_MAX_CYFRA;
        }
        function getETY_MAX_ANALOG() {
            return self::ETY_MAX_ANALOG;
        }
        
        function getEty_uzyskana() {
            return $this->ety_uzyskana;
        }
        function getEty_zaliczono_status() {
           if($this->ety_uzyskana >= $this->progZalEtykieta){
                $this->ety_zaliczono_status = 1;
            }else {
                $this->ety_zaliczono_status = 2;
            }
            return $this->ety_zaliczono_status; 
        }

    }

    
    
