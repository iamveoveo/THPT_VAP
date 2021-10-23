<?php include("template/header.php"); ?>
<?php include("template/header-menu.php"); ?>

<div class="position-relative">
    <div class="container-fluid bg-dark header-menu" style="height:80vh;"></div>
    <div class="wrap big-title">
        <H1>THPT Chu Văn An</H1>
        <div class="search mt-4">
            <input type="text" class="searchTerm" placeholder="Bạn đang tìm kiếm học sinh nào?">
            <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
</div>



<div class="container">
    <div class="d-flex justidy-content-center">
        <h2 style="margin:50px auto;">Danh sách học sinh</h2>
    </div>
    <div class="row">
        <div class="tree col-2">TREE</div>
        <div class="my-table col-10">Table</div>
    </div>
</div>

<?php include("template/footer.php"); ?>