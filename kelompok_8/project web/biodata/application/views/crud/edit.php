  <div class="col-md-4">

        <h1 class="my-4">Edit
          <small>Biodata</small>
        </h1>
  <font color="green"><?php echo $this->session->flashdata('pesan'); ?></font>
  <?php echo form_open('crud/update/'.$tmp->id,''); ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $tmp->name; ?>">
    <?php echo form_error('name', '<div class="text-danger"><small>', '</small></div>');?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo $tmp->email; ?>">
    <?php echo form_error('email', '<div class="text-danger"><small>', '</small></div>');?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone</label>
    <input type="text" name="phone" class="form-control" value="<?php echo $tmp->phone; ?>">
    <?php echo form_error('phone', '<div class="text-danger"><small>', '</small></div>');?>
  </div>
  <button type="submit" class="btn btn-primary">Perbarui</button>
<?php echo form_close(); ?>

</div>