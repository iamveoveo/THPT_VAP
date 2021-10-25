<?php
include("template/header.php");
include("template/header-menu.php");
?>

<div class="container">
    <div class="search mt-4">
        <input type="text" class="searchTerm" placeholder="Bạn đang tìm kiếm học sinh nào?">
        <button type="submit" class="searchButton">
            <i class="fa fa-search"></i>
        </button>
    </div>
    <div class="row m-auto tree-table">
        <div class="tree col-2">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a class="btn btn-secondary h-100" data-bs-toggle="collapse" href="#collapse10" role="button" aria-expanded="false" aria-controls="collapse10">Khối 10</a>
                    <ul class="collapse" id="collapse10">
                        <li><a href="#">10A1</a></li>
                        <li><a href="#">10A2</a></li>
                        <li><a href="#">10D1</a></li>
                        <li><a href="#">10D2</a></li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <a class="btn btn-secondary" data-bs-toggle="collapse" href="#collapse11" role="button" aria-expanded="false" aria-controls="collapse11">Khối 11</a>
                    <ul class="collapse" id="collapse11">
                        <li><a href="#">11A1</a></li>
                        <li><a href="#">11A2</a></li>
                        <li><a href="#">11D1</a></li>
                        <li><a href="#">11D2</a></li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <a class="btn btn-secondary" data-bs-toggle="collapse" href="#collapse12" role="button" aria-expanded="false" aria-controls="collapse12">Khối 12</a>
                    <ul class="collapse" id="collapse12">
                        <li><a href="#">12A1</a></li>
                        <li><a href="#">12A2</a></li>
                        <li><a href="#">12D1</a></li>
                        <li><a href="#">12D2</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="my-table col-10">
            <ul class="list-group">
                <li>
                    <a href="#">
                        <div class="my-table-item row box-shadow">
                            <div class="item-ava col-3"><img src="" alt=""></div>
                            <div class="item-detail col-7 flex-fill d-flex flex-column">
                                <div class="row w-100">
                                    <div class="col-7"><b>Họ và tên: </b>Đặng Quang Vinh</div>
                                    <div class="col-5"><b>Ngày sinh: </b>27/5/2001</div>
                                </div>
                                <div class="row w-100">
                                    <div class="col-7"><b>Số điện thoại: </b>0338872927</div>
                                    <div class="col-5"><b>Giời tính: </b>Nam</div>
                                </div>
                            </div>
                            <div class="item-class col-2 d-flex">
                                <div>Lớp: 10A1</div>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="my-table-item row box-shadow">
                            <div class="item-ava col-3"><img src="" alt=""></div>
                            <div class="item-detail col-7 flex-fill d-flex flex-column">
                                <div class="row w-100">
                                    <div class="col-7"><b>Họ và tên: </b>Đặng Quang Vinh</div>
                                    <div class="col-5"><b>Ngày sinh: </b>27/5/2001</div>
                                </div>
                                <div class="row w-100">
                                    <div class="col-7"><b>Số điện thoại: </b>0338872927</div>
                                    <div class="col-5"><b>Giời tính: </b>Nam</div>
                                </div>
                            </div>
                            <div class="item-class col-2 d-flex">
                                <div>Lớp: 10A1</div>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="my-table-item row box-shadow">
                            <div class="item-ava col-3"><img src="" alt=""></div>
                            <div class="item-detail col-7 flex-fill d-flex flex-column">
                                <div class="row w-100">
                                    <div class="col-7"><b>Họ và tên: </b>Đặng Quang Vinh</div>
                                    <div class="col-5"><b>Ngày sinh: </b>27/5/2001</div>
                                </div>
                                <div class="row w-100">
                                    <div class="col-7"><b>Số điện thoại: </b>0338872927</div>
                                    <div class="col-5"><b>Giời tính: </b>Nam</div>
                                </div>
                            </div>
                            <div class="item-class col-2 d-flex">
                                <div>Lớp: 10A1</div>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="my-table-item row box-shadow">
                            <div class="item-ava col-3"><img src="" alt=""></div>
                            <div class="item-detail col-7 flex-fill d-flex flex-column">
                                <div class="row w-100">
                                    <div class="col-7"><b>Họ và tên: </b>Đặng Quang Vinh</div>
                                    <div class="col-5"><b>Ngày sinh: </b>27/5/2001</div>
                                </div>
                                <div class="row w-100">
                                    <div class="col-7"><b>Số điện thoại: </b>0338872927</div>
                                    <div class="col-5"><b>Giời tính: </b>Nam</div>
                                </div>
                            </div>
                            <div class="item-class col-2 d-flex">
                                <div>Lớp: 10A1</div>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php include("template/footer.php"); ?>