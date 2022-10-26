<?php

namespace Src\Controllers;

session_start();

use League\Plates\Engine;
use Src\Models\User;
use Src\Models\Group;
use Src\Models\Task;

class App
{
  /** @var Engine */
  private $view;

  public function __construct($router)
  {
    $this->view = Engine::create(
      dirname(__DIR__, 2) . "/theme/views",
      "php"
    );

    $this->view->addData(["router" => $router]);
  }

  public function login(): void
  {
    echo $this->view->render("login", [
      "title" => "Login"
    ]);
  }

  public function login_post(array $data): void
  {
    $itemData = filter_var_array($data, FILTER_DEFAULT);

    $usuario = htmlspecialchars($data["username"], ENT_QUOTES);
    $senha = htmlspecialchars($itemData['password'], ENT_QUOTES);

    $user = (new User())->find("username = :user", "user=$usuario")->fetch();

    if (password_verify($senha, $user->password)) {
      $_SESSION['user'] = $user->id;
      $_SESSION['user_type'] = $user->access;

      $callback["message"] = "Login realizado com sucesso";
      $callback["type"] = "success";
      echo json_encode($callback);
    } else {
      $callback["error"] = "Usuário e senha incorretos!!!";
      $callback["type"] = "error";
      echo json_encode($callback);
    }
  }

  public function cadastro(): void
  {
    echo $this->view->render("cadastro", [
      "title" => "Cadastro"
    ]);
  }

  public function cadastro_post(array $data): void
  {
    $user = new User();

    $username_enviado = htmlspecialchars($data["username"], ENT_QUOTES);
    $user_verify = (new User())->find("username = :user", "user=$username_enviado")->fetch();

    if (!empty($user_verify)) {
      $callback["error"] = "Já existe alguém utilizando esse username!!!";
      $callback["type"] = "error";
    } else {

      $user->name = htmlspecialchars($data["name"], ENT_QUOTES);
      $user->username = $username_enviado;
      $user->password = password_hash(htmlspecialchars($data["password"], ENT_QUOTES), PASSWORD_DEFAULT);
      $user->access = htmlspecialchars($data["access"], ENT_QUOTES);
      $user->save();

      $usuario = htmlspecialchars($data["access"], ENT_QUOTES) == 1 ? "Aluno" : "Professor";

      $callback["message"] = "$usuario cadastrado com sucesso";
      $callback["type"] = "success";
    }
    echo json_encode($callback);
  }

  public function inicio(): void
  {

    if (!empty($_SESSION['user']) && $_SESSION['user_type'] == 2) {
      $grupos = (new Group())->find("teacher_id_group = :user", "user=$_SESSION[user]")->fetch(true);
      $alunos = (new User())->find("access = :type", "type=1")->fetch(true);

      echo $this->view->render("inicio", [
        "title" => "Inicio",
        "grupos" => $grupos,
        "alunos" => $alunos,
      ]);
    } elseif (!empty($_SESSION['user']) && $_SESSION['user_type'] == 1) {
      $grupos = (new Group())->find("user_id_group = :user", "user=$_SESSION[user]")->fetch(true);
      $tasks = (new Task())->find("group_id = :group", "group=$grupos->id")->fetch(true);

      echo $this->view->render("inicio", [
        "title" => "Inicio",
        "grupos" => $grupos,
        "tasks" => $tasks,
      ]);
    } else {
      echo $this->view->render("login", [
        "title" => "Login"
      ]);
    }
  }

  public function nova_senha(array $data): void
  {
    $current_password = htmlspecialchars($data["current_password"], ENT_QUOTES);
    $new_password = htmlspecialchars($data["new_password"], ENT_QUOTES);
    $confirm_password = htmlspecialchars($data["confirm_password"], ENT_QUOTES);

    $user = (new User())->find("id = :id", "id=$_SESSION[user]")->fetch();

    if (password_verify($current_password, $user->password)) {

      if ($new_password == $confirm_password) {
        $user->password = password_hash($new_password, PASSWORD_DEFAULT);
        $user->save();

        $callback["message"] = "Senha atualizada com sucesso";
        $callback["type"] = "success";
      } else {
        $callback["error"] = "As senhas informadas estão diferentes!!!";
        $callback["type"] = "error";
      }
    } else {

      $callback["error"] = "A senha atual está incorreta!!!";
      $callback["type"] = "error";
    }

    echo json_encode($callback);
  }

  public function calendario(): void
  {

    if (!empty($_SESSION['user']) && $_SESSION['user_type'] == 2 || $_SESSION['user_type'] == 1) {
      echo $this->view->render("calendario", [
        "title" => "Calendário"
      ]);
    } else {
      echo $this->view->render("login", [
        "title" => "Login"
      ]);
    }
  }

  public function detalhe_grupo(array $data): void
  {

    if (!empty($_SESSION['user']) && $_SESSION['user_type'] == 2 || $_SESSION['user_type'] == 1) {
      $grupo = (new Group())->findById($data["id"]);

      if ($grupo) {
        echo $this->view->render("detalhe", [
          "title" => "Detalhes",
          "grupo" => $grupo
        ]);
      }
    } else {
      echo $this->view->render("login", [
        "title" => "Login"
      ]);
    }
  }

  public function sair(): void
  {
    session_destroy();

    echo $this->view->render("login", [
      "title" => "Login"
    ]);
  }
}
