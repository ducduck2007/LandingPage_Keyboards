<style>
    .socials li {
        list-style: none;
    }

    .socials li a {
        position: relative;
        width: 60px;
        height: 60px;
        display: block;
        text-align: center;
        margin: 0 10px;
        border-radius: 50%;
        padding: 6px;
        box-sizing: border-box;
        text-decoration: none;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3);
        background: linear-gradient(0deg, #ddd, #fff);
        transition: .5s;
    }

    .socials li a:hover {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        text-decoration: none;
    }

    .socials li a .fas {
        width: 100%;
        height: 100%;
        display: block;
        background: linear-gradient(0deg, #fff, #ddd);
        border-radius: 50%;
        line-height: calc(60px - 12px);
        font-size: 24px;
        color: #262626;
        transition: .5s;
    }

    .socials li:nth-child(1) a:hover .fas {
        color: #3b5998;
    }

    .socials li:nth-child(2) a:hover .fas {
        color: #00aced;
    }
</style>

<!-- Modal ảnh sản phẩm nổi bật -->
<div class="modal fade" id="exampleModalImageSanPhamNoiBat" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header container">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $header[0]->title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body container d-flex">
                <div class="aside col-4">
                    <img src="{{ $header[0]->image }}" alt="" class="col-12">
                    <div class="col-12 mt-3 pt-3 pb-3">
                        <div class=" table-page col-lg-12">
                            <div class="card" style="border: none;">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table-user table table-striped table-bordered table-hover"
                                            id="example" class="display" style="width:100%">
                                            <!-- STT	UserID	Server	Question	Answer	Time	Status	Reply -->
                                            <thead>
                                                <th>Thông số kỹ thuật</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>hello anh em</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="article ps-4 col-8">
                    <div class="col-12 fw-bold fs-4">{{ $header[0]->title }}</div>
                    <div class="col-12">Sao đánh giá</div>
                    <div class="col-12 fs-2 text-danger mt-3 fw-bold">32.990.000₫</div>
                    <div class="col-12 mt-3">
                        <div class="text-danger fw-bold p-3"
                            style="background: rgb(241, 158, 158); border-radius: 4px 4px 0 0">Quà tặng khuyến mãi
                        </div>
                        <div class="text-danger p-3"
                            style="border: 1px solid rgb(241, 158, 158); border-radius: 0 0 4px 4px">Tặng ngay em phương
                            anh 2005
                        </div>

                    </div>
                    <button type="button" class="btn btn-danger mt-3 p-5 pt-2 pb-2 fs-4">MUA NGAY</button>
                    <div class="col-12 mt-3">
                        <li>Bảo hành chính hãng 12 tháng</li>
                        <li>Hỗ trợ đổi mới trong 7 ngày</li>
                        <li>Miễn phí giao hàng toàn quốc</li>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="text-dark fw-bold p-3"
                            style="background: rgb(153, 150, 150); border-radius: 4px 4px 0 0">Ưu đãi đặc biệt
                        </div>
                        <div class="text-dark p-3"
                            style="border: 1px solid rgb(153, 150, 150); border-radius: 0 0 4px 4px">Được ôm phương anh
                            nhóm quái xế 1 cái
                        </div>

                    </div>

                    <div class="col-12 fs-5 fw-bold mt-4">Liên hệ</div>
                    <div class="col-12">
                        <ul class="socials mt-3 m-0 p-0 d-flex">
                            <li><a href="#"><i class="fas fa-envelope" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fas fa-phone" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
