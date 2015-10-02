<?php


class TarefaDAO
{

  public static function getTarefaByID($id) {
    $connection = Connection::getConnection();
    $sql = "SELECT * FROM toDoList_tarefas WHERE id=$id";
    $result  = mysqli_query($connection, $sql);
    $tarefa = mysqli_fetch_object($result);

    //recupera usuario do tarefa
    $sql = "SELECT * FROM toDoList_usuarios WHERE id=$tarefa->usuario_id";
    $result = mysqli_query($connection, $sql);
    $tarefa->usuario =  mysqli_fetch_object($result);
    
    //recupera categoria da tarefa
    $sql = "SELECT * FROM toDoList_usuarios WHERE id=$tarefa->categoria_id";
    $result = mysqli_query($connection, $sql);
    $tarefa->categoria =  mysqli_fetch_object($result);

    return $tarefa;
  }


  public static function getAll()
  {
    $connection = Connection::getConnection();
    $sql = "SELECT * FROM toDoList_tarefas";

    // recupera todos os tarefas
    $result  = mysqli_query($connection, $sql);
    $tarefas = array();
    while ($tarefa = mysqli_fetch_object($result)) {
      if ($tarefa != null) {
        $sql = "SELECT * FROM toDoList_usuarios WHERE id=$tarefa->usuario_id";
        $r = mysqli_query($connection, $sql);
        $tarefa->usuario =  mysqli_fetch_object($r);
        
        $tarefas[] = $tarefa;
      }
    }
    return $tarefas;
  }


  public static function updateTarefa($tarefa, $id) {
    $connection = Connection::getConnection();
    $sql = "UPDATE toDoList_tarefas SET nome='$tarefa->nome', usuario_id='$tarefa->usuario_id' WHERE id=$id";
    $result  = mysqli_query($connection, $sql);

    $tarefaAtualizado = TarefaDAO::getTarefaByID($id);
    return $tarefaAtualizado;
  }


  public static function deleteTarefa($id) {
    $connection = Connection::getConnection();
    $sql = "DELETE FROM toDoList_tarefas WHERE id=$id";
    $result  = mysqli_query($connection, $sql);

    if ($result === FALSE) {
      return false;
    } else {
      return true;
    }
  }


  public static function addTarefa($tarefa) {
    $connection = Connection::getConnection();
    $sql = "INSERT INTO toDoList_tarefas ( nome, usuario_id) VALUES ('$tarefa->nome', $tarefa->usuario_id)";
    $result  = mysqli_query($connection, $sql);
    
    $sql = "SELECT * FROM `toDoList_tarefas` WHERE nome = '$tarefa->nome' AND usuario_id = '$tarefa->usuario_id' ";
    $result  = mysqli_query($connection, $sql);
    $tarefa->id = mysqli_fetch_object($result)->id;
    
    $novoTarefa = TarefaDAO::getTarefaByID($tarefa->id);
    return $novoTarefa;
  }
}
