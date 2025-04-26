<!DOCTYPE html>
<html lang="en">
<?php
include "conexion.php";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="help.jpg">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 >Details</h1>
    <hr>
    <?php 
    $a=$_GET["id"];
    $sql = 'SELECT * FROM fournisseurs where id_fournisseur=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $a);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
    ?>
    

 
    <form name="form"  method="post" >
   
            <label for="pd">Responsable:</label><br>
            <input id="pd" type="text" name="responsable" readonly value=<?php echo $item['responsable']?>><br><br>
            <label for="cp">Reason soc:</label><br>
            <textarea  id="cp" type="text" name="reason_soc" readonly cols="50"><?php echo isset($item['reason_soc']) ? $item['reason_soc'] : ''; ?></textarea><br><br>
            <label for="pp">Tel:</label><br>
            <input id="pp" type="number" name="tel" readonly value=<?php echo $item['tel']?>><br><br>

             
            <a href="hist.php" class="b">retour</a>
        </form>
        <br><br>
       
</body>
</html>