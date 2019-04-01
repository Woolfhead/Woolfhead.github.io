<?php
    namespace App\Controllers;
    class ControllersСurrency extends Controller{
        static $default = array(
            'apiKey' => 'apiKey=' . '265279dd7a7ee6646676',
            'apiPath' => 'https://free.currencyconverterapi.com/',
            'apiComands' => array(
                'currencies' => 'api/v6/currencies?',
                'convert' => 'api/v6/convert?q=USD_PHP,PHP_USD&compact=ultra&',

            ),
            'title' => 'Easy Сurrency Сonverter',
        );

        function __construct(){
            $data = array();
            $data['def'] = self::$default;
            
            $currencies = $data['def']['apiPath'] . $data['def']['apiComands']['currencies'] . $data['def']['apiKey'];
            $data['currencies'] = $this->get_cur($currencies);

            $convert =  $data['def']['apiPath'] . $data['def']['apiComands']['convert'] . $data['def']['apiKey'];
            
            if(!isset($data['title'])){
                $data['title'] = $data['def']['title'];
            }
            $this->view('currency.php', $data);
        }
        public function convert($url){
            $res = $this->get_cur($url);
            $arr = array();
            foreach ($res as $key => $val) {

                $countries = explode('_', $key);

                $arr[] = array(
                    'from' => $countries[0],
                    'to' => $countries[1],
                    'resNum' => $val
                );
            }
            return $arr;
        }
        public function get_cur($url){
            $ch = curl_init ($url) ;
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1) ;
            $res = curl_exec ($ch) ;
            curl_close ($ch);

            if(strlen($res) > 0){
                $res =  json_decode($res);
            }

            return ($res) ;
        }
        
    }