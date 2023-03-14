<?php session_start(); ?>
<?php include('config/config.php'); ?>
<?php include('components/head.inc.php'); ?>
<?php include('components/navbar.inc.php'); ?>

<!-- //////////////// -->
<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="row align-items-center justify-content-center">
            <p></p>
            <h2>Pinda Maklumat Pelajar</h2>
            <p></p>

            <form method="post" action="pelajar.php">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                        <label>Tarikh:</label>
                        </div>
                    </div>
                    <div class="col-md-6"><input type="text" class="form-control" id="nama_pelajar" name="nama_pelajar"></div>
                </div>
                
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                        <label>NDP:</label>
                        </div>
                    </div>
                    <div class="col-md-2"><input type="text" class="form-control" id="ndp" name="ndp"></div>
                </div>

                <button name="butang" value="save" type="save" class="btn btn-outline-secondary">Save</button>
            </form>


        
            
        </div>
    </div>
</div>

<section class="">
    <div class="row">
        &nbsp;
    </div>
</section>
        
<!-- //////////////// -->

<?php include('components/footer.inc.php'); ?>




