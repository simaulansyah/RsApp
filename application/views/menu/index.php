    <!-- Sidebar -->

    <!-- Sidebar -->

    <!-- TopBar -->

    <!-- Topbar -->

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
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
            <div class="col-lg-6">
                <!-- jika error menambahkan menu -->
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <!-- jika succes menambahkan data menggunakan flashdata -->
                <?= $this->session->flashdata('message'); ?>
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#MenuModal">Add New Menu</a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Menu</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $m['menu']; ?></td>

                                <td class="text-right">
                                <input type="hidden" id="field1" value="<?= $m['id'];?>">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#editmodal<?= $m['id'];?>"> <i class="fa fa-edit"></i>
                                        </button>
                                   
                                </td>
                                <td>
                                    <form action="<?= base_url('menu/deleteMenu') ?>" method="POST">
                                        <input type="hidden" value="<?= $m['id']; ?>" name="daldel">
                                        <button class="btn btn-danger" onclick="return confirm('apakah anda yakin?')" id="daldel"> <i class="fa fa-trash"></i>
                                        </button>
                                </td>
                                </form>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                
                <!-- <button onclick="myFunction()">Click me</button>
                <p id="demo"></p> -->



            </div>

        </div>



        <!-- modal edit -->

        <?php $no = 0; foreach($menu as $m ) : $no++; ?>
        <div class="modal fade" id="editmodal<?= $m['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <Form action="<?= base_url('menu/editMenu'); ?>" method="POST">
                    <div class="modal-body">
                    <div class="form-group">
                    <input type="text" id="id" name="id" class="form-control" value="<?= $m['id'];?>">
                    </div>
                    <div class="form-group">
                    <input type="text" id="menu" name="menu" class="form-control" value="<?= $m['menu'];?>">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
                        <?php endforeach; ?>


        <!-- modal menu -->


        <!-- Modal -->
        <div class="modal fade" id="MenuModal" tabindex="-1" aria-labelledby="MenuModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="MenuModalLabel">Add New Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <Form action="<?= base_url('menu'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group">

                                <input type="text" class="form-control" id="menu" name="menu" placeholder="input menu">
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
