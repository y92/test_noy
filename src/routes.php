<?php

use Slim\Http\Request;
use Slim\Http\Response;

require '../vendor/autoload.php';

    include ("Modal/MySQL.php");
    include ("Project.php");
   

$app->get('/InsertSql', function (Request $request, Response $response ) {
    

  
       $Mysql= new MySQL();
           
        $nametable="projet";

        $valeur= [
            "nom" => "'newname'",
            "lien"=>"42"
                ] ;
        
       
       $Mysql->insert($nametable,$valeur);
       
       
    return $response->withJson(['a' => 1]);
});

$app->get('/DeleteSql', function (Request $request, Response $response ) {
    
 
    
       $Mysql= new MySQL();
       
       $nameTable="projet";
       
        $where[] = [
            "champs1" => "nom",
            "operations" => "=",
            "conditions" => "OR",
            "champs2" =>"'32'"
            ] ;
        
                $where[] = [
            "champs1" => "id",
            "operations" => "=",
            "conditions" => "OR",
            "champs2" =>"38"
            ] ;
        

        
      $result = $Mysql->Delete($nameTable,$where,false);
              
       
    return $response->withJson(['a' => $result]);
});



$app->get('/SelectSql', function (Request $request, Response $response ) {
    
    
    
       $Mysql= new MySQL();
       
       $nameTable="projet";
       
        $champSelected = array('id','nom','lien');
        
        $Where[] = [
            "champs1" => "id",
            "operations" => "=",
            "conditions" => "OR",
            "champs2" => 26
] ;
        
        $Where[] = [
            "champs1" => "id",
            "operations" => "=",
            "conditions" => "OR",
            "champs2" => 25
] ;

                $isAll = true;
        
   
$result = $Mysql->Select($nameTable, $isAll, "", $Where);

      
    return $response->withJson(['a' => $result]);
});


$app->get('/UpdateSql', function (Request $request, Response $response ) {
    
 
    
       $Mysql= new MySQL();
       $nameTable="projet";
       
       
       
       $whereup[] = [
            "champs1" => "id",
            "operations" => "=",
            "conditions" => "OR",
            "champs2" => "23"
] ;   
        $whereup[] = [
            "champs1" => "id",
            "operations" => "=",
            "conditions" => "OR",
            "champs2" => "26"
] ;   
        $valeur= [
            "nom" => "'uuu'",
            "lien"=>"'uuuuuu'"

] ;
        
       $result=$Mysql->Update($nameTable, $valeur, $whereup);
    return $response->withJson(['a' => $result]);
       
        
});


$app->get('/InsertOne', function (Request $request, Response $response ) {
    $u = new Project("test");
 
    $array = [
                "nom"=>"krulilin",
                "prenom"=>"san",
                "age"=> "28",
                "adresse" =>" Earth"
            ];
    
   $u->Insert($array);
     $r = $u->find();
    
   print_r($r) ; die ;
    return $response->withJson(['a' => 1]);
});



$app->get('/DeleteOne', function (Request $request, Response $response ) {
    $u = new Project("test");

    $arrayDelet = [
                "nom"=>"islem",
                "age"=> "23",
                
            ];

     $u->DeleteOne($arrayDelet);
     $r = $u->find();
    
   print_r($r) ; die ;
    return $response->withJson(['a' => 1]);
});



$app->get('/DeleteMany', function (Request $request, Response $response ) {
    $u = new Project("test");

    $arrayDelet = [
                "nom"=>"islem",
                "age"=> "23",
                
            ];

     $u->DeleteMany($arrayDelet);
     $r = $u->find();
    
   print_r($r) ; die ;
    return $response->withJson(['a' => 1]);
});

$app->get('/Drop', function (Request $request, Response $response ) {
    $u = new Project("test");
    $u->Drop();
    var_dump("oke");die;

    return $response->withJson(['a' => 1]);
});







$app->get('/FindMany', function (Request $request, Response $response ) {
    
    $u = new Project("say");
        $array =  [ 
                    "nom" => "Goku"
                  ];
        
        $array2=[];

  $result= $u->find($array);
  

  
  
foreach ((array)$result as $doc) {
     
    print_r($doc);
}

  die;
  
  echo $result;die;
 
    return $response->withJson(['a' => 1]);
});



$app->get('/UpdateObject', function (Request $request, Response $response ) {
    $u = new Project("say");

    $newdata= array('$set' =>array("nom" => "red"));
    
   $u->Updateobjec(array("nom" => "blue"),$newdata );
   
     $r = $u->find();
    
   print_r($r) ; die ;
    return $response->withJson(['a' => 1]);
});




$app->get('/InsertMany', function (Request $request, Response $response ) {
    $u = new Project("say");
 
    $array =[
   
                [   'nom'=>'krulilin',
                    'prenom'=>'san',
                    'age'=> '39',
                    'adresse' => 'Earth',
                ],
                [
                    "nom"=>"Goku",
                    "prenom"=>"Son",
                    "age"=> "39",
                    "adresse" =>" Earth",


                ],
                [
                    "nom"=>"Gohan",
                    "prenom"=>"Son",
                    "age"=> "29",
                    "adresse" =>" Earth"


                  ],
            ];

    
   $u->InsertMany($array);
   
   
     $r = $u->find();
    
   print_r($r) ; die ;
    return $response->withJson(['a' => 1]);
});


$app->get('/SqlQuery', function (Request $request, Response $response ) {
    
    
    $Mysql= new MySQL();
    
    //$Mysql->setRequest("INSERT INTO projet (nom, lien) VALUES ('Rebecca', 'Armand'), ('Aime', 'Hebert'), ('Marielle', 'Ribeiro'), ('Hilaire', 'Savary')");
    
    //$Mysql->setRequest("SELECT * FROM projet");
   // $Mysql->setRequest("UPDATE projet SET nom = 'Saint', lien = 'Saint-Eustache' WHERE id = 42");
    //$Mysql->setRequest("DELETE FROM `projet` WHERE `id` = 42");
     
     $ifselect = false;
    
     $result = $Mysql->QuerySQL($ifselect);
     

              
       
    return $response->withJson(['Result' => $result]);
});


