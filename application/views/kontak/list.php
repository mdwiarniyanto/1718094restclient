<font color="orange">
<?php echo $this->session->flashdata('hasil'); ?>
</font>
<table border="1">
    <tr><th>ID</th><th>NAMA</th><th>NOMOR</th><th></th></tr>
    <?php
    foreach ($datakontak as $kontak){
        echo "<tr>
              <td>$kontak->idkontak</td>
              <td>$kontak->kontak</td>
              <td>$kontak->nomer</td>
              <td>".anchor('kontak/edit/'.$kontak->idkontak,'Edit')."
                  ".anchor('kontak/delete/'.$kontak->idkontak,'Delete')."</td>
              </tr>";
    }
    ?>
</table>
<a href="http://localhost/nomerclient/index.php/kontak/create">+ Tambah data<a>