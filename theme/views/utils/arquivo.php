<?php

if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {

  $nomenclatura = move_arquivo($_FILES);

  $callback["message"] = "Entrega realizada com sucesso";
  $callback["type"] = "success";
  $callback["filename"] = $nomenclatura;
  $callback["reload"] = true;

  echo json_encode($callback);

} else {

  $callback["error"] = "Não foi possível realizar a entrega";
  $callback["type"] = "error";
  $callback["reload"] = true;

  echo json_encode($callback);
}

function move_arquivo(array $arquivo): string
{
  $name = uniqid() . "-" . $arquivo['file']['name'];
  $name = str_replace(" ", "", $name);

  $upload = move_uploaded_file(
    $arquivo['file']['tmp_name'],
    dirname(__DIR__, 2) . "/assets/docs/" . $name
  );

  return $name;
}
