<?php

namespace LojaAgua\persistencia;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

abstract class AbstractDAO {

  public $entityPath;
  public $entityManager;

  public function __construct($entityPath) {
    $this->entityPath = $entityPath;
    $this->entityManager = $this->createEntityManager();
  }

  public function createEntityManager(){

    $path = array (
      'LojaAgua/entidades'
    );

    $devMode = true;

    $config = Setup::createAnnotationMetadataConfiguration ($path, $devMode);

    $connectionOptions = array (
      'dbname' => 'vendaagua',
      'user' => 'root',
      'password' => '',
      'host' => 'localhost',
      'driver' => 'pdo_mysql'
    );

    return EntityManager::create ($connectionOptions, $config);

  }

  public function insert($obj){
    $this->entityManager->persist($obj);
    $this->entityManager->flush();
  }
  public function update($obj){
    $this->entityManager->merge($obj);
    $this->entityManager->flush();
  }
  public function delete($obj){
    $this->entityManager->remove($obj);
    $this->entityManager->flush();
  }
  public function findById($id){
    return $this->entityManager->find($this->entityPath, $id);
  }
  public function findAll(){
    $collection = $this->entityManager ->getRepository($this->entityPath)->findAll();

    $data = array();
    foreach($collection as $obj){
      $data[] = $obj;
    }

    return $data;
  }

}
