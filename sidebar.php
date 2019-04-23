<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Kategori</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        <?php
        $tampil_kategori = mysqli_query($conn,"SELECT * FROM kategori");
        while($data_kategori = mysqli_fetch_object($tampil_kategori)){
        ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#"><?= $data_kategori->nama_kategori ?></a></h4>
                </div>
            </div>
        <?php } ?>
        </div><!--/category-products-->
    
    </div>
</div>