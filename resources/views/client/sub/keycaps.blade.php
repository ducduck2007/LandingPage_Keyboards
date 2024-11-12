<div class="container-fluid col-11 mt-4" id="scrollKeycaps">
    <div class="card_keycaps col-12" style="position: relative">
        <div class="titleKeycaps col-12 text-light text-end fs-3 p-4 btn-shine" style="position: relative; z-index: 1;">
            CÁC LOẠI
            KEYCAPS</div>
        <img src="{{ asset('assets/images/keycaps_trangtri.png') }}" alt="" class="trang_tri">
        <div class="col-12 d-flex p-4" style="position: relative;">

            <div class="custom-nav d-flex align-items-center justify-content-between col-12">
                <button id="prevBtn6" style="margin-left: 20px"><i class="fa-solid fa-chevron-left"></i></button>
                <button id="nextBtn6" style="margin-right: 20px"><i class="fa-solid fa-chevron-right"></i></button>
            </div>

            <div class="owl-carousel owl-theme" id="cardKeycaps" style="overflow: hidden;">
                @foreach ($deal_sale as $ds)
                    @if ($ds->vi_tri == 6)
                        <div class="card item" style="height: 400px; border-radius: 4px;">
                            <img src="{{ $ds->image }}" class="card-img-top" alt="..."
                                style="height: 50%; object-fit: cover;">
                            <div class="card-body d-flex flex-column justify-content-between gap-2">
                                <h5 class="card-title mb-0">{{ $ds->title }}</h5>
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
<style>
    .card_keycaps {
        height: max-content;
        background: linear-gradient(to left, #222527, #2f3031);
        position: relative;
        overflow: hidden;
        border-radius: 4px;
    }

    .trang_tri {
        position: absolute;
        z-index: 1;
        top: -5%;
        right: 18%;
        object-fit: cover;
        height: 180px;
    }

    .card_keycaps::before {
        content: '';
        position: absolute;
        width: 120%;
        height: 150%;
        background-image: linear-gradient(180deg, rgb(0, 183, 255), rgb(255, 48, 255), rgb(255, 189, 48));
        animation: rotBGimg 8s linear infinite;
        transition: all 0.2s linear;
    }

    @keyframes rotBGimg {
        0% {
            transform: rotate(0deg) scale(1);
        }

        50% {
            transform: rotate(180deg) scale(1.2);
        }

        100% {
            transform: rotate(360deg) scale(1);
        }
    }

    .card_keycaps::after {
        content: '';
        position: absolute;
        background: linear-gradient(to left, #222527, #2f3031);
        inset: 5px;
        border-radius: 4px;
    }
</style>
