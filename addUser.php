<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>Document</title>
</head>
<body>

    <?php
        $father_id = isset($_POST['user_id'])? $_POST['user_id']:-1;
        // If user_id isn't setted, it redirect user to errorPage.php
        if ($father_id == -1){
            header('Location: errorPage.php');
            die();
        }
        
        function getUsers(){
            try{
                //define PDO - tell about the database file
                $pdo = new PDO('sqlite:database_ax.db');
  
                //write SQL
                $statement = $pdo->query("SELECT * FROM user");
  
                //run the SQL
                $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
  
  
            }catch(PDOException $e){
                $rows = 0;
            }
            return $rows;
        }

        $users = getUsers();

    ?>

    <form action="setAddUser.php" method="post">
        <div class="main-add-user horizontal">
            <div class="title">ADICIONAR INDICADO</div>
            <input type="hidden" name="father_id" value="<?php echo $father_id; ?>">
            <input type="text" class="input-content" name="user_name" placeholder="Nome aqui" required>
            <!-- If it is the first person in system, then dissabe this button -->
            <input type="number" class="input-content" name="points" min="1" <?php if (count($users) == 0) { echo 'readonly'; } ?> value="0" placeholder="Pontuação aqui" required>
            <input type="submit" value="SALVAR" class="button">
        </div>
    </form>
</body>
</html>