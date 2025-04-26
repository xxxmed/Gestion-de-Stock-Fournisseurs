<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include "conexion.php";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="help.jpg">
    <link rel="stylesheet" href="style.css">
</head>
<?php 
    $sql = 'SELECT * FROM fournisseurs';
    $result = mysqli_query($conn, $sql);
    $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
<body>
<h1 >SAISIE</h1>
    <hr>
    
        <form name="form"  method="post">
            <label for="cp">Product Code:</label><br>
            <input autofocus id="cp" type="text" name="prod_code" required placeholder="Enter product code"><br><br>

            <label for="pd">Product Designation:</label><br>
            <input id="pd" type="text" name="prod_designation" required placeholder="Enter product designation"><br><br>

            <label for="pp">Product Price:</label><br>
            <input id="pp" type="number" name="prod_prix_a" required placeholder="Enter product price"><br><br>

            <label for="pm">Product Marge:</label><br>
            <input id="pm" type="number" name="prod_marge" required placeholder="Enter product marge"><br><br>

            <label for="pq">Product Quantity:</label><br>
            <input id="pq" type="number" name="prod_quantite_st" required placeholder="Enter product quantity"><br><br>

            <label for="ps">Product Seuil:</label><br>
            <input id="ps" type="number" name="prod_seuil" required placeholder="Enter product seuil"><br><br>

            <label for="if">ID Fournisseur:</label><br>
            <select id="if" class="rt" required name="id_fournisseur">
            <option value="" disabled selected hidden>Select ID fournisseur</option>
            <?php foreach ($feedback as $item):?>
                <option value="<?php echo $item["id_fournisseur"]?>">
                  <?php echo $item["id_fournisseur"]." ".$item["responsable"] ?>
                </option>
            <?php endforeach; ?>
            </select><br><br>
            
            <input type="submit" name="submit" value="Submit"><br><br>
            <input type="reset" name="reset" value="reset"><br><br>
            <a href="hist.php" class="b">Historique</a>
            <a href="double.php" class="b">Double Seuil</a>
        </form>
    

    <?php
    if(isset($_POST['submit'])){
        $code=$_POST['prod_code'];
        $design=$_POST['prod_designation'];
        $prix=$_POST['prod_prix_a'];
        $marge=$_POST['prod_marge'];
        $quant=$_POST['prod_quantite_st'];
        $seuil=$_POST['prod_seuil'];
        $fourn=$_POST['id_fournisseur'];

        $sql="insert into  stock (prod_code,prod_designation,prod_prix_a,prod_marge,prod_quantite_st,prod_seuil,id_fournisseur) values(?,?,?,?,?,?,?)";
        $stat=$conn->prepare($sql);
        $stat->bind_param("ssdiiii",$code,$design,$prix,$marge,$quant,$seuil,$fourn);
        $stat->execute();
    }
    ?>
</body>
</html>