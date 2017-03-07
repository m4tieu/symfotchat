<?php
namespace AppBundle\Service;

use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MessageTchat
 *
 * @author loic
 */
class MessageTchat implements MessageComponentInterface{
    public function onClose(ConnectionInterface $conn) {
        
    }

    public function onError(ConnectionInterface $conn, Exception $e) {
        
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        var_dump($msg);
    }

    public function onOpen(ConnectionInterface $conn) {
        echo "Heil !";
    }

//put your code here
}
