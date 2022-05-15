<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Add Note</title>
</head>

<body >
<div class="container">
    <div class="row">
        <div class="col-5">
            <form  action="index.php" method="POST">
                <h1>Note</h1>
                <textarea rows="4" cols="50" name = "note"></textarea><br>
                <input  type = "submit" name = "submit" value = "Submit" class="btn btn-primary"/>
            </form>
        </div>
        <div class="col-7 row">
            <?php
            if (isset($_POST['submit'])){
                if(!empty($_POST['note'])){
                    if(empty($_SESSION['notes'])){
                        $_SESSION['notes']=array();}
                    array_push($_SESSION['notes'],$_POST['note']);
                    $nbrNotes= count($_SESSION['notes']);
                    for($i=0; $i<$nbrNotes;$i++){
                        echo "<div style='  
                           width:12em;
                           height:12em;
                           background:#FFFF8F;
                           display:block;
                           padding:1em;
                           margin:10px'>".$_SESSION['notes'][$i]."</div>";
                    };

                }
            }
            ?>
        </div>

    </div>
</div>
<script src="js/bootstrap.js"></script>
</body>
</html>