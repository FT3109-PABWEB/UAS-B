<div class="col-md-8">
<h1 class="my-4">Daftar
          <small>Biodata</small>
        </h1>

<?php echo anchor('crud/form_add', '+ Tambah', 'class="btn btn-primary btn-sm"'); ?>
<br><br>
<font color="green"><?php echo $this->session->flashdata('pesan'); ?></font>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tmp as $key) { ?>
    <tr>
      <th scope="row"><?php echo $key->id; ?></th>
      <td><?php echo $key->name; ?></td>
      <td><?php echo $key->email; ?></td>
      <td><?php echo $key->phone; ?></td>
      <td>
        <?php echo anchor('crud/edit/'.$key->id, 'Edit', 'class="badge badge-info"');  ?>
        /
        <?php echo anchor('crud/del/'.$key->id, 'Delete',array('class'=>'badge badge-danger', 'onclick'=>"return confirmDialog();"));  ?>
     </td>
    </tr>
   <?php }?>
  </tbody>
</table>
</div>

<script type="text/javascript">
function confirmDialog() {
  var x=confirm("Yakin akan di hapus?")
  if (x) {
    return true;
  } else {
    return false;
  } }
</script>