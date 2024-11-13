<div class="container-fluid col-11 mt-4" id="scrollSwitch">
    <div class="switchKhung d-flex align-items-center" style="position: relative">
        <div class="col-1 afterSwitch text-light d-flex flex-column justify-content-center text-center fs-1 btn-shine"
            style="position: relative">
            <span>S</span>
            <span class="ms-4">W</span>
            <span>I</span>
            <span class="ms-4">T</span>
            <span>C</span>
            <span class="ms-4">H</span>
        </div>
        <div class="fs-4" style="position: absolute;top: 13.5%;left: 5%;color: #ccc ;opacity: 0.7">witch
        </div>
        <div class="col-11 d-flex p-4" style="position: relative;">

            <div class="custom-nav d-flex align-items-center justify-content-between col-12">
                <button id="prevBtnS" style="margin-left: 20px"><i class="fa-solid fa-chevron-left"></i></button>
                <button id="nextBtnS" style="margin-right: 20px"><i class="fa-solid fa-chevron-right"></i></button>
            </div>

            <div class="owl-carousel owl-theme" id="cardSwitch" style="overflow: hidden;">
                @foreach ($deal_sale as $ds)
                    @if ($ds->vi_tri == 7)
                        <div class="card item" style="height: 400px; border-radius: 4px;">
                            <img src="{{ $ds->image }}" class="card-img-top" alt="..."
                                style="height: 50%; object-fit: cover;">
                            <div class="card-body d-flex flex-column justify-content-between gap-2">
                                {{-- <h5 class="card-title mb-0" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalCardPhim">
                                    {{ $ds->title }}</h5> --}}
                                <h5 class="card-title mb-0" data-bs-toggle="modal" data-bs-target="#exampleModalPanel"
                                    onclick="updateModalContent({{ json_encode($ds) }})">{{ $ds->title }}</h5>
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
