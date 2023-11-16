@extends('layouts.site')
@section('title', $title??'Trang chu')
@section('content')
<section class="blog-details-hero set-bg" data-setbg="img/blog/details/details-hero.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2>Trang đơn</h2>
                </div>
            </div>
        </div>
    </div>
</section>
    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                        aria-selected="true">Giới thiệu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                        aria-selected="false">Chính sách mua hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                        aria-selected="false">Chính sách bảo hành</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab"
                                        aria-selected="false">Chính sách vận chuyển</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-5" role="tab"
                                        aria-selected="false">Chính sách đổi trả</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        {{-- <p> {!!$post1->detail!!}</p> --}}
                                        <p>KYO Authentic là địa chỉ mua sắm tin cậy của các bạn trẻ, chúng tôi cung cấp các sản phẩm làm đẹp chính hãng tốt nhất từ các thương hiệu nổi tiếng trên thế giới, các sản phẩm đảm bảo chất lượng, an toàn, giúp khách hàng an tâm làm đẹp. KYO Authentic còn là nơi chia sẻ kiến thức, kinh nghiệm làm đẹp, review mỹ phẩm, cập nhật những thông tin mới nhất về xu hướng làm đẹp.</p>
                                                                                Các sản phẩm tại Kyo cung cấp đa dạng từ son môi, nước hoa, trang điểm, chăm sóc cơ thể… được nhập khẩu từ những quốc gia có tên tuổi trong ngành làm đẹp như Pháp, Mỹ, Anh, Nhật, Hàn Quốc… những thương hiệu nổi tiếng chúng tôi đang phân phối có thể kể đến như Gucci, Dior, Chanel, Lancome, YSL, Tom Ford, Shu Uemura, 3CE, Black Rouge…

