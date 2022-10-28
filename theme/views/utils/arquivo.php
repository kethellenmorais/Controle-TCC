<?php

if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {

  $name = uniqid() . "-" . $_FILES['file']['name'];
  $name = str_replace(" ", "", $name);

  $upload = move_uploaded_file(
    $_FILES['file']['tmp_name'],
    dirname(__DIR__, 2) . "/assets/docs/" . $name
  );

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
