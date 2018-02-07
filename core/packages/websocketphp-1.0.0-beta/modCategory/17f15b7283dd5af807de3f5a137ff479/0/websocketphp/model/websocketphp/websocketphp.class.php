<?php

require(__DIR__ .'/external/websocket-php/vendor/autoload.php');

use WebSocket\Client;

class websocketphp{
    
    public $modx;
    
    function __construct(MODx $modx, $properties = array()){
        
        $this->modx = $modx;
    }
    
    public function send($data = array(), $host = ''){
        
        try{
            $client = $this->getClient($host);
            
            if(is_array($data)){
                $data = json_encode($data);
            }
            
            $result = $client->send($data);
        }
        catch(Exception $e){
            $result = $e->getMessage();
            $this->modx->log(1, $result);
        }
        
        return $result;
    }
    
    public function getClient($host = ''){
        
        if(!$host){
            $host = $this->modx->getOption("websocketphp.host");
        }
        
        return new Client($host);
    }
}

