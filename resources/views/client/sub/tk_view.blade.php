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
                            <th>Ảnh sản phẩm</th>
                            <th>Số lượt xem</th>
                        </thead>
                        <tbody>
                            {{-- @foreach ($coinkiemduoc as $d) --}}
                            <tr>
                                <td>1</td>
                                <td>GD100</td>
                                <td></td>
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