Tại Kyo chúng tôi nói không với hàng giả, hàng kém chất lượng, các sản phẩm được bày bán tại Kyo đều có nguồn gốc xuất xứ rõ ràng, lô date mới nhất. Chúng tôi cũng có cập nhật những kinh nghiệm, thông tin hữu ích trên website để khách hàng có thể tìm hiểu và biết cách kiểm tra những sản phẩm chất lượng và an tâm mua sắm.
                                            <h2>Quà tặng yêu thương – thay lời muốn nói</h2>
                                            Bạn có thể mua sắm các sản phẩm làm đẹp tại Kyo để làm quà tặng gửi người thương yêu – thay lời muốn nói vào những ngày lễ, kỷ niệm, dịp đặc biệt như sinh nhật, 8/3, noel, kỷ niệm ngày cưới, valentine… Các chuyên gia tư vấn của Kyo sẽ giúp bạn lựa chọn được sản phẩm phù hợp nhất, tạo ra món quà ý nghĩa và trao tận tay cho người thương yêu của bạn. 
                                            <h2>Cam kết đảm bảo quyền lợi của khách hàng</h2>
                                            Tại Kyo chúng tôi cung cấp những chính sách sau để đảm bảo quyền lợi của khách hàng khi mua sắm:

                                        Chỉ bán hàng chính hãng, 100% sản phẩm chính hãng
                                        Miễn phí ship cho đơn hàng từ 800.000đ
                                        Chỉ cung cấp sản phẩm từ các thương hiệu uy tín trên thị trường
                                        Hỗ trợ đổi trả sản phẩm trong 30 ngày
                                        Hỗ trợ gửi quà tặng đến tận tay người nhận
                                        Nhiều ưu đãi cho khách hàng thân thiết kết nối dài lâu
                                        Hình thức thanh toán linh động
                                        Giao hàng toàn quốc
                                        Tư vấn tận tình 24/7

                                        </p>

                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-2" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        {{-- <p> {!!$post2->detail!!}</p> --}}
                                        <p> <h1>1. Tìm kiếm sản phẩm</h1>
                                            Bạn có thể tìm sản phẩm theo 3 cách:

                                            Gõ tên sản phẩm vào thanh tìm kiếm
                                            Tìm theo danh mục
                                            Tìm theo các sản phẩm mới nhất, bán chạy hoặc danh mục phổ biến trên từng ngành hàng
                                        <p> <h1>2. Thêm sản phẩm vào giỏ hàng</h1>
                                            Khi đã tìm được sản phẩm mong muốn, bạn vui lòng bấm vào hình hoặc tên sản phẩm để vào được trang thông tin chi tiết của sản phẩm, sau đó:

                                            Kiểm tra thông tin sản phẩm: giá, thông tin khuyến mãi.
                                            Chọn số lượng mong muốn.
                                            Nhấn nút Mua ngay để thêm sản phẩm vào giỏ hàng.                                            
                                        </p>
                                        <p> <h1>3. Kiểm tra giỏ hàng</h1>
                                            Để kiểm tra giỏ hàng bạn click vào biểu tượng giỏ hàng ở góc phải và chọn xem giỏ hàng để kiểm tra.
                                            Để đặt nhiều sản phẩm khác nhau vào cùng 1 đơn hàng, vui lòng thực hiện theo các bước sau:
                                            – Click vào logo Kyo (hoặc menu Trang chủ) để trở về trang chủ hoặc sử dụng danh mục sản phẩm để chuyển nhanh đến trang sản phẩm cần xem
                                            
                                            – Thêm sản phẩm vào giỏ hàng như ở Bước 2.
                                        </p>
                                        <p> <h1>4. Điền thông tin giao hàng và thanh toán</h1>
                                            Điền các thông tin cần thiết và mã giảm giá (nếu có) sau đó chọn “Tiến hành thanh toán” để đến trang thanh toán.
                                            Chọn phương thức thanh toán phù hợp: Chuyển khoản ngân hàng hoặc Nhận hàng trả tiền (COD)
                                        </p>
                                        <p> <h1>5. Đặt hàng</h1>
                                            Bạn vui lòng kiểm tra lại các thông tin sau trước khi nhấn nút đặt hàng: họ tên, số điện thoại, địa chỉ nhận hàng, thông tin giảm giá, tổng tiền.

                                            Nếu các thông tin trên đã chính xác, bạn nhấn nút Đặt hàng để hoàn tất đơn hàng. Hệ thống sẽ tự  động khởi tạo một đơn hàng dựa trên các thông tin bạn đã đăng ký. Nhân viên của Kyo sẽ liên hệ với bạn để xác nhận đơn hàng và tiến hành vận chuyển sản phẩm đến địa chỉ của bạn.
                                            
                                            Đơn hàng hoàn tất nếu có nhu cầu mua tiếp bạn có thể chọn tiếp tục mua hàng.
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-3" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        {{-- <p> {!!$post3->detail!!}</p> --}}
                                        <p> <h1>Liên hệ với Kyo Authentic qua Hotline 0975 436 989/ 024 66 737 999 hoặc truy cập trang “Liên hệ“ và cung cấp thông tin chi tiết về sản phẩm lỗi gồm:                                        </h1>
                                            Mã số đơn hàng hoặc thông tin người mua hàng (Họ tên, điện thoại, email, địa chỉ)
                                            Tên sản phẩm
                                            Lỗi sản phẩm (mô tả chi tiết và kèm ảnh chụp nếu có)
                                            Nhu cầu cần hỗ trợ: đổi/trả/bảo hành
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-4" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        {{-- <p> {!!$post4->detail!!}</p> --}}
                                        <p><h1>1. PHẠM VI ÁP DỤNG :</h1> 
                                            Tất cả khách hàng mua hàng qua hotline hoặc tại website: https://kyo.vn có nhu cầu giao hàng tại nhà
                                        </p>
                                        <p> <h1>2. HÌNH THỨC ÁP DỤNG:</h1>
