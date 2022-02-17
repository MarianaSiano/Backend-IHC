<?php

namespace App\Core\Database;

use PDO;
use Exception;

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $sql = "SELECT * FROM {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function select($table, $id)
    {
        $sql = "SELECT * FROM {$table} WHERE id = {$id}";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insertDisciplinas($table, $parametros)
    {
        $sql = "INSERT INTO `{$table}` (disciplina, codigo, turma, professor, departamento)
            values (
                '{$parametros['disciplina']}',
                '{$parametros['codigo']}',
                '{$parametros['turma']}',
                '{$parametros['professor']}',
                '{$parametros['departamento']}'
            )";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editDisciplinas($table , $parametros)
    {
        $sql = "UPDATE {$table} SET ";

            //Adicionando os parametros
            foreach($parametros as $chave => $parametro)
            {
                $sql = $sql . "{$chave} = '{$parametro}', ";
            }

            //Tirando a ultima virgula
            $sql = rtrim($sql, " " . ",");

            //Adicionando o id
            $sql = $sql . " WHERE id = {$parametros['id']}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function delete($table, $id)
    {
        $sql = "delete from {$table} where id = {$id}";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function pesquisa($table, $parametro)
    {
        if ($table == 'disciplinas') {
            $sql = "SELECT * FROM {$table} WHERE `disciplina` LIKE '%{$parametro}%' OR `codigo` LIKE '%{$parametro}%' OR `professor` LIKE '%{$parametro}%'";
        } else {
            $sql = "SELECT * FROM {$table} WHERE `disciplina` LIKE '%{$parametro}%'";
        }

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
