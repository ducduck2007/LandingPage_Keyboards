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
                <div class="bg003 me-5 col-3"></div>
                <div class="custom-nav col-9">
                    <button id="prevBtn"><i class="fa-solid fa-chevron-left"></i></button>
                    <button id="nextBtn"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
                <div class="owl-carousel owl-theme" style="overflow: hidden;">
                    @foreach ($deal_sale as $ds)
                        <div class="card item" style="height: 400px; border-radius: 4px;">
                            <img src="{{ $ds->image }}" class="card-img-top" alt="..."
                                style="height: 50%; object-fit: cover;">
                            <div class="card-body d-flex flex-column justify-content-between gap-2">
                                <h5 class="card-title mb-0">{{ $ds->title }}</h5>
                                <p class="card-text mb-0 t_over">{{ $ds->content }}
                                </p>
                                <a href="{{ $ds->link }}" class="btn btn-primary">Mua ngay</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div id="tablepanel2">
            <div class="col-12 d-flex" style="position: relative;">
                <div class="owl-carousel owl-theme" style="overflow: hidden;">
                    @foreach ($deal_sale as $ds)
                        <div class="card item" style="height: 400px; border-radius: 4px;">
                            <img src="{{ $ds->image }}" class="card-img-top" alt="..."
                                style="height: 50%; object-fit: cover;">
                            <div class="card-body d-flex flex-column justify-content-between gap-2">
                                <h5 class="card-title mb-0">{{ $ds->title }}</h5>
                                <p class="card-text mb-0 t_over">{{ $ds->content }}
                                </p>
                                <a href="{{ $ds->link }}" class="btn btn-primary">Mua ngay</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div id="tablepanel3">
            <div class="col-12 d-flex" style="position: relative;">
                <div class="bg003 me-5 col-3"></div>
                <div class="owl-carousel owl-theme" style="overflow: hidden;">
                    @foreach ($deal_sale as $ds)
                        <div class="card item" style="height: 400px; border-radius: 4px;">
                            <img src="{{ $ds->image }}" class="card-img-top" alt="..."
                                style="height: 50%; object-fit: cover;">
                            <div class="card-body d-flex flex-column justify-content-between gap-2">
                                <h5 class="card-title mb-0">{{ $ds->title }}</h5>
                                <p class="card-text mb-0 t_over">{{ $ds->content }}
                                </p>
                                <a href="{{ $ds->link }}" class="btn btn-primary">Mua ngay</a>
                            </div>
                        </div>
                    @endforeach
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
