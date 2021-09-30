<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title> TODOLIST </title>
    </head>

    <body>
      <h1> TO DO LIST </h1>
      <form method="post" action="post.php" >
        <p class="container">
          <input type="text" name="tasktoadd" placeholder="Ajoutez une tâche à votre 'TO DO LIST'" />
          <input type="submit" value="AJOUTER" />
        </p>

        <table>
          <tr>
            <th>TASK</th>
            <th>TIME</th>
            <th>OPTION</th>
          </tr>

          <?php
            $db = new PDO('mysql:host=localhost;dbname=db_tasks;charset=UTF8' , 'root' , '' );

            $req = $db->query('SELECT id,tasks, DATE_FORMAT(heure, \'%d/%m/%Y %Hh%imin%ss\' ) AS heure2 FROM db_tasks_table');

            while($data = $req->fetch())
            {
              echo '<tr><td>'.$data['tasks'].'</td>' . '<td>'.$data['heure2'].'</td>' . '<td><form action="post.php" method="post" >delete<input type="checkbox" name="clear" /> done<input type="checkbox" name="done"/> <input type="hidden" type="number"  name="id" value='.$data['id'].' /> <input type="submit" /> </form></td> </tr>';
            }
            $req->closeCursor();

          ?>
        </form>
        </table>
    </body>

</html>
