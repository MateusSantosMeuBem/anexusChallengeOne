<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>View Users</title>
</head>
<body>
    <?php
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
        if (count($users) > 0){
            echo '<div class="container">';
            echo '<div class="title">Indicados</div>';
            echo '<div class="inner-container">';
            for($i = 0; $i < count($users); $i++){

                $user_id = $users[$i]['user_id'];
                $user_name = $users[$i]['nome'];
                $points_l = $users[$i]['points_l'];
                $points_r = $users[$i]['points_r'];
                $all_points = $users[$i]['all_points'];
    
                if (($points_l == '')||($points_l == null)){
                    $points_l = 0;
                }
                if (($points_r == '')||($points_r == null)){
                    $points_r = 0;
                }
                if (($all_points == '')||($all_points == null)){
                    $all_points = 0;
                }
                
                $disabled_l = $points_l != 0 ? 'disabled=true': '';
                if ($points_l == 0){
                    $disabled_r = 'disabled=true';
                }else{
                    $disabled_r = $points_r != 0 ? 'disabled=true': '';
                }
    
                echo '
                        <div class="main">
                            <form action="addUser.php" method="post">
                            <input type="hidden" name="user_id" value="'.$user_id.'">
                                <div class="vertical">
                                    <img src="src/user.jpg" class="img-user">
                                    <div class="horizontal contents space-around">
                                        <div class="name-user">'.$user_name.'</div>
                                        <div class="vertical button-box space-around">
                                            <input type="submit" name="recom" '.$disabled_l.' value="+1 indicação" class="button">
                                            <input type="submit" name="recom" '.$disabled_r.' value="+1 indicação" class="button">
                                        </div>
                                        <div class="pontos horizontal">
                                            '.$all_points.' pontos
                                            <div class="vertical button-box">
                                                <div class="pontos-sides">'.$points_l.'</div>
                                                <div class="pontos-sides">'.$points_r.'</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                ';
            }
            echo '</div>';
            echo '<img src="src/logo.png" class="img_footer">';
            echo '</div>';
        }else{
            echo '
            <div class="main-add-user horizontal space-around">
                <form action="addUser.php" method="post">
                    <div class="horizontal">
                        <input type="hidden" name="user_id" value="aa">
                        <div class="title">Comece inserindo alguém! ^_^</div>
                        <input type="submit" name="recom"  value="Começar" class="button">
                        <img src="src/logo.png" class="img_footer">
                    </div>
                </form>
            </div>
            ';
        }

        
    ?>

    
</body>
</html>