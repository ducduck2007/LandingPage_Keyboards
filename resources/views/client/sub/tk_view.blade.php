<div class="container-fluid col-11 mt-4">
    <div class=" table-page col-lg-12">
        <div class="card">
            <div class="card-body">
                <p>THỐNG KÊ SẢN PHẨM CÓ LƯỢT XEM NHIỀU NHẤT</p>
                <div class="table-responsive">
                    <table class="table-user table table-striped table-bordered table-hover" id="example" class="display"
                        style="width:100%">
                        <!-- STT	UserID	Server	Question	Answer	Time	Status	Reply -->
                        <thead>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Số lượt xem</th>
                        </thead>
                        <tbody>
                            {{-- @foreach ($coinkiemduoc as $d) --}}
                            <tr>
                                <td>1</td>
                                <td>Bàn phím cơ Razer BlackWidow V3 Pro</td>
                                <td>Razer BlackWidow V3 Pro là bàn phím cơ không dây cao cấp dành cho game thủ. Với
                                    thiết kế full-size, switch cơ học độc quyền của Razer, đèn nền RGB Chroma đặc trưng
                                    và kết nối đa năng, đây là một sản phẩm mang lại trải nghiệm chơi game mượt mà và
                                    phong cách đỉnh cao.</td>
                                <td>2k views</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Bàn phím cơ mini Machenike K500-B61</td>
                                <td>Machenike K500-B61 là bàn phím cơ mini layout 61 phím, gọn nhẹ và đa năng. Với thiết
                                    kế hiện đại, LED RGB rực rỡ và khả năng kết nối không dây, sản phẩm này lý tưởng cho
                                    những người dùng cần sự linh hoạt và phong cách.</td>
                                <td>2k views</td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
