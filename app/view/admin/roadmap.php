<!-- Row -->
<div class="row">
    <!-- Datatables -->

    <div class="col-lg-12">
        <button type="button" class="btn mb-4 btn-primary" data-toggle="modal" data-target="#exampleModal" id="#myBtn">Tambah data <i class="fa fa-plus"></i></button>

        <!-- button -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if ($dd = konek()->query("SELECT * FROM roadmap ORDER BY id DESC")) {
                            if ($dd->num_rows > 0) {
                                while ($s = $dd->fetch_object()) {
                                    ?>

                                    <tr>
                                        <td><?= $s->judul ?></td>
                                        <td><?= $s->kategori ?></td>
                                        <td><?= $s->file ?></td>
                                        <td>
                                            <a onclick="return confirm('apakah anda yakin ingin menghapus data ini? ')" class="btn btn-primary" href="<?= base_url() ?>roadmap/delete/<?= $s->id ?>">Hapus</a>

                                        </td>
                                    </tr>
                                    <?php

                                }
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- DataTable with Hover -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">tambah roadmap</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="submitdataroadmap" action="<?= base_url() ?>roadmap/add" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Judul</label>
                            <input type="text" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ketikan judul">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kategori</label>
                            <input type="text" name="kategori" class="form-control" id="exampleInputPassword1" placeholder="Katikan kategori roadmp">
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="filepdf" accept="application/pdf" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">file pdf</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <textarea name="deskripsi" id="" class="form-control" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                        <br>
                        <br>
                        <button type="submit" name="tambahroadmap" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>