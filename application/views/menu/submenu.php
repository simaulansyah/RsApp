    <!-- Sidebar -->

    <!-- Sidebar -->

    <!-- TopBar -->

    <!-- Topbar -->

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>


        <div class="row">
            <div class="col-lg">
                <!-- jika error menambahkan menu -->
                <?= form_error('title', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('menu_id', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('url', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('icon', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <!-- jika succes menambahkan data menggunakan flashdata -->
                <?= $this->session->flashdata('message'); ?>

                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#subMenuModal">Add New Menu</a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Url</th>
                            <th scope="col">icon</th>
                            <th scope="col">is_active</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($submenu as $m) : ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $m['title']; ?></td>
                                <td><?= $m['menu']; ?></td>
                                <td><?= $m['url']; ?></td>
                                <td><?= $m['icon']; ?></td>
                                <td><?= $m['is_active']; ?></td>
                                <td class="text-right">
                                    <form action="<?= base_url('menu/editSub') ?>" method="POST">
                                        <input type="hidden" value="<?= $m['id']; ?>" name="daldelSub">
                                        <button class="btn btn-warning" id="editSub"> <i class="fa fa-edit"></i>
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <form action="<?= base_url('menu/delSub') ?>" method="POST">
                                        <input type="hidden" value="<?= $m['id']; ?>" name="daldelSub">
                                        <button class="btn btn-danger" onclick="return confirm('apakah anda yakin?')" id="daldel"> <i class="fa fa-trash"></i>
                                        </button>
                                </td>
                                </form>

                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>


            </div>

        </div>



        <!-- modal menu -->


        <!-- Modal -->
        <div class="modal fade" id="subMenuModal" tabindex="-1" aria-labelledby="subMenuModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="subMenuModalLabel">Add New subMenu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <Form action="<?= base_url('menu/submenu'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="title" name="title" placeholder="input SubMenuTitle">
                            </div>
                            <div class="form-group">
                                <select name="menu_id" id="menu_id" class="form-control">
                                    <option value=""> Select menu </option>
                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id']; ?>"> <?= $m['menu']; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="url" name="url" placeholder="input SubMenuUrl">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="icon" name="icon" placeholder="input SubMenuIcon">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                    <label class="form-check-label" for="is_active">
                                        Active ?
                                    </label>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </Form>
                </div>
            </div>
        </div>
















        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to logout?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                        <a href="<?= base_url('Auth/logout') ?>" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!---Container Fluid-->
    </div>
    <!-- Footer -->