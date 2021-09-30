<?php
  try
  {

    $db = new PDO('mysql:host=localhost;dbname=db_tasks;charset=UTF8' , 'root' , '' );
    if(isset($_POST['clear']) or isset($_POST['done']))
    {
      $req = $db->prepare('DELETE FROM db_tasks_table WHERE id = :idtodelete');
      $req->execute(array('idtodelete' => $_POST['id']));
      header('location: index.php');
    }
    if(isset($_POST['tasktoadd']) and !empty($_POST['tasktoadd']) )
    {
      $req = $db->prepare('INSERT INTO db_tasks_table(tasks,heure) VALUES( :task , NOW() )');
      $req->execute(array('task' => $_POST['tasktoadd']));

      require('index.php');
    }
    else
    {
      header('location:index.php');
    }

  }
  catch(Exception $e)
  {
    die('Erreur :' .$e->getMessage());
  }

?>
