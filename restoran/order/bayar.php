<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tblorder WHERE idorder=$id";

        $row = $db->getItem($sql);
    }

?>



<h3>Pembayaran Order</h3>
<div>
    <form action="" method="post">
        <div class="mb-3 w-50">
            <label for="">Total</label>
            <input type="tenumberxt" name="total" required value="<?php echo $row['total'] ?>" class="form-control" >
        </div>

        <div class="mb-3 w-50">
            <label for="">Bayat</label>
            <input type="number" name="bayar" required class="form-control" >
        </div>

        <div>
            <input type="submit" name="simpan" value="Bayar" class="btn btn-primary">
        </div>
    </form>
</div>

<?php 

    if (isset($_POST['simpan'])) {
        $bayar = $_POST['bayar'];

        $kwmbali = $bayar - $row['total'];

        $sql = "UPDATE tblorder SET bayar =$bayar, kembali=$kembali, status=1 WHERE idorder = $id";

        if ($kwmbali < 0) {
            echo "<h3> Pembayaran Kurang</h3>"
        }else {
              $db->runSQL($sql);

        header("location:?f=orderi&m=select");
        }

        
       
    }

?>