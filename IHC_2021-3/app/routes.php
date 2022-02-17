<?php

use App\Controllers\HomeController;
use App\Controllers\AvaliacaoController;
use App\Controllers\ContatoController;
use App\Controllers\SobreController;
use App\Controllers\IndexController;

use App\Controllers\AdmHomeController;
use App\Controllers\DisciplinaController;
use App\Controllers\GerarRelatorioController;
use App\Controllers\GraficosController;
use App\Controllers\GraficoDispersaoController;
use App\Controllers\TabelaCursosController;
use App\Controllers\GraficoAvaliacaoController;

//Metodos get do site
$router->get('home', 'HomeController@home');
$router->get('avaliacao', 'AvaliacaoController@avaliacao');
$router->get('contato', 'ContatoController@contato');
$router->get('sobre', 'SobreController@sobre');
$router->get('', 'IndexController@index');

//Metodos get da parte administrativa
$router->get('admHome', 'AdmHomeController@admHome');
$router->get('disciplina', 'DisciplinaController@disciplina');
$router->get('gerarRelatorio', 'GerarRelatorioController@relatorio');
$router->get('graficos', 'GraficosController@graficos');
$router->get('graficoDispersao', 'GraficoDispersaoController@dispersao');
$router->get('tabelaCursos', 'TabelaCursosController@cursosGraduacao');
$router->get('graficoAvaliacao', 'GraficoAvaliacaoController@graficoAvaliar');
$router->get('graficoCurso', 'GraficoCursoController@graficoCurso');
$router->get('listaCursos', 'ListaCursosController@listarCursosGraduacao');

//Metodos post
$router->post('contato/disparar', 'ContatoController@enviarEmail');
$router->post('disciplinas/create', 'DisciplinaController@createDisciplinas');
$router->post('disciplinas/update', 'DisciplinaController@updateDisciplinas');
$router->post('disciplinas/delete', 'DisciplinaController@delete');