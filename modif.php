<?php
include "conexion.php";

if(isset($_GET['id'])) {
    // Retrieve the selected item ID
    $selectedItem = $_GET['id'];

    // Perform necessary database queries to fetch the item details based on the selected item ID
    $sql = "SELECT * FROM stock WHERE id_produit = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $selectedItem);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
     
    
    $sql = 'SELECT * FROM fournisseurs';
    $resulta = mysqli_query($conn, $sql);
    $feedback = mysqli_fetch_all($resulta, MYSQLI_ASSOC);
    
    // Display the form for modifying the item details
    if($item) {
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Modifier Item</title>
            <link rel="icon" href="help.jpg">
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <h1>Modifier Item</h1>
            <hr>
            <form name="form" method="post">
                <input type="hidden" name="selectedItem" value="<?php echo $selectedItem; ?>">

                <label for="cp">Product Code:</label><br>
                <input autofocus id="cp" type="text" name="prod_code"  value=<?php echo $item['prod_code']?>> <br><br>

                <label for="pd">Product Designation:</label><br>
                <input id="pd" type="text" name="prod_designation"  value=<?php echo $item['prod_designation']?>><br><br>

                <label for="pp">Product Price:</label><br>
                <input id="pp" type="number" name="prod_prix_a"  value=<?php echo $item['prod_prix_a']?>><br><br>

                <label for="pm">Product Marge:</label><br>
                <input id="pm" type="number" name="prod_marge"  value=<?php echo $item['prod_marge']?>><br><br>

                <label for="pq">Product Quantity:</label><br>
                <input id="pq" type="number" name="prod_quantite_st"  value=<?php echo $item['prod_quantite_st']?>><br><br>

                <label for="ps">Product Seuil:</label><br>
                <input id="ps" type="number" name="prod_seuil"  value=<?php echo $item['prod_seuil']?>><br><br>

                <label for="if">ID Fournisseur:</label><br>
                <select id="if" class="rt" required name="id_fournisseur">
                    <option value="" disabled selected hidden>Select ID fournisseur</option>
                    <?php foreach ($feedback as $itema):?>
                    <option value="<?php echo $itema["id_fournisseur"]?>">
                    <?php echo $itema["id_fournisseur"]." ".$itema["responsable"] ?>
                    </option>
                    <?php endforeach; ?>
                </select><br><br>

                <input type="submit" name="submit" value="Submit"><br><br>
                <a href="hist.php" class="b">Annuler</a>
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

                $sql="UPDATE stock
                SET prod_code = ?, prod_designation = ?,prod_prix_a=?,prod_marge=?,prod_quantite_st=?,
                prod_seuil=?,id_fournisseur=?
                WHERE id_produit=?;
                ";
                $stat=$conn->prepare($sql);
                $stat->bind_param("ssdiiiii",$code,$design,$prix,$marge,$quant,$seuil,$fourn,$selectedItem);
                $stat->execute();
                header("Location: hist.php");
                }
            ?>
        </body>
        </html>
        <?php
    } else {
        echo "Item not found!";
    }
} else {
    echo "No item selected!";
}
?>
