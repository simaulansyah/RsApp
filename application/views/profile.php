    <!-- Sidebar -->

    <!-- Sidebar -->

    <!-- TopBar -->

    <!-- Topbar -->

    <!-- Container Fluid-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active" aria-current="page">Form Basics</li>
        </ol>
      </div>

      <div class="row">
        <div class="col-lg-6">

          <?= $this->session->flashdata('message'); ?>
        </div>

      </div>


      <div class="row">
        <div class="col-lg-8">

          <?= form_open_multipart('auth/user'); ?>

          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Id User</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="id" name="id" value="<?= $user['id_user'] ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" value="<?= $user['nama_user'] ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="jabatan" class="col-sm-2 col-form-label">jabatan</label>
            <div class="col-sm-10">
              <span class="lnr lnr-user"></span>
              <select class="form-control" id="jabatan" name="jabatan">
                <?= $cat = $this->Auth_model->m_jabatan(); ?>
                <?php
                foreach ($cat as $c) : ?>
                  <option value="<?php echo $c['nama_jabatan'] ?>" <?php echo ($user['jabatan'] == $c['nama_jabatan']) ? 'selected' : '' ?>>
                    <?php echo $c['nama_jabatan']; ?>
                  </option>
                <?php
                endforeach;
                ?>
              </select>
            </div>
          </div>
          <?php echo @$error; ?>
          <div class="form-group row">
            <div class="col-sm2">Picture</div>
            <div class="col-sm-10">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/img/') . $user['foto'] ?>" class="img-thumbnail">

                </div>
                <div class="col-sm-9">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="foto" name="foto">
                    <label value="upload" class="custom-file-label" for="foto">Choose file</label>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="form-group row justify-content-end">
            <div class="col-sm-10">

              <button type="submit" class=" btn btn-primary">Edit</button>

            </div>
          </div>

          </form>

        </div>
      </div>

    </div>



    </div>
    <script>
      // Add the following code if you want the name of the file appear on select
      $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
    </script>