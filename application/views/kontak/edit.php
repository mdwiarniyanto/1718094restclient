<?php echo form_open('kontak/edit');?>
<?php echo form_hidden('id',$datakontak[0]->idkontak);?>

<table>
    <tr><td>ID</td><td><?php echo form_input('idkontak',$datakontak[0]->idkontak);?></td></tr>
    <tr><td>NAMA</td><td><?php echo form_input('kontak',$datakontak[0]->kontak);?></td></tr>
    <tr><td>NOMOR</td><td><?php echo form_input('nomer',$datakontak[0]->nomer);?></td></tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('kontak','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>