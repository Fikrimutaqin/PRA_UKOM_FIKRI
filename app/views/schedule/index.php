<main class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-lg-12">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h6 class="border-bottom pb-2 mb-0">
                    List Jadwal MataKuliah
                </h6>
                <div class="card mt-5">
                    <div class="card-body">
                        <a class="btn btn-primary my-2 addDataSchedule" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleaddschedule">Add Data</a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Dosen</th>
                                    <th scope="col">Nama Matkul</th>
                                    <th scope="col">Ruang</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data['dataList'])) : ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data['dataList'] as $items) : ?>
                                        <tr>
                                            <th><?php echo $no; ?></th>
                                            <td>
                                                <?php foreach ($data['dataDosen'] as $value) {
                                                    if ($value['kd_dosen'] == $items['kd_dosen']) {
                                                        echo $value['nama'];
                                                    }
                                                }; ?>
                                            </td>
                                            <td>
                                                <?php foreach ($data['dataMatkul'] as $value) {
                                                    if ($value['kd_matkul'] == $items['kd_matkul']) {
                                                        echo $value['nama'];
                                                    }
                                                }; ?>
                                            </td>
                                            <td><?php echo $items['ruang']; ?></td>
                                            <td><?php echo $items['waktu']; ?></td>
                                            <td>
                                                <a class="btn btn-primary viewModalEdit" href="<?php echo BASEURL ?>/schedule/edit/<?php echo $items['id'] ?>" role="button" data-bs-toggle="modal" data-bs-target="#exampleaddschedule" data-id="<?php echo $items['id'] ?>">Edit</a> | <a class=" btn btn-danger" href="<?php echo BASEURL ?>/schedule/delete/<?php echo $items['id'] ?>" role="button" onclick="return confirm('Are Sure Delete This Data?');">Delete</a>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleaddschedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lebelModalLabel">Add Schedule Matkul</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo BASEURL ?>/schedule/add">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label class="form-label">Nama Dosen</label>
                        <select class="form-select" name="kd_dosen" required id="kd_dosen">
                            <option selected>Choose...</option>
                            <?php if (!empty($data['dataDosen'])) : ?>
                                <?php foreach ($data['dataDosen'] as $items) : ?>
                                    <option value="<?php echo $items['kd_dosen']; ?>">
                                        <?php echo $items['nama']; ?>
                                    </option>
                                <?php endforeach; ?>
                                <?php echo "Data Not Found..."; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Matkul</label>
                        <select class="form-select" name="kd_matkul" required id="kd_matkul">
                            <option selected>Choose...</option>
                            <?php if (!empty($data['dataMatkul'])) : ?>
                                <?php foreach ($data['dataMatkul'] as $items) : ?>
                                    <option value="<?php echo $items['kd_matkul']; ?>">
                                        <?php echo $items['nama']; ?>
                                    </option>
                                <?php endforeach; ?>
                                <?php echo "Data Not Found..."; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Ruang</label>
                        <input name="ruang" type="number" class="form-control" required id='ruang'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Waktu</label>
                        <input id="waktu" name="waktu" type="datetime-local" class="form-control" required>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-success btn-block" id="buttonActionModal">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>