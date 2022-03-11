<?php
if (isset($_GET['action']) && $_GET['action'] == "deleteuser") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $fg = konek()->query("SELECT * FROM user WHERE id='$id'");
        $dd = $fg->fetch_object();
        $f = $dd->avatar;

        if(@unlink('images/useravatar/'.$f)){
            if (konek()->query("DELETE FROM user WHERE id='$id'")) {
                konek()->query("DELETE FROM dorums_postingan WHERE author='$id'");


                ?>
                <script>
                    alert("data berhasil di hapus");
                    window.location.href = "admin";
                </script>

                <?php
            }
        } else{
           if (konek()->query("DELETE FROM user WHERE id='$id'")) {
            konek()->query("DELETE FROM dorums_postingan WHERE author='$id'");
            ?>
            <script>
                alert("data berhasil di hapus");
                window.location.href = "admin";
            </script>
            <?php
        }
    }
}
}
?>
<div class="row mb-3">
    <!-- user -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah pengguna</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php

                        if ($ks = konek()->query("SELECT * FROM user")) {
                            echo $ks->num_rows;
                        }

                        ?></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <!-- user -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah roadmap</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php

                        if ($ks = konek()->query("SELECT * FROM roadmap")) {
                            echo $ks->num_rows;
                        }

                        ?></div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Invoice Example -->
    <div class="col-xl-12 col-lg-7 mb-4">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User</h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>point</th>
                            <th>Badge</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if ($k = konek()->query("SELECT * FROM user")) {
                            if ($k->num_rows > 0) {
                                while ($row = $k->fetch_object()) {
                                    ?>
                                    <tr>
                                        <td><a href="#"><?= $row->id ?></a></td>
                                        <td><?= $row->username ?></td>
                                        <td><?= $row->point ?></td>
                                        <td><span><?= pointolevel($row->point) ?></span></td>
                                        <td><a onclick="return confirm('apakah anda yakin ingin menghapus akun ini?');;" href="<?= base_url() ?>admin?action=deleteuser&id=<?= $row->id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                                        </a></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "tidak ada user";
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>

</div>
<!---Container Fluid-->
</div>