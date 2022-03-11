<!-- Row -->
<div class="row">
    <!-- Datatables -->

    <div class="col-lg-12">

        <!-- button -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Fedback user </h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>id</th>
                            <th>Permintaan</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if ($dd = konek()->query("SELECT * FROM roadmap_request ORDER BY id DESC")) {
                            if ($dd->num_rows > 0) {
                                while ($s = $dd->fetch_object()) {
                        ?>

                                    <tr>
                                        <td><?= $s->id ?></td>
                                        <td><?= $s->permintaan ?></td>

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