  <main class="main-content container">
    <div class="page-header">
      <h1><?php echo $this->session->userdata('name') ?></a> <small class="roboto-light">List Santri</small></h1>
    </div>
    <table>
      <thead>
        <tr>
          <th scope="col">Nama</th>
          <th scope="col">Kosong</th>
          <th scope="col">Angkatan</th>
          <th scope="col">Presentase (%)</th>
          <th scope="col">Last Updated</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dataSantri as $santri): ?>
          <tr>
            <td data-label="Account">
              <a href="<?php echo base_url('santri/edit/'.$santri->id) ?>"><?php echo $santri->name ?></a>
            </td>
            <td data-label="Due Date"><?php echo $santri->kosong." Halaman" ?></td>
            <td data-label="Due Date"><?php echo $santri->angkatan ?></td>
            <td data-label="Amount">
              <?php
                $target = 0;
                foreach($dataAngkatan as $angkatan){
                  if($angkatan->angkatan == $santri->angkatan) $target = $angkatan->target;
                }
                $kosong = $santri->kosong;
                $precentage = intval((($target - $kosong)/$target)*100);
                echo $precentage." %"
              ?>
              </td>
            <td data-label="Period">
              <?php
                $date = strtotime($santri->modified);
                echo date("d F y", $date);
              ?>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </main>
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <?php echo form_open() ?>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tambah Santri</h4>
          </div>
          <div class="modal-body">
            <input type="text" name="name" class="form-control" placeholder="Nama Santri">
            <input type="text" name="angkatan" class="form-control" placeholder="Angkatan">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>