<?php
session_start();

if (isset($_POST['product_id'])) {

    // Get the product ID to be removed
    $idToRemove = $_GET['idtodel'];

    $filename = "carrinho_info/carrinho_" . $_SESSION["email"] . ".txt";

    // Read the content of the file
    $fts = file_get_contents($filename);

    // Replace the ID to be removed with an empty string
    $fts = str_replace($idToRemove, ' ', $fts);

    // Write the updated content back to the file
    file_put_contents($filename, $fts);

    // Redirect back to the previous page or any desired location
    header("Location: carrinho.php");
    // echo "product id (" . $idToRemove . ") was set properly";
    exit();
} else {
    echo "product id was not set properly";
}
?>