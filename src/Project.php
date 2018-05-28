<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '../vendor/autoload.php';
include ("Modal/MongoManager.php");

/**
 * Description of Project
 *
 * @author O
 */
class Project extends MongoManager
{
        protected 
            $doc;
    //put your code here
             function __construct($docs) {
           $this->initMongo();
           $docs = (string)$docs ; 
           
           $this->Collection = $this->ClientMongo-> ICOSCORING->$docs;
//             $this->Collection = $this->ClientMongo-> ICOSCORING->haha;
           

    }
        function getDoc() {
        return $this->doc;
    }
     function setDoc($doc) {
        $this->doc = $doc;
    }

    function GenerateCollection($array)
    {

        
//        $this->Collection->$this->doc;
        return $array;
    }

}
