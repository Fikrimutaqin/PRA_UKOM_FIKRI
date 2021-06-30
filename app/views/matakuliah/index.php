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
                    List Data Matkul
                </h6>
                <div class="card mt-5">
                    <div class="card-body">
                        <a class="btn btn-primary my-2 addDataMatkul" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleaddmatkul">Add Data</a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Matkul</th>
                                    <th scope="col">SKS</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data['dataMatakuliah'])) : ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data['dataMatakuliah'] as $items) : ?>
                                        <tr>
                                            <th><?php echo $no; ?></th>
                                            <td>
                                                <?php echo $items['nama']; ?>
                                            </td>
                                            <td>
                                                <?php echo $items['sks']; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary viewModalEditMatkul" href="<?php echo BASEURL ?>/matakuliah/edit/<?php echo $items['kd_matkul'] ?>" role="button" data-bs-toggle="modal" data-bs-target="#exampleaddmatkul" data-id="<?php echo $items['kd_matkul'] ?>">Edit</a> | <a class=" btn btn-danger" href="<?php echo BASEURL ?>/matakuliah/delete/<?php echo $items['kd_matkul'] ?>" role="button" onclick="return confirm('Are Sure Delete This Data?');">Delete</a>
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
<div class="modal fade" id="exampleaddmatkul" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lebelModalLabel">Add Data Dosen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body matkul">
                <form method="POST" action="<?php echo BASEURL ?>/matakuliah/add">
                    <input type="hidden" name="kd_matkul" id="id">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Matkul</label>
                        <input name="nama" type="text" class="form-control" required id='namamatkul'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">SKS</label>
                        <textarea class="form-control" name="sks" id="sksmatkul"></textarea>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-success btn-block" id="buttonActionModal">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>