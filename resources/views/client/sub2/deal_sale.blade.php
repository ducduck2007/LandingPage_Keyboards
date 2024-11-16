<style>
    .bg003 {
        height: 400px;
        background-image: url('{{ $deal_sale[0]->image }}');
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100% 100%;
        border-radius: 4px;
        transition: background-size 0.3s ease;
    }

    .bg003:hover {
        background-size: 110% 110%;
    }

    .scene {
        width: 100%;
        justify-content: center;
        align-items: center;
    }

    .cube {
        color: #ccc;
        cursor: pointer;
        font-family: 'Roboto', sans-serif;
        transition: all 0.85s cubic-bezier(.17, .67, .14, .93);
        transform-style: preserve-3d;
        transform-origin: 100% 50%;
        width: 100%;
        height: 4em;
    }

    .cube:hover {
        transform: rotateX(-90deg);
    }

    .side {
        box-sizing: border-box;
        position: absolute;
        display: inline-block;
        height: 4em;
        width: 100%;
        text-align: center;
        text-transform: uppercase;
        padding-top: 1.5em;
        font-weight: bold;
    }

    .top {
        background: wheat;
        color: #222229;
        transform: rotateX(90deg) translate3d(0, 0, 2em);
        box-shadow: inset 0 0 0 5px #fff;
    }

    .front {
        background: #222229;
        color: #fff;
        box-shadow: inset 0 0 0 5px #fff;
        transform: translate3d(0, 0, 2em);
    }
</style>
<div class="container-fluid col-11 mt-5" id="scrollDealsale">
    <div class="col-12 bg001">
        <div class="d-flex align-items-center p-2 ps-3 gap-2">
            <div class="time p-2 pe-3 ps-3 bg-light fw-bold">01</div>
            <div class="fs-4 fw-bold text-light">:</div>
            <div class="time p-2 pe-3 ps-3 bg-light fw-bold">14</div>
            <div class="fs-4 fw-bold text-light">:</div>
            <div class="time p-2 pe-3 ps-3 bg-light fw-bold">32</div>
            <div class="fs-4 fw-bold text-light">:</div>
            <div class="time p-2 pe-3 ps-3 bg-light fw-bold">36</div>

            <i class="fa-solid fa-bolt-lightning fs-2 ms-5 mb-2"
                style="background: -webkit-linear-gradient(#eee, #333);-webkit-background-clip: text;-webkit-text-fill-color: transparent;"></i>
            <div class="t001 text-1">D</div>
            <div class="t001 text-2">E</div>
            <div class="t001 text-3">A</div>
            <div class="t001 text-4">L</div>
            <div class="t001 text-2"></div>
            <div class="t001 text-3">S</div>
            <div class="t001 text-2">A</div>
            <div class="t001 text-2">L</div>
            <div class="t001 text-1">E</div>
        </div>
    </div>

    <div class="col-12 bg002 p-3 d-flex flex-column justify-content-center ps-4 pe-4" style="overflow: hidden;">
        <div class="col-12 d-flex gap-2 mb-3">
            <div class="panel active text-light p-2 ps-5 pe-5" id="panel1">Bàn phím cơ</div>
            <div class="panel text-light p-2 ps-5 pe-5" id="panel2">Bàn phím văn phòng</div>
            <div class="panel text-light p-2 ps-5 pe-5" id="panel3">Keycaps</div>
        </div>

        <div id="tablepanel1">
            <div class="col-12 d-flex" style="position: relative;">
                @foreach ($featured_photo as $fp)
                    @if ($fp->vi_tri == 1)
                        <div class="bg003 me-5 col-3" style="background-image: url('{{ $fp->image }}');"></div>
                    @endif
                @endforeach

                <div class="custom-nav col-9">
                    <button id="prevBtn1"><i class="fa-solid fa-chevron-left"></i></button>
                    <button id="nextBtn1"><i class="fa-solid fa-chevron-right"></i></button>
                </div>

                <div class="owl-carousel owl-theme" id="panel1-carousel" style="overflow: hidden; display: unset;">
                    @foreach ($deal_sale as $index => $ds)
                        @if ($ds->vi_tri == 1)
                            <div class="card item" style="height: 400px; border-radius: 4px;">
                                <img src="{{ $ds->image }}" class="card-img-top" alt="..."
                                    style="height: 50%; object-fit: cover;">
                                <div class="card-body d-flex flex-column justify-content-between gap-2">
                                    <h5 class="card-title mb-0" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalPanel"
                                        onclick="updateModalContent({{ json_encode($ds) }})">{{ $ds->name_product }}
                                    </h5>
                                    <p class="card-text mb-0 t_over">{{ $ds->content }}</p>
                                    <div class="scene">
                                        <div class="cube">
                                            <span class="side top" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalPanel"
                                                onclick="updateModalContent({{ json_encode($ds) }})">Mua ngay</span>
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

        <div id="tablepanel2">
            <div class="col-12 d-flex" style="position: relative;">

                <div class="custom-nav d-flex align-items-center justify-content-between col-12">
                    <button id="prevBtn3"><i class="fa-solid fa-chevron-left"></i></button>
                    <button id="nextBtn3"><i class="fa-solid fa-chevron-right"></i></button>
                </div>

                <div class="owl-carousel owl-theme" id="panel2-carousel" style="overflow: hidden;">
                    @foreach ($deal_sale as $ds)
                        @if ($ds->vi_tri == 2)
                            <div class="card item" style="height: 400px; border-radius: 4px;">
                                <img src="{{ $ds->image }}" class="card-img-top" alt="..."
                                    style="height: 50%; object-fit: cover;">
                                <div class="card-body d-flex flex-column justify-content-between gap-2">
                                    <h5 class="card-title mb-0" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalPanel"
                                        onclick="updateModalContent({{ json_encode($ds) }})">{{ $ds->name_product }}
                                    </h5>
                                    <p class="card-text mb-0 t_over">{{ $ds->content }}</p>
                                    <div class="scene">
                                        <div class="cube">
                                            <span class="side top" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalPanel"
                                                onclick="updateModalContent({{ json_encode($ds) }})">Mua ngay</span>
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

        <div id="tablepanel3">
            <div class="col-12 d-flex" style="position: relative;">
                @foreach ($featured_photo as $fp)
                    @if ($fp->vi_tri == 2)
                        <div class="bg003 me-5 col-4" style="background-image: url('{{ $fp->image }}');"></div>
                    @endif
                @endforeach

                <div class="owl-carousel owl-theme" id="panel3-carousel" style="overflow: hidden;">
                    @foreach ($deal_sale as $ds)
                        @if ($ds->vi_tri == 3)
                            <div class="card item" style="height: 400px; border-radius: 4px;">
                                <img src="{{ $ds->image }}" class="card-img-top" alt="..."
                                    style="height: 50%; object-fit: cover;">
                                <div class="card-body d-flex flex-column justify-content-between gap-2">
                                    <h5 class="card-title mb-0" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalPanel"
                                        onclick="updateModalContent({{ json_encode($ds) }})">{{ $ds->name_product }}
                                    </h5>
                                    <p class="card-text mb-0 t_over">{{ $ds->content }}</p>
                                    <div class="scene">
                                        <div class="cube">
                                            <span class="side top" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalPanel"
                                                onclick="updateModalContent({{ json_encode($ds) }})">Mua ngay</span>
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

        <!-- Modal chung cho các sản phẩm -->
        <div class="modal fade" id="exampleModalPanel" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header container">
                        <h1 class="modal-title fs-5" id="modalTitle1"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body container d-flex">
                        <div class="aside col-4">
                            <img id="modalImage" alt="" class="col-12">
                            <div class="col-12 mt-3 pt-3 pb-3">
                                <div class="table-page col-lg-12">
                                    <div class="card" style="border: none;">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table
                                                    class="table-user table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <th>Thông số kỹ thuật</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td id="modalSpecifications"></td>
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
                            <div class="col-12 fw-bold fs-4" id="modalTitle2"></div>
                            <div class="col-12" id="modalRating"
                                style="margin: 4px 0 0 8px;font-size: 18px;color: #f0f073;"></div>
                            <div class="col-12 fs-2 text-danger mt-3 fw-bold" id="modalPrice"></div>
                            <div class="col-12 mt-3">
                                <div class="text-danger fw-bold p-3"
                                    style="background: rgb(241, 158, 158); border-radius: 4px 4px 0 0">
                                    Quà tặng khuyến mãi
                                </div>
                                <div class="text-danger p-3" id="modalKhuyenMai"
                                    style="border: 1px solid rgb(241, 158, 158); border-radius: 0 0 4px 4px">
                                </div>
                            </div>
                            <button type="button" onclick="showAlertNotLogin()"
                                class="btn btn-danger mt-3 p-5 pt-2 pb-2 fs-4">MUA NGAY</button>
                            <div class="col-12 mt-3">
                                <div id="modalMoTa"></div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="text-dark fw-bold p-3"
                                    style="background: rgb(153, 150, 150); border-radius: 4px 4px 0 0">
                                    Ưu đãi đặc biệt
                                </div>
                                <div class="text-dark p-3"
                                    style="border: 1px solid rgb(153, 150, 150); border-radius: 0 0 4px 4px"
                                    id="modalUudai">
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
    </div>
