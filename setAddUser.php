<?php

    $father_id = isset($_POST['father_id'])? $_POST['father_id']:-1;
    $user_name = isset($_POST['user_name'])? $_POST['user_name']:-1;
    $points = isset($_POST['points'])? $_POST['points']:-1;


    // If father_id, user_name or points isn't setted, it redirect user to errorPage.php
    if (($father_id == -1)||($user_name == -1)||($points == -1)){
        header('Location: errorPage.php');
        die();
    }

    // Get value of a side
    function getPoints($user_id, $side){
        try{
            //define PDO - tell about the database file
            $pdo = new PDO('sqlite:database_ax.db');

            //write SQL
            $statement = $pdo->query("SELECT ".$side.", all_points FROM user WHERE user_id='".$user_id."'");

            //run the SQL
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);


        }catch(PDOException $e){
            $rows = 0;
        }
        return $rows[0];
    }

    function addRecom($user_name, $points, $father_id){

        // Just if not the first user in the system
        if ($father_id != 'aa'){
            // Checking if left side is allready full 
            $all = getPoints($father_id, 'points_l');
            $value_side = $all['points_l'];
            $old_score = $all['all_points'];
    
            if($old_score == ''){
                $old_score = 0;
            }
            // Father receiving its points
            if (($value_side == '')||($value_side == null)||($value_side == '0')){
                $score = (float)$old_score + (float)$points;
                $sql_father = "UPDATE user SET points_l = '".$points."', all_points = '".$score."' WHERE  user_id = '".$father_id."'";
            }else{
                $score = (float)$old_score + (float)$points;
                $sql_father = "UPDATE user SET points_r = '".$points."', all_points = '".$score."' WHERE  user_id = '".$father_id."'";
            }
        }

        // New user being created 
        $sql_user = "INSERT INTO user (nome, all_points) VALUES ('".$user_name."', '".$points."')";

        try{
          //define PDO - tell about the database file
          $pdo = new PDO('sqlite:database_ax.db');

          //Execute the query
          $pdo->exec($sql_user);
          if ($father_id != 'aa'){
            $pdo->exec($sql_father);
          }
          
        }catch(PDOException $e){
          $_SESSION['error'] = $e;
        }
    }

    addRecom($user_name, $points, $father_id);
    header('Location: index.php?user_name='.$user_name.'');


?>