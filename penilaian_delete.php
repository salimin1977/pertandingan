<?php
   include("sambungan.php");
   include("urusetia_menu.php");

   if (isset($_POST["submit"])) {
       $idpenilian = $_POST["idpenilaian"];
       $sql = "delete from penilaian ehere idpenilaian = '$idpenilaian'";
       $result = mysqli_query($sambungan, $sql);
       if($result == true) {
           $bilrekod = mysqli_affected_rows($sambungan);
           if($bilrekod > 0)
               echo "<br><center>berjaya padam</center>";
           else
               echo "Tidak berjaya padam. Rekod tidak ada dalam jadual";
       }
   else
        echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
   }


   if(isset($_GET['idpenilaian']))
       $idpenilaian = $_GET['idpenilaian'];
?>


<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<h3 class="panjang">PADAM PENILAIAN</h3>
<form class="panjang" action="penilaian_delete.php" method="post">
    <table>
    <tr>
       <td>ID Penilaian</td>
       <td><input type="text" name="idpenilaian" value="<?php echo $idpenilaian; ?>"></td>
    </tr>
    </table>
    <button class="padam" type="submit" name="submit">Padam</button>
</form>
