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
                            data-title="{{ $ds->name_product }}" data-image="{{ $ds->image }}"
                            data-specifications="{{ $ds->parameter }}" data-price="{{ $ds->price }}">
                            <img src="{{ $ds->image }}" class="card-img-top" alt="..."
                                style="height: 50%; object-fit: cover;">
                            <div class="card-body d-flex flex-column justify-content-between gap-2">
                                {{-- <h5 class="card-title mb-0" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalCardPhim">
                                    {{ $ds->name_product }}
                                </h5> --}}
                                <h5 class="card-title mb-0" data-bs-toggle="modal" data-bs-target="#exampleModalPanel"
                                    onclick="updateModalContent({{ json_encode($ds) }})">{{ $ds->name_product }}</h5>
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
</div>
