<div class="container-fluid col-11 mt-4" id="scrollPhimCo">
    <div class="phimCoKhung" style="border-radius: 4px">
        <div class="titlePhimCo col-12 text-light fs-3 p-4 btn-shine" style="position: relative;">CÁC LOẠI BÀN PHÍM CƠ
        </div>
        <div class="col-12 d-flex p-4" style="position: relative;">

            <div class="custom-nav d-flex align-items-center justify-content-between col-12">
                <button id="prevBtn2" style="margin-left: 20px"><i class="fa-solid fa-chevron-left"></i></button>
                <button id="nextBtn2" style="margin-right: 20px"><i class="fa-solid fa-chevron-right"></i></button>
            </div>

            <div class="owl-carousel owl-theme" id="cardPhimCo" style="overflow: hidden;">
                @foreach ($deal_sale as $ds)
                    @if ($ds->vi_tri == 4)
                        <div class="card item" style="height: 400px; border-radius: 4px;"
                            data-title="{{ $ds->title }}" data-image="{{ $ds->image }}"
                            data-specifications="{{ $ds->specifications }}" data-price="{{ $ds->price }}">
                            <img src="{{ $ds->image }}" class="card-img-top" alt="..."
                                style="height: 50%; object-fit: cover;">
                            <div class="card-body d-flex flex-column justify-content-between gap-2">
                                <h5 class="card-title mb-0" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalCardPhim">
                                    {{ $ds->title }}
                                </h5>
                                <p class="card-text mb-0 t_over">{{ $ds->content }}</p>
                                <div class="scene">
                                    <div class="cube">
                                        <span class="side top">Mua ngay</span>
                                        <span class="side front">{{ $ds->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Modal chung cho các card -->
<div class="modal fade" id="exampleModalCardPhim" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header container">
                <h1 class="modal-title fs-5" id="modalTitlePhim1"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body container d-flex">
                <div class="aside col-4">
                    <img id="modalImagePhim" alt="" class="col-12">
                    <div class="col-12 mt-3 pt-3 pb-3">
                        <div class="table-page col-lg-12">
                            <div class="card" style="border: none;">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table-user table table-striped table-bordered table-hover">
                                            <thead>
                                                <th>Thông số kỹ thuật</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td id="modalSpecificationsPhim"></td>
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
                    <div class="col-12 fw-bold fs-4" id="modalTitlePhim2"></div>
                    <div class="col-12">Sao đánh giá</div>
                    <div class="col-12 fs-2 text-danger mt-3 fw-bold" id="modalPricePhim"></div>
                    <div class="col-12 mt-3">
                        <div class="text-danger fw-bold p-3"
                            style="background: rgb(241, 158, 158); border-radius: 4px 4px 0 0">
                            Quà tặng khuyến mãi
                        </div>
                        <div class="text-danger p-3"
                            style="border: 1px solid rgb(241, 158, 158); border-radius: 0 0 4px 4px">
                            Tặng ngay em phương anh 2005
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
                            style="background: rgb(153, 150, 150); border-radius: 4px 4px 0 0">
                            Ưu đãi đặc biệt
                        </div>
                        <div class="text-dark p-3"
                            style="border: 1px solid rgb(153, 150, 150); border-radius: 0 0 4px 4px">
                            Được ôm phương anh nhóm quái xế 1 cái
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php if (isset($deal_sale) && is_object($deal_sale) && isset($deal_sale->vi_tri)) : ?>
        const viTri = <?php echo $deal_sale->vi_tri; ?>;
        <?php else : ?>
        const viTri = null; // Giá trị mặc định nếu $deal_sale không tồn tại hoặc không phải đối tượng
        <?php endif; ?>

        if (viTri === 4) {
            // Lắng nghe sự kiện click trên tất cả các card
            document.querySelectorAll('.card.item').forEach(item => {
                item.addEventListener('click', function() {
                    // Lấy dữ liệu từ thuộc tính data-* của card đã được click
                    const title = this.getAttribute('data-title');
                    const image = this.getAttribute('data-image');
                    const specifications = this.getAttribute('data-specifications');
                    const price = this.getAttribute('data-price');

                    // Gọi hàm cập nhật modal với dữ liệu lấy được
                    updateModalContentPhim({
                        title: title,
                        image: image,
                        specifications: specifications,
                        price: price
                    });
                });
            });

            // Hàm cập nhật nội dung modal với dữ liệu từ item
            function updateModalContentPhim(data) {
                console.log('Cập nhật Modal với:', data); // Kiểm tra dữ liệu trên console

                document.getElementById('modalTitlePhim1').innerText = data.title;
                document.getElementById('modalTitlePhim2').innerText = data.title;
                document.getElementById('modalImagePhim').src = data.image;
                document.getElementById('modalSpecificationsPhim').innerHTML = data.specifications ||
                    'Chưa có thông số';
                document.getElementById('modalPricePhim').innerText = data.price || 'Đang cập nhật';
            }
        } else if (viTri === 5) {
            console.log("Bạn đang ở vi_tri == 5");
        }
    });
</script>