</div>
<script>
    const tabs = document.querySelectorAll('.panel');
    const contents = [
        document.getElementById('tablepanel1'),
        document.getElementById('tablepanel2'),
        document.getElementById('tablepanel3')
    ];

    tabs[0].classList.add('active');
    contents.forEach((content, index) => {
        content.style.display = index === 0 ? 'flex' : 'none';
    });

    tabs.forEach((tab, index) => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(content => content.style.display = 'none');

            tab.classList.add('active');
            contents[index].style.display = 'flex';
        });
    });
</script>
<script>
    function updateModalContent(data) {
        document.getElementById('modalTitle1').innerText = data.name_product;
        document.getElementById('modalTitle2').innerText = data.name_product;
        document.getElementById('modalImage').src = data.image;
        document.getElementById('modalSpecifications').innerHTML = data.parameter || 'null';
        document.getElementById('modalPrice').innerText = data.price || 'Đang cập nhật';
        document.getElementById('modalKhuyenMai').innerHTML = data.promotion;
        document.getElementById('modalUudai').innerHTML = data.endow;
        document.getElementById('modalMoTa').innerHTML = data.mo_ta;

        // Cập nhật sao đánh giá
        var ratingHtml = '';
        var evaluate = data.evaluate; // Giá trị đánh giá sản phẩm

        // Hiển thị sao đánh giá
        for (var i = 1; i <= 5; i++) {
            if (evaluate >= i) {
                ratingHtml += '<i class="fa-solid fa-star"></i>'; // Sao đầy
            } else if (evaluate >= i - 0.5) {
                ratingHtml += '<i class="fa-solid fa-star-half-stroke"></i>'; // Sao nửa
            } else {
                ratingHtml += '<i class="fa-regular fa-star"></i>'; // Sao rỗng
            }
        }

        document.getElementById('modalRating').innerHTML = data.evaluate + ratingHtml;
    }
</script>
