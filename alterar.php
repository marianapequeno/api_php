<?php
  //Incluir a conexão
  include("conexao.php");

  //Obter dados
  $obterDados = file_get_contents("php://input");

  //Extrair os dados do JSON
  $extrair = json_decode($obterDados);

  //Separar os dados do JSON
  $idCurso = $extrair->cursos->idCurso;
  $nomeCurso = $extrair->cursos->nomeCurso; //Neste caso, 'cursos' é nome do json que foi definido em listar/encode
  $valorCurso = $extrair->cursos->valorCurso;

  //SQL
  $sql = "UPDATE cursos SET nomeCurso='$nomeCurso', valorCurso=$valorCurso WHERE idCurso=$idCurso";
  mysqli_query($conexao, $sql);

  //Exportar os dados cadastrados via JSON
  $curso = [
    'idCurso' => $idCurso, 
    'nomeCurso' => $nomeCurso, 
    'valorCurso' => $valorCurso
  ]

  json_encode(['curso']=>$curso);
?>
