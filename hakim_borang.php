<?php
   session_start();
   include('sambungan.php');
   include("hakim_menu.php");
   $nama = $_SESSION["nama"];
   $idhakim = $_SESSION['idpengguna'];
?>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<div class="kandungan">
   <h3 class="markah">BORANG PEMARKAHAN</h3>
   <form class="markah" action="hakim_borang2.php" method="post">
   <table>
       <tr>
          <td>Nama Hakim : </td>
          <td><?php echo $nama; ?> </td>
       </tr>
       
       <tr>
          <td>Peserta</td>
          <td>
             <select class="markah" name="nokp">
             <?php
                 $sql = "select * from peserta where idhakim = '$idhakim'";
                 $data = mysqli_query($sambungan, $sql);
                 while ($peserta = mysqli_fetch_array($data)) {
                     echo"<option value='$peserta[nokp]>$peserta[namapeserta]</option>";
                 }
              ?>
              </select>
           </td>
       </tr>
       </table>
       
       
       <table class="markah">
          <tr>
             <th>Aspek Pernilaian</th>
             <th>Markah Penuh</th>
             <th>Markah Diperoleh</th>
          </tr>
          <?php
             $sql = "select * penilaian";
             $data = mysqli_query($sambungan, $sql);
             while ($penilaian = mysqli_fetch_array($data)) {
             echo "<tr >
                     <td>$penilaian[aspek]</td>
                     <td>$penilaian[markahpenuh]</td>
                     <td><input oninput='kira_jumlah()' class='markah' type='text'
                     id='$penilaian[idpenilaian]' name='$penilaian[idpenilaian] value=0></td>
                  </tr>";
             } // tamat while
           ?>
            
           <tr class="markah_jumlah">
               <td></td>
               <td class="markah_jumlah" >Jumlah Markah</td>
               <td><input class="markah" type="text" id="jumlah_markah" name="jumlah_markah"></td>
           </tr>
       </table>
       <button class="tambah" type="submit" name="submit">Tambah</button>
       </form>
</div>
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 