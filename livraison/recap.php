<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css">
</head>
<?php
$adds='';
if ($_POST['harissa'] == 'on') {
    $adds .='harissa ';
}
if ($_POST['salade'] == 'on') {
    $adds .='salade ';
}
if ($_POST['mayo'] == 'on') {
    $adds .='mayo ';
}

?>
<?php
$fileName= $_FILES['cin']['name'];
$fileTmpName= $_FILES['cin']['tmp_name'];
$fileError= $_FILES['cin']['error'];
$fileType= $_FILES['cin']['type'];

$fileExt = explode('.',$fileName);
$fileActualExt = strtolower(end($fileExt));
$allowed = array('jpg','jpeg','png','pdf');

?>
<body>
<h1 style="  align-content: center; color:#CC4949">détails de la commande: </h1>
<div class="container" style="margin-top: 6% ;color:antiquewhite">
    <div class="offset-md-5" style="margin-botton">
        <div class="row" style="margin-bottom: 0.5em">
            <div class="col-2">nom:</div>
            <div class="col-10"><?php echo strip_tags($_POST['nom']); ?></div>
        </div>
        <div class="row" style="margin-bottom: 0.5em">
            <div class="col-2">prénom:</div>
            <div class="col-10"><?php echo strip_tags($_POST['prénom']); ?></div>
        </div>
        <div class="row" style="margin-bottom: 0.5em">
            <div class="col-2">CIN:</div>
            <div class="col-10">
                <?php
                if (in_array( $fileActualExt, $allowed)){
                    if ($fileError === 0) {
                        $fileNameNew =uniqid('', true).'.'.$fileActualExt;
                        $fileDestination ='uploads/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        echo "$fileName";
                    }else {
                        echo "erreur!";
                    }
                }else {
                    echo "impossible de charger ce type de fichier!veuillez réessayer";
                }
                ?>
            </div>
        </div>
        <div class="row" style="margin-bottom: 0.5em">
            <div class="col-3">nombre de sandwiches:</div>
            <div class="col-1"><?php echo $_POST['nbSandwiches']; ?></div>
        </div>
        <div class="row" style="margin-bottom: 0.5em">
            <div class="col-2">Adresse:</div>
            <div class="col-10"><?php echo strip_tags($_POST['adresse']); ?></div>
        </div>
        <div class="row" style="margin-bottom: 0.5em">
            <div class="col-3">Type du sandwiche:</div>
            <div class="col-9"><?php echo $_POST['typeDuSandwiche']; ?></div>
        </div>
        <div class="row" style="margin-bottom: 0.5em" >
            <div class="col-3">vos suppléments:</div>
            <div class="col-9"><?php echo $adds; ?></div>
        </div>
    </div>
</div>
</body>
</html>