Áp dụng cho tất cả sản phẩm được bán tại website: https://kyo.vn
Với sản phẩm đổi, bảo hành: Khách hàng chịu chi phí vận chuyển theo đơn vị chuyển phát.
                                        </p>
                                        <p> <h1>3. THỜI GIAN GIAO HÀNG :</h1>
                                            Thời gian giao hàng sẽ từ 1-5 ngày tùy vào khoảng cách vận chuyển.
                                            Trong một số trường hợp khách quan KYO Authentic có thể giao hàng chậm trễ do những điều kiện bất khả kháng như thời tiết xấu, điều kiện giao thông không thuận lợi, xe hỏng hóc trên đường giao hàng, trục trặc trong quá trình xuất hàng.
                                            Trong thời gian chờ đợi nhận hàng, Quý khách có bất cứ thắc mắc gì về thông tin vận chuyển xin vui lòng liên hệ hotline 0986.448.789 để nhận trợ giúp.
                                        </p>
                                        <p> <h1>4. TRÁCH NHIỆM VỚI HÀNG HÓA VẬN CHUYỂN .</h1>
                                            Dịch vụ vận chuyển của do KYO Authentic chỉ định sẽ chịu trách nhiệm với hàng hóa và các rủi ro như mất mát hoặc hư hại của hàng hóa trong suốt quá trình vận chuyển hàng từ KYO Authentic đến quý khách.
                                            Quý khách có trách nhiệm kiểm tra hàng hóa khi nhận hàng. Khi phát hiện hàng hóa bị hư hại, móp méo, hoặc sai hàng hóa thì ký xác nhận tình trạng hàng hóa với Nhân viên giao nhận và thông báo ngay cho Bộ phận chăm sóc khách hàng theo số hotline của KYO Authentic.
                                            
                                            Sau khi quý khách đã ký nhận hàng mà không ghi chú hoặc có ý kiến về hàng hóa. KYO Authentic không có trách nhiệm với những yêu cầu đổi trả vì hư hỏng, trầy xước, bể vỡ, móp méo, sai hàng hóa,… từ quý khách sau này.
                                            Nếu dịch vụ vận chuyển do quý khách chỉ định và lựa chọn thì quý khách sẽ chịu trách nhiệm với hàng hóa và các rủi ro như mất mát hoặc hư hại của hàng hóa trong suốt quá trình vận chuyển hàng từ KYO đến quý khách. Khách hàng sẽ chịu trách nhiệm cước phí và tổn thất liên quan.
                                        </p>
                                        <p> <h1>5. CAM KẾT</h1>
                                            KYO Authentic cam kết giao hàng tới tất cả các tỉnh thành trong phạm vi toàn quốc. Chúng tôi liên kết với các hãng vận chuyển hàng hóa chuyên nghiệp và uy tín trên thị trường… đảm bảo cho hàng hóa được đảm bảo an toàn và đúng hẹn với quý khách hàng.
                                        </p>

                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        {{-- <p> {!!$post5->detail!!}</p> --}}
                                        <p> <h1>Kiểm tra điều kiện đổi trả hàng:</h1>
                                            Vui lòng chắc chắn rằng sản phẩm bạn yêu cầu đổi hoặc trả lại thỏa mãn điều kiện đổi trả hàng của Kyo Authentic
                                            
                                            Bạn có thể đổi sản phẩm đã mua tại KYO.VN sang sản phẩm khác bằng giá hoặc cao hơn trong vòng 30 ngày kể từ khi nhận hàng (trừ những sản phẩm có quy định khác) khi thỏa mãn các điều kiện sau:
                                            
                                            Sản phẩm không có dấu hiệu đã qua sử dụng, còn nguyên vẹn về hình thức và chất lượng.
                                            Sản phẩm còn đầy đủ phụ kiện, tem hoặc phiếu bảo hành cùng quà tặng kèm theo (nếu có).
                                            Phải có hóa đơn mua hàng của shop hoặc cung cấp đúng thông tin đã mua hàng tại shop.
                                            Sản phẩm không nằm trong danh mục khuyến mãi hay được cho tặng.
                                            Sản phẩm không nằm trong danh mục hạn chế đổi – trả
                                            Chỉ hỗ trợ trả hàng trong trường hợp sản phẩm bạn nhận được có lỗi nhưng không còn sản phẩm để thay thế.
                                            Lưu ý: Trường hợp sản phẩm có lỗi bạn cần thông báo cho KYO ngay sau khi nhận được hàng, cung cấp hình ảnh và video mở hộp sản phẩm để được hỗ trợ đổi trả (nếu không có hình ảnh và video quay khi mở hộp KYO sẽ không hỗ trợ đổi trả sản phẩm và xử lý khiếu nại về sản phẩm).
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
@endsection
