<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class DisciplinaController
{
    public function disciplina()
    {
        $disciplinas = App::get('database') -> selectAll('disciplinas');

        $table = [
            'disciplinas' => $disciplinas
        ];

        return view('/admin/disciplina', $table);
    }
    
    public function show()
    {
        
    }

    public function createDisciplinas()
    {
        $parametros = [
            'disciplina' => $_POST['disciplina'],
            'codigo' => $_POST['codigo'],
            'turma' => $_POST['turma'],
            'professor' => $_POST['professor'],
            'departamento' => $_POST['departamento']
        ];

        App::get('database') -> insertDisciplinas('disciplinas', $parametros);
        header('Location: /disciplina');
    }

    public function store()
    {

    }

    public function updateDisciplinas()
    {
        $parametros = [
            'id' => $_POST['id'],
            'disciplina' => $_POST['disciplina'],
            'codigo' => $_POST['codigo'],
            'turma' => $_POST['turma'],
            'professor' => $_POST['professor'],
            'departamento' => $_POST['departamento']
        ];

        App::get('database')->editDisciplinas('disciplinas', $parametros);
        header('Location: /disciplina');
    }

    public function delete()
    {
        App::get('database') -> delete('disciplinas', $_POST['id']);
        header('Location: /disciplina');
    }
}