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
<h1 >HISTORIQUE</h1>
    <hr>
    <?php 
    $sql = 'SELECT * FROM stock where (prod_quantite_st =2*prod_seuil)' ;
    $result = mysqli_query($conn, $sql);
    $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
    <?php if (empty($feedback)): ?>
    <p class="lead">There is no historique</p><br>
    <a href="form.php" class="b">retour</a>
  <?php endif; ?>

  <?php foreach ($feedback as $item): ?>
    <form name="form"  method="post" >
   
            <input type="hidden" name="id_produit" value="<?php echo $item['id_produit']; ?>">

            <label for="cp">Product Code:</label><br>
            <input autofocus id="cp" type="text" name="prod_code" readonly value="<?php echo htmlspecialchars($item['prod_code']) ?>"> <br><br>

            <label for="pd">Product Designation:</label><br>
            <input id="pd" type="text" name="prod_designation" readonly value="<?php echo htmlspecialchars($item['prod_designation']) ?>"><br><br>

            <label for="pp">Product Price:</label><br>
            <input id="pp" type="number" name="prod_prix_a" readonly value="<?php echo htmlspecialchars($item['prod_prix_a']) ?>"><br><br>

            <label for="pm">Product Marge:</label><br>
            <input id="pm" type="number" name="prod_marge" readonly value="<?php echo htmlspecialchars($item['prod_marge']) ?>"><br><br>

            <label for="pq">Product Quantity:</label><br>
            <input id="pq" type="number" name="prod_quantite_st" readonly value="<?php echo htmlspecialchars($item['prod_quantite_st']) ?>"><br><br>

            <label for="ps">Product Seuil:</label><br>
            <input id="ps" type="number" name="prod_seuil" readonly value="<?php echo htmlspecialchars($item['prod_seuil']) ?>"><br><br>

            <label for="if">ID Fournisseur:</label><br>
            <input id="if" type="text" name="id_fournisseur" readonly value="<?php echo htmlspecialchars($item['id_fournisseur']) ?>"><br><br>

            <a class="modif" href="detail.php?id=<?php echo urlencode($item['id_fournisseur']) ?>">details fournisseur </a><br>
            <a class="modif" href="modif.php?id=<?php echo urlencode($item['id_produit']) ?>">modifier </a><br>
            <input type="submit" name="suprimer" value="suprimer"><br><br>
            <a href="form.php" class="b">retour</a>
        </form>
        <br><br>
        <?php
        if (isset($_POST['suprimer'])) {
            $id_produit = $_POST['id_produit'];
            $sql = "DELETE FROM stock WHERE id_produit=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id_produit);
            $stmt->execute();
            header("Location: double.php");
            exit;
        }
        ?>


    
  <?php endforeach; ?>
  

    
</body>
</html>