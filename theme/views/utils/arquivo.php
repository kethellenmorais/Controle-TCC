<?php

if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {

  $nome_grupo = $_POST['nome_grupo'];

  $name = $nome_grupo . "-" . uniqid() . "-" . $_FILES['file']['name'];
  $name = str_replace(" ", "", $name);

  $valida = explode(".", $name);

  $ext = array("pdf", "docx", "doc", "txt", "zip");

  if (!in_array(end($valida), $ext)) {
    $callback["error"] = "Formato não suportado (<b>" . end($valida) . "</b>).<br>Formatos suportados: <b>pdf, docx, doc, txt, zip</b>.";
    $callback["type"] = "error";

    echo json_encode($callback);
  } else {
    $upload = move_uploaded_file(
      $_FILES['file']['tmp_name'],
      dirname(__DIR__, 2) . "/assets/docs/" . $name
    );

    $callback["filename"] = $name;

    echo json_encode($callback);
  }
} else {

  $callback["error"] = "Não foi possível realizar a entrega";
  $callback["type"] = "error";
  $callback["reload"] = true;

  echo json_encode($callback);
}
