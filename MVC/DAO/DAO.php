<?php
namespace ProjetPHPTutorat\MVC\DAO;

use PDO;

abstract class DAO {
protected PDO $bdd;

public function __construct(PDO $connect) {
// Remplacez ConnexionPGSQL::getInstance() par la méthode de connexion désirée
$this->bdd = $connect;
// ou $this->connect = ConnexionMySQL::getInstance();
}

/**

Méthode de création
@param mixed $obj
@return bool*/
public abstract function create($obj): bool;

/**

Méthode pour effacer
@param mixed $obj
@return bool*/
public abstract function delete($obj): bool;

/**

Méthode de mise à jour
@param mixed $obj
@return bool*/
public abstract function update($obj): bool;

/**

Méthode de recherche des informations
@param int $id
@return mixed*/
public abstract function find(int $id): object;

/**

Méthode de recherche des informations
@return array*/
public abstract function getAll(): array;
}
?>