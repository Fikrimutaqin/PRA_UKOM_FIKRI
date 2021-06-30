<main class="container">
    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h6 class="border-bottom pb-2 mb-0">
                    Hallo, <?php echo $_SESSION['username']; ?>
                </h6>
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-title">Add Jadwal Matkul</h5>
                        <p class="card-text">Atur penjadwalan matkuliah untuk dosen dan waktu matkuliah</p>
                        <a href="<?php echo BASEURL ?>/schedule/" class="btn btn-success">Add Data</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
        </div>
    </div>

</main>