@extends('layouts.base')
@section('content')
    <section class="page-banner"
             style="height: 200px;!important;background-image: url('{{asset('img/job/backgroud-header.png')}}')">
        <div class="text-banner">Điều khoản &
            chính sách
        </div>
    </section>
    <div class="page-container m-t-30">
        <div class="container p-b-50">
            <div class="row">
                <div class="col-md-3 col-12 ">
                    <div class="list-item list-item--list ">
                        <div class="list-item__info have-tag">
                            <ul class="" style="width: 100%">
                                <li class="m-b-20 m-text3">Mục lục</li>
                                <li class="active m-b-20"><a class="s-text15 " data-toggle="tab" href="#home">Chính sách
                                        bảo mật</a></li>
                                <hr style="margin-top: 10px!important;margin-bottom: 10px;!important;">
                                <li class="m-b-20"><a class="s-text15 m-b-4" data-toggle="tab" href="#menu2">Điều khoản
                                        sử dụng</a></li>
                                <hr style="margin-top: 10px!important;margin-bottom: 10px;!important;">
                                {{--                                <li class="m-b-20"><a class="s-text15 m-b-4" data-toggle="tab" href="#menu3">Giải quyết--}}
                                {{--                                        khiếu nại</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-12 ">
                    <div class="list-item list-item--list " style="padding: 10px 30px;">
                        <div class="tab-content">
                            <div class="">
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        <h3 class="m-text3">Chính sách bảo mật</h3>
                                        <p>Nếu bạn có câu hỏi về Điều khoản sử dụng này, vui lòng gửi email tới địa chỉ
                                            hotro@samacom.com.vn để được giải đáp nhanh nhất..</p>
                                        <div id="div1" class="m-b-18 title-backgroud" data-toggle="collapse"
                                             data-target="#chinhsach1">
                                            <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                <i class="icon icon-add-2 icon-color"></i>&nbsp;&nbsp;
                                                <span class="color-after-icon">Tổng quan</span>
                                            </div>
                                        </div>
                                        <div id="chinhsach1"
                                             style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                             class="collapse">
                                            <div style="padding: 20px 20px;">
                                                Samacom cam kết tôn trọng thông tin cá nhân của người sử dụng. Chúng tôi
                                                cố gắng cung cấp cho bạn kinh nghiệm sử dụng an toàn. Bảng quy định bảo
                                                mật này đưa ra bộ sưu tập dữ liệu trực tuyến, những quy định và
                                                hoạt động sử dụng được áp dụng cho tất cả những
                                                trang web của chúng tôi (nếu một bảng quy định bảo mật khác đặc biệt
                                                không được áp dụng). Bằng việc dùng trang web samacom.com.vn, bạn đã
                                                đồng ý sử dụng những quy định và những hoạt động được mô tả trong bảng
                                                này.
                                                <br><br>
                                                Những dữ liệu của bạn sẽ được tích trữ và xử lý ở Việt Nam. Nếu bạn truy
                                                cập trang web samacom.com.vn bên ngoài việt nam, sử dụng trang web này
                                                tức là bạn đã đồng ý chuyển tải dữ liệu của bạn ra khỏi nước bạn và đưa
                                                đến việt nam.
                                                <br><br>
                                                Những trang web của chúng tôi nối với những trang web khác không thuộc
                                                quyền quản lý của chúng tôi.
                                                Samacom không chịu trách nhiệm về những quy định bảo mật hay những hoạt
                                                động của những trang web khác do bạn chọn từ trang web samacom.com.vn.
                                                Chúng tôi khuyến cáo bạn nên xem lại những quy định bảo mật của những
                                                trang web đó để bạn có thể biết được
                                                cách họ thu thập, sử dụng và chia sẻ thông tin của bạn. Bảng quy định
                                                bảo mật này chỉ áp dụng với những thông tin chúng tôi thu thập trên
                                                trang web samacom.com.vn và không áp dụng với những thông tin chúng tôi
                                                thu thập trên bất kỳ trang nào khác.
                                            </div>
                                        </div>
                                        <div id="div2"
                                             class="m-b-18 title-backgroud" data-toggle="collapse"
                                             data-target="#thunhap">
                                            <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                <span class="color-after-icon">Thu thập và lưu trữ thông tin</span>
                                            </div>
                                        </div>
                                        <div id="thunhap"
                                             style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                             class="collapse">
                                            <div style="padding: 20px 20px;">
                                                Ở một vài vùng trên trang web của chúng tôi, samacom.com.vn đòi hỏi và
                                                có thể đòi hỏi bạn cung cấp thông tin cá nhân, bao gồm tên, địa chỉ, địa
                                                chỉ email, số điện thoại, số tài khoản, số bảo hiểm xã hội, thông tin
                                                liên lạc, thông tin quảng cáo và bất cứ những thông tin khác mà tính
                                                đồng nhất có thể thấy rõ. Ở những vùng khác, samacom thu thập hoặc có
                                                thể thu thập thông tin về nhân khẩu mà không chỉ riêng đối với bạn như
                                                mã vùng, tuổi, người giới thiệu, giới tính, thu nhập và sở thích. Thỉnh
                                                thoảng chúng tôi thu thập hoặc có thể thu thập kết hợp của cả hai loại
                                                thông tin. Ví dụ về những vùng trên trang web samacom nơi chúng tôi thu
                                                thập những dữ liệu cá nhân hoặc kết hợp giữa cá nhân và nhân khẩu là
                                                những trang bạn có thể mở tài khoản samacom, đăng ký dùng một loại dịch
                                                vụ, đơn xin việc, tham dự một cuộc thi hoặc mua sản phẩm.
                                                <br><br>

                                                Thêm vào đó, Samacom có thể không trực tiếp thu thập những thông tin về
                                                bạn khi bạn dùng những dịch vụ của bên thứ ba trên trang web của chúng
                                                tôi. Ví dụ, nếu bạn đăng ký vào trang web của chúng tôi bằng cách dùng
                                                tên truy cập và mật khẩu của bạn, có nghĩa là bạn đã ủy quyền cho chúng
                                                tôi truy cập và giữ lại những thông tin trong thông tin tài khoản của
                                                bạn; những thông tin như thế sẽ được bắt buộc phải cung cấp và xử lý
                                                theo những quy định và hoạt động được mô tả trong bản quy định này.
                                                <br><br>

                                                Chúng tôi cũng thu thập và có thể thu thập một vài thông tin nào đó về
                                                việc bạn sử dụng trang web của chúng tôi, như những vùng và những dịch
                                                vụ bạn truy cập. Hơn nữa, có thông tin về phần cứng và phần mềm trong
                                                máy tính của bạn được hoặc có thể được Samacom thu thập. Thông tin này
                                                có thể bao gồm mà không hạn chế địa chỉ ip, loại thông tin xem, tên
                                                miền, thời gian truy cập và những địa chỉ trang web tham khảo.
                                                <br><br>

                                                Samacom thỉnh thoảng có thể cho bạn cơ hội cung cấp những thông tin mô
                                                tả, văn hóa, cách ứng xử, tham khảo và/hoặc thông tin về lối sống, nhưng
                                                chỉ phụ thuộc vào bạn, liệu bạn có muốn cung cấp những thông tin như
                                                thế. Nếu bạn cung cấp những thông tin như thế, có nghĩa là bạn đồng ý
                                                cho sử dụng những thông tin đó theo quy định và hoạt động được mô tả
                                                trong bảng quy định này. Ví dụ, thông tin như thế có thể được dùng với
                                                mục đích xác định lợi ích tiềm năng của bạn trong việc nhận email hoặc
                                                những giao tiếp khác về những sản phẩm và dịch vụ riêng.
                                                <br><br>

                                                Xin nhớ rằng nếu bạn đưa bất cứ thông tin cá nhân nào lên Samacom, hoặc
                                                trong bảng dữ liệu đơn xin việc có thể tìm thấy, những thông tin như thế
                                                có thể được thu thập và được sử dụng bởi những người mà Samacom không có
                                                quyền quản lý. Chúng tôi không chịu trách nhiệm nếu bên thứ ba sử dụng
                                                thông tin mà bạn cung cấp ở những khu vực công cộng của Samacom.
                                                <br><br>

                                                Vì chúng tôi tin rằng việc quản lý nghề nghiệp của bạn là một quá trình
                                                dài lâu nên chúng tôi giữ lại không giới hạn tất cả những thông tin
                                                chúng tôi thu thập được về bạn trong nỗ lực giúp bạn tiếp tục hợp tác
                                                với chúng tôi một cách hiệu quả, thuần thục và thích hợp hơn. Dĩ nhiên,
                                                bạn có thể sửa chữa hoặc cập nhật những mô tả sơ lược tài khoản Samacom
                                                của bạn, đơn xin việc trong bảng mô tả sơ lược trên mạng Samacom của bạn
                                                bất cứ lúc nào. Ngoài ra, bạn có thể xóa đơn xin việc trên dữ liệu trực
                                                tuyến của Samacom, loại bỏ hoặc đóng tài khoản Samacom bất cứ lúc nào,
                                                những lúc đó chúng tôi sẽ loại bỏ tất cả những bản sao đơn xin việc của
                                                bạn.
                                            </div>
                                        </div>
                                        <div id="div3"
                                             class="m-b-18 title-backgroud" data-toggle="collapse"
                                             data-target="#sudung">
                                            <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                <span class="color-after-icon">Sử dụng thông tin bởi Samacom</span>
                                            </div>
                                        </div>
                                        <div id="sudung"
                                             style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                             class="collapse">
                                            <div style="padding: 20px 20px;">
                                                Chúng tôi dùng thông tin tập hợp được trên trang web samacom.com.vn, dù
                                                là thông tin cá nhân, nhân khẩu, thông tin chung chung hoặc chuyên môn
                                                với mục đích hoạt động và cải thiện trang web samacom.com.vn, khuyến
                                                khích kinh nghiệm của những người sử dụng tích cực và chuyển tải những
                                                sản phẩm và dịch vụ chúng tôi cung cấp.
                                                <br><br>
                                                Chúng tôi cũng có thể dùng những thông tin chúng tôi tập hợp được để
                                                thông báo đến bạn những sản phẩm hoặc dịch vụ khác đang có trên samacom
                                                hoặc những công ty liên kết với nó hoặc để liên hệ với bạn để biết quan
                                                niệm của bạn về những sản phẩm và những dịch vụ hiện tại hoặc những sản
                                                phẩm và dịch vụ mới tiềm năng có thể được đưa ra. (cụm từ " những công
                                                ty liên kết "được định nghĩa trong bảng kê khai với tiêu đề "thông tin
                                                liên lạc ").
                                                <br><br>
                                                Chúng tôi có thể dùng thông tin liên lạc của bạn để gửi email cho bạn
                                                hoặc giao tiếp với bạn cho biết những cập nhật trên trang web Samacom,
                                                như những cơ hội Samacom mới và danh sách bổ sung có thể hấp dẫn bạn.
                                                Những thư này có đến với bạn tự nhiên và thường xuyên hay không phụ
                                                thuộc vào thông tin chúng tôi có về bạn. Thêm vào đó, cùng lúc đăng ký
                                                Samacom, bạn có khả năng chọn lọc để nhận được sự giao tiếp thêm, thông
                                                tin và những xúc tiến bao gồm mà không hạn chế những thư thông tin miễn
                                                phí từ Samacom liên quan đến những tiêu đề có thể đặc biệt thu hút bạn,
                                                chẳng hạn như lời khuyên trong quản lý công việc.
                                                <br><br>
                                                Chúng tôi có một khu vực bạn có thể gửi lại thông tin phản hồi. Bất cứ
                                                thông tin phản hồi nào bạn gửi trong vùng này trở thành tài sản của
                                                chúng tôi và chúng tôi có thể dùng những thông tin phản hồi như thế
                                                (chẳng hạn những câu chuyện thành công) với mục đích thương mại hoặc
                                                liên hệ để cung cấp cho bạn nhiều thông tin hơn nữa.
                                            </div>
                                        </div>
                                        <div id="div4"
                                             class="m-b-18 title-backgroud" data-toggle="collapse"
                                             data-target="#tietlo">
                                            <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                <span
                                                    class="color-after-icon">Tiết lộ thông tin cho những người khác</span>
                                            </div>
                                        </div>
                                        <div id="tietlo"
                                             style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                             class="collapse">
                                            <div style="padding: 20px 20px;">
                                                Chúng tôi không tiết lộ cho bên thứ ba những thông tin cá nhân của bạn,
                                                những thông tin kết hợp giữa cá nhân và nhân khẩu hoặc những thông tin
                                                về việc sử dụng trang web samacom của bạn (như những vùng và những dịch
                                                vụ bạn truy cập), ngoại trừ những điều được đưa ra dưới đây:
                                                <br><br>
                                                Chúng tôi có thể tiết lộ những thông tin trên cho bên thứ ba nếu bạn
                                                đồng ý tiết lộ. Ví dụ, nếu bạn trình bày rằng bạn muốn nhận thông tin về
                                                những thông tin hoặc những dịch vụ của bên thứ ba đúng vào lúc bạn đăng
                                                ký một tài khoản samacom, chúng tôi có thể cung cấp thông tin liên lạc
                                                của bạn cho bên thứ ba như doanh nghiệp, nhà tuyển dụng, người tập hợp
                                                dữ liệu, hay những người khác để gửi email cho bạn hoặc muốn liên lạc
                                                với bạn. Chúng tôi có thể dùng dữ liệu chúng tôi có về bạn (như khoản
                                                thu nhập và những thông tin tham khảo bạn cung cấp) để xác định liệu bạn
                                                có quan tâm đến sản phẩm hoặc những dịch vụ của một bên thứ ba riêng
                                                biệt.
                                                <br><br>
                                                Chúng tôi có thể tiết lộ những thông tin trên cho những công ty và cá
                                                nhân chúng tôi làm việc để chúng tôi thực hiện những chức năng vì lợi
                                                ích của chúng tôi. Những ví dụ có thể bao gồm việc làm chủ những máy chủ
                                                trang web của chúng tôi, phân tích dữ liệu, cung cấp hỗ trợ thị trường,
                                                xử lý thanh toán bằng thẻ tín dụng và cung cấp dịch vụ khách hàng. Những
                                                công ty và những cá nhân này sẽ truy cập thông tin cá nhân của bạn cần
                                                thiết để thực hiện chức năng, nhưng họ không thể chia sẻ thông tin với
                                                bất cứ bên thứ ba nào.
                                                <br><br>
                                                Chúng tôi có thể tiết lộ những thông tin trên nếu được đòi hỏi làm vậy
                                                một cách hợp pháp, nếu được một tổ chức thuộc chính phủ đòi hỏi làm như
                                                vậy hoặc nếu chúng tôi tin rằng làm như vậy là cần thiết để: (a) phù hợp
                                                với những đòi hỏi hợp pháp hoặc tuân theo quy trình hợp pháp; (b) bảo vệ
                                                quyền hoặc tài sản của samacom hoặc những công ty liên kết của nó; (c)
                                                ngăn chặn tội ác hoặc bảo vệ quốc gia; hoặc (d) bảo vệ an toàn cá nhân
                                                của người sử dụng hoặc công chúng. Chúng tôi có thể tiết lộ và chuyển
                                                tải những thông tin trên cho bên thứ ba đòi hỏi tất cả hoặc một phần
                                                quan trọng công việc của samacom, liệu phần nhận được như thế bằng con
                                                đường liên doanh liên kết, hợp nhất hay mua bán của tất cả hoặc một phần
                                                quan trọng tài sản của chúng tôi. Thêm vào đó, trong việc samacom trở
                                                thành chủ thể của một tiến trình phá sản, là cố ý hay vô ý, samacom hoặc
                                                những người ủy thác của nó trong tiến trình phá sản có thể bán, cho phép
                                                hay nói cách khác quyết định những thông tin như thế trong một hợp đồng
                                                được công nhận bởi tòa án phá sản.
                                                <br><br>
                                                Samacom cũng có thể chia sẻ thông tin nặc danh tập hợp về những người
                                                khách đến mỗi trang web của nó (ví dụ, số khách đến vùng đa dạng của
                                                samacom) với những khách hàng, đối tác và bên thứ ba để họ có thể hiểu
                                                những loại khách truy cập trang samacom và cách sử dụng trang web này
                                                của họ.
                                                <br><br>
                                                Samacom cung cấp công nghệ, những dịch vụ làm chủ và liên quan cho những
                                                công ty hàng đầu khác vào những vùng tuyển dụng có quyền hạn trên trang
                                                web của họ (thỉnh thoảng được xem như "những vùng tuyển dụng riêng").
                                                Thông tin cá nhân và/hoặc nhân khẩu bạn cung cấp trong những vùng tuyển
                                                dụng riêng trở thành dữ liệu của samacom, nhưng không được sử dụng bởi
                                                người nào khác ngoài bạn, samacom và công ty liên quan nếu không được sự
                                                đồng ý của bạn.
                                                <br><br>
                                                Tôi có thể từ chối nhận thư điện tử không? Bất kỳ khi nào chúng tôi gửi
                                                thông tin đến bạn, chúng tôi sẽ thêm vào những hướng dẫn cách từ chối
                                                nhận thư điện tử mà một liên kết để thực hiện điều đó.
                                            </div>
                                        </div>
                                        <div id="div5"
                                             class="m-b-18 title-backgroud" data-toggle="collapse"
                                             data-target="#xinviec">
                                            <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                <span class="color-after-icon">Đơn xin việc</span>
                                            </div>
                                        </div>
                                        <div id="xinviec"
                                             style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                             class="collapse">
                                            <div style="padding: 20px 20px;">
                                                Vì Samacom là một trang thông tin nghề nghiệp, chúng tôi giúp bạn đăng
                                                nhập đơn xin việc của bạn vào dữ liệu của chúng tôi. Có hai cách làm
                                                điều này:
                                                <br><br>
                                                1. Bạn có thể lưu giữ đơn xin việc của bạn trong kho dữ liệu của chúng
                                                tôi, nhưng không được những nhà tuyển dụng tiềm năng tìm thấy. Không cho
                                                phép đơn xin việc của bạn được tìm thấy có nghĩa là bạn có thể dùng đơn
                                                xin việc này để xin việc trực tuyến nhưng doanh nghiệp và nhà tuyển dụng
                                                sẽ không truy cập để tìm thấy nó thông qua sản phẩm dữ liệu hồ sơ của
                                                chúng tôi.
                                                <br><br>
                                                2. Nếu bạn muốn đơn xin việc của bạn được tìm thấy, tất cả những người
                                                truy cập vào kho dữ liệu đơn xin việc của chúng tôi (hoặc những bản sao)
                                                đều có thể xem được đơn xin việc của bạn. Đồng thời, những phần của đơn
                                                xin việc có thể tìm thấy của bạn (nhưng không phải là những thông tin
                                                liên lạc của bạn) có thể được công khai trong bảng mô tả sơ lược về bạn
                                                trên mạng samacom.
                                                <br><br>
                                                Chúng tôi cố gắng hạn chế việc truy cập vào kho dữ liệu có thể tìm thấy
                                                của chúng tôi (hoặc bản sao) chỉ cho những doanh nghiệp, nhà tuyển dụng,
                                                người chủ thuê, tay săn đầu người và những tổ chức tuyển người chuyên
                                                nghiệp cũng như và những tổ chức pháp luật và bảo vệ quốc gia, nhưng
                                                không thể chắc chắn rằng những tổ chức khác sẽ không truy cập được vào
                                                kho dữ liệu này. Chúng tôi sẽ không chịu trách nhiệm đối với việc sử
                                                dụng đơn xin việc của bên thứ ba nếu như họ vào kho dữ liệu của chúng
                                                tôi. Tuy nhiên, những phần trong đơn xin việc có thể được tìm thấy của
                                                bạn (không phải là thông tin liên lạc của bạn) mà tự động công khai
                                                trong bản mô tả sơ lược về bạn trên mạng Samacom có thể được truy cập
                                                bởi bất cứ người nào sử dụng sản phẩm mạng Samacom. Bạn có thể loại bỏ
                                                đơn xin việc của bạn ra khỏi kho dữ liệu có thể được tìm thấy của chúng
                                                tôi hoặc xóa phần mô tả sơ lược về bạn ra khỏi mạng Samacom vào bất cứ
                                                lúc nào. Tuy nhiên, doanh nghiệp, nhà tuyển dụng và những người khác trả
                                                tiền truy cập vào kho dữ liệu đó hoặc chứa một bản sao của kho dữ liệu
                                                đó, cũng như những bên khác truy cập vào kho dữ liệu và những ai truy
                                                cập mạng samacom có thể giữ lại bản sao lý lịch của bạn hoặc bản mô tả
                                                sơ lược trong tư liệu riêng của họ. Chúng tôi không chịu trách nhiệm về
                                                việc sở hữu, sử dụng hoặc bảo mật đơn xin việc hoặc bản mô tả sơ lược
                                                trong những trường hợp này.
                                            </div>
                                        </div>
                                        <div id="div6"
                                             class="m-b-18 title-backgroud" data-toggle="collapse"
                                             data-target="#cookie">
                                            <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                <span class="color-after-icon">Sử dụng Cookies</span>
                                            </div>
                                        </div>
                                        <div id="cookie"
                                             style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                             class="collapse">
                                            <div style="padding: 20px 20px;">
                                                Samacom dùng "cookies" để giúp cá nhân hóa và nâng cao tối đa khả năng
                                                và thời gian trực tuyến. Một cookie là một trang văn bản được đặt trên
                                                đĩa cứng của bạn bởi một máy chủ của trang web. Cookie không được dùng
                                                để chạy chương trình hay đưa virus vào máy tính của bạn. Cookie được chỉ
                                                định vào máy tính của bạn và chỉ có thể được đọc bởi một máy chủ trang
                                                web trên miền được đưa ra cookie cho bạn.
                                                <br><br>
                                                Một trong những mục đích đầu tiên của cookie là cung cấp những tiện ích
                                                để tiết kiệm thời gian của bạn. Mục đích của một cookie là báo cho máy
                                                chủ trang web rằng bạn đã quay lại một trang riêng biệt. Ví dụ, nếu bạn
                                                cá nhân hóa những trang samacom hay đăng ký dịch vụ, một cookie sẽ giúp
                                                chúng tôi gợi lại thông tin riêng biệt về bạn (như tên truy cập, mật
                                                khẩu và những phần tham khảo). Nhờ sử dụng cookie, chúng tôi có thể
                                                chuyển tải kết quả được nhanh và chính xác hơn, một trang web cá nhân
                                                hóa hơn. Khi bạn quay lại trang samacom, thông tin bạn cung cấp trước
                                                đây có thể được khôi phục lại, vì vậy bạn có thể dễ dàng sử dụng những
                                                đặc tính mà bạn yêu cầu. Chúng tôi cũng dùng cookie để theo dấu những
                                                lần nhấp chuột và cân bằng nội dung tải.
                                                <br><br>
                                                Bạn có thể chấp nhận hoặc từ chối dùng cookie. Hầu hết những trang web
                                                liên quan tự động chấp nhận cookie, nhưng có thể bạn thường thay đổi
                                                những sắp đặt để từ chối tất cả những cookie nếu bạn thích. Thay vào đó,
                                                bạn có thể thay đổi những sắp đặt để thông báo cho bạn một lần một
                                                cookie bị yếu và cho phép từ chối cookie trong một nền tảng cá nhân. Tuy
                                                nhiên, nếu bạn chọn từ chối cookie, điều đó có thể gây cản trở cho việc
                                                thực hiện và ảnh hưởng không tối đến kinh nghiệm của bạn trên trang web
                                                samacom.
                                                <br><br>
                                                Cập nhật thông tin của bạn
                                                bạn có thể xem lại, sửa chữa, cập nhật hay thay đổi thông tin mô tả sơ
                                                lược trong tài khoản samacom bất cứ lúc nào. Đơn giản chỉ cần đăng nhập
                                                vào tài khoản samacom, vào tài khoản của bạn, xem lại thông tin về tài
                                                khoản, và nếu muốn, hãy sửa chữa theo những phần được cho sẵn.
                                                <br><br>
                                                Nếu bạn chọn l ựa những thư nhận được, email thương mại hay những thông
                                                tin khác từ Samacom hay bên thứ ba vào lúc bạn đăng ký với Samacom nhưng
                                                chắc chắn thay đổi suy nghĩ của bạn, bạn có thể quyết định không tham
                                                gia bằng cách sửa chữa bản mô tả sơ lược tài khoản như miêu tả ở trên.
                                                Nếu bạn chọn trước là không nhận những giao tiếp như thế, sau đó bạn có
                                                thể chọn tham gia bằng cách sửa chữa bản mô tả sơ lược tài khoản
                                            </div>
                                        </div>
                                        <div id="div7"
                                             class="m-b-18 title-backgroud" data-toggle="collapse"
                                             data-target="#baomat">
                                            <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                <span class="color-after-icon">Chính Sách Bảo Mật</span>
                                            </div>
                                        </div>
                                        <div id="baomat"
                                             style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                             class="collapse">
                                            <div style="padding: 20px 20px;">
                                                Samacom đã thực hiện những yêu cầu của một tổ chức và kỹ thuật hợp lý
                                                được thiết kế để bảo vệ thông tin cá nhân của bạn từ sự mất mát do tai
                                                nạn và sự truy cập, sử dụng, thay đổi hay tiết lộ không được phép. Tuy
                                                nhiên, chúng tôi không thể bảo đảm rằng bên thứ ba không hợp pháp sẽ
                                                không bao giờ có thể phá hủy những yêu cầu đó hoặc sử dụng thông tin cá
                                                nhân của bạn vì mục đích không thích hợp.
                                                <br><br>
                                                Khi bạn đặt một yêu cầu trực tuyến tại Samacom, thông tin thẻ tín dụng
                                                của bạn được bảo vệ thông qua việc dùng viết thành mật mã, như cách thức
                                                bảo vệ.
                                            </div>
                                        </div>
                                        <div id="div8"
                                             class="m-b-18 title-backgroud" data-toggle="collapse" data-target="#treem">
                                            <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                <span class="color-after-icon">Trẻ Em</span>
                                            </div>
                                        </div>
                                        <div id="treem"
                                             style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                             class="collapse">
                                            <div style="padding: 20px 20px;">
                                                Samacom không hướng đến trẻ em dưới 13 tuổi. Chúng tôi không thu thập
                                                những thông tin cá nhân của trẻ dưới 13 tuổi
                                            </div>
                                        </div>
                                        <div id="div9"
                                             class="m-b-18 title-backgroud" data-toggle="collapse"
                                             data-target="#quydinh">
                                            <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                <span class="color-after-icon">Thay Đổi Quy Định Bảo Mật</span>
                                            </div>
                                        </div>
                                        <div id="quydinh"
                                             style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                             class="collapse">
                                            <div style="padding: 20px 20px;">
                                                Nếu chúng tôi quyết định thay đổi quy định bảo mật của chúng tôi đối với
                                                Samacom, chúng tôi sẽ gửi những thay đổi đó để bạn biết những thông tin
                                                chúng tôi tập hợp, cách thức chúng tôi sử dụng thông tin, và những ai
                                                chúng tôi tiết lộ thông tin. Nếu vào bất cứ lúc nào, bạn có thể đặt câu
                                                hỏi hay sự quan tâm về bản quy định bảo mật, đừng phiền email cho chúng
                                                tôi tại địa chỉ info@samacom.com.vn
                                            </div>
                                        </div>
                                        <div id="div10"
                                             class="m-b-18 title-backgroud" data-toggle="collapse"
                                             data-target="#lienlac">
                                            <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                <span class="color-after-icon">Thông Tin Liên Lạc</span>
                                            </div>
                                        </div>
                                        <div id="lienlac"
                                             style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                             class="collapse">
                                            <div style="padding: 20px 20px;">
                                                Samacom.com.vn là tên trang web của CÔNG TY CỔ PHẦN ĐÀO TẠO NGUỒN NHÂN
                                                LỰC HRP VIỆT NAM. Trụ sở đặt tại tầng 6, tòa nhà B&B, số 60 ngõ 850
                                                Đường Láng, Quận Đống Đa, Hà Nội.
                                                <br><br>
                                                Chúng tôi rất mong nhận được ý kiến của bạn về bản quy định bảo mật này.
                                                Nếu bạn tin rằng chúng tôi muốn thay đổi bản quy định này, Vui lòng liên
                                                lạc với chúng tôi qua địa chỉ info@samacom.com.vn hoặc Hotline: (024) 6
                                                266 3232. Chúng tôi sẽ cố gắng xem xét và sửa chữa kịp thời.
                                            </div>

                                        </div>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <h3 class="m-text3">Điều khoản sử dụng</h3>
                                        <div id="div11"
                                             class="m-b-18 title-backgroud" data-toggle="collapse"
                                             data-target="#dieukhoanchung">
                                            <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                <span class="color-after-icon">ĐIỀU KHOẢN CHUNG</span>
                                            </div>
                                        </div>
                                        <div id="dieukhoanchung"
                                             style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                             class="collapse">
                                            <div style="padding: 20px 20px;">
                                                Bằng cách truy cập hoặc sử dụng trang web Samacom.com.vn , các dịch vụ,
                                                hoặc bất kỳ ứng dụng nào do Samacom cung cấp (gọi chung là "Dịch vụ"),
                                                dù truy cập bằng cách nào, bạn đồng ý chịu sự ràng buộc của các điều
                                                khoản sử dụng này ("Điều khoản sử dụng"). Dịch vụ do Samacom sở hữu hoặc
                                                kiểm soát. Các Điều khoản sử dụng này ảnh hưởng đến quyền và nghĩa vụ
                                                pháp lý của bạn. Nếu bạn không đồng ý chịu sự ràng buộc của tất cả các
                                                Điều khoản sử dụng này, bạn không truy cập hay sử dụng Dịch vụ. Nếu Bạn
                                                có bất kỳ câu hỏi nào liên quan đến Điều Khoản này, vui lòng liên hệ
                                                chúng tôi tại email: legal@samacom.com.vn .
                                                <br><br>
                                                Chúng tôi có thể cập nhật Điều Khoản này theo thời gian vì các lý do
                                                pháp lý hoặc theo quy định hoặc để cho phép hoạt động thích hợp của
                                                trang web Samacom.com.vn . Mọi thay đổi sẽ được thông báo tới bạn bằng
                                                một thông báo phù hợp trên trang web của chúng tôi. Những thay đổi này
                                                sẽ áp dụng cho việc sử dụng trang web Samacom.com.vn . Sau khi chúng tôi
                                                đã thông báo đến bạn, Nếu bạn không muốn chấp nhận Điều Khoản mới, bạn
                                                không nên tiếp tục sử dụng trang web Samacom.com.vn . Nếu bạn tiếp tục
                                                sử dụng trang web Samacom.com.vn kể từ ngày sự thay đổi có hiệu lực,
                                                việc sử dụng trang web Samacom.com.vn thể hiện bạn đồng ý bị ràng buộc
                                                bởi Điều Khoản mới.
                                            </div>
                                        </div>

                                        <div id="div12"
                                             class="m-b-18 title-backgroud" data-toggle="collapse"
                                             data-target="#dinhnghivagiaithich">
                                            <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                <span class="color-after-icon">ĐỊNH NGHĨA VÀ GIẢI THÍCH</span>
                                            </div>
                                        </div>
                                        <div id="dinhnghivagiaithich"
                                             style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                             class="collapse">
                                            <div style="padding: 20px 20px;">
                                                1.“Cơ sở dữ liệu Samacom.com.vn ” hoặc “Các cơ sở dữ liệu Samacom.com.vn
                                                ” bao gồm tất cả các bài quảng cáo việc làm đăng trên các trang web
                                                Samacom.com.vn và/hoặc tất cả thông tin của các ứng viên và/hoặc các nhà
                                                tuyển dụng được đăng ký với Samacom.com.vn .
                                                <br><br>
                                                2.“Cơ sở dữ liệu Hồ sơ Samacom.com.vn ” hoặc “Các cơ sở dữ liệu Hồ sơ”
                                                là hồ sơ ứng viên được khởi tạo và/hoặc được đăng tại các cơ sở dữ liệu
                                                Samacom.com.vn .
                                                <br><br>
                                                3.“Dịch vụ Samacom.com.vn ” là bất kỳ dịch vụ nào được cung cấp bởi
                                                Samacom.
                                                <br><br>
                                                4.“Hồ sơ cá nhân” là các thông tin, CV cá nhân được tạo bởi Người dùng.
                                                <br><br>
                                                5.“Văn bản” bao gồm tất cả văn bản trên mọi trang của trang web
                                                Samacom.com.vn , cho dù là tài liệu có xác định tác giả, các nội dung
                                                tìm kiếm có định hướng hay thông tin hướng dẫn.
                                                <br><br>
                                                6.“Người dùng” đề cập đến bất kỳ cá nhân hoặc tổ chức nào sử dụng bất kỳ
                                                khía cạnh nào của trang web Samacom.com.vn và/hoặc các Dịch vụ
                                                Samacom.com.vn .
                                                <br><br>
                                                7.“Nội dung Người dùng” là tất cả thông tin, dữ liệu, văn bản, phần mềm,
                                                âm nhạc, âm thanh, hình ảnh, đồ họa, video, quảng cáo, tin nhắn hoặc các
                                                tài liệu khác được gửi, đăng hoặc biểu thị bởi Người dùng trên hoặc
                                                thông qua trang web Samacom.com.vn .
                                            </div>
                                        </div>

                                        <div id="div13"
                                             class="m-b-18 title-backgroud" data-toggle="collapse"
                                             data-target="#dangky">
                                            <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                <span class="color-after-icon">ĐĂNG KÝ</span>
                                            </div>
                                        </div>
                                        <div id="dangky"
                                             style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                             class="collapse">
                                            <div style="padding: 20px 20px;">
                                                Để sử dụng Dịch vụ bạn phải tạo một tài khoản theo yêu cầu của Samacom,
                                                bạn cam kết rằng việc sử dụng tài khoản phải tuân thủ các quy định của
                                                Samacom, đồng thời tất cả các thông tin bạn cung cấp cho chúng tôi là
                                                đúng, chính xác, đầy đủ với tại thời điểm được yêu cầu. Mọi quyền lợi và
                                                nghĩa vụ của bạn sẽ căn cứ trên thông tin tài khoản bạn đã đăng ký, do
                                                đó nếu có bất kỳ thông tin sai lệch nào chúng tôi sẽ không chịu trách
                                                nhiệm trong trường hợp thông tin đó làm ảnh hưởng hoặc hạn chế quyền lợi
                                                của bạn.
                                            </div>
                                        </div>

                                        <div id="div14"
                                             class="m-b-18 title-backgroud" data-toggle="collapse"
                                             data-target="#matkauvabaomat">
                                            <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                <span class="color-after-icon">MẬT KHẨU VÀ BẢO MẬT</span>
                                            </div>
                                        </div>
                                        <div id="matkauvabaomat"
                                             style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                             class="collapse">
                                            <div style="padding: 20px 20px;">
                                                Khi bạn đăng ký sử dụng trang web Samacom.com.vn bạn sẽ được yêu cầu
                                                khởi tạo mật khẩu. Để tránh việc gian lận, bạn phải giữ mật khẩu này bảo
                                                mật và không được tiết lộ hoặc chia sẻ với bất kỳ người nào.Nếu bạn biết
                                                hoặc nghi ngờ người khác biết mật khẩu của bạn, bạn nên thông báo với
                                                chúng tôi ngay lập tức bằng cách liên hệ với chúng tôi tại email
                                                hotro@samacom.com.vn
                                                <br><br>
                                                Nếu Samacom.com.vn có lý do để tin rằng có khả năng có hành vi vi phạm
                                                bảo mật hoặc sử dụng không đúng mục đích trang web Samacom.com.vn ,
                                                chúng tôi có thể yêu cầu bạn thay đổi mật khẩu hoặc chúng tôi có thể tạm
                                                dừng tài khoản của bạn.
                                                <br><br>
                                                Trường hợp bạn mất Mật khẩu hoặc hoặc sử dụng không đúng mục đích trang
                                                web Samacom.com.vn :
                                                <br><br>
                                                Bạn phải chịu tất cả sự mất mát hoặc thiệt hại phát sinh; và
                                                <br><br>
                                                Bạn chịu trách nhiệm sẽ bồi thường hoàn toàn cho Samacom trong trường
                                                hợp Samacom có xảy ra mất mát hoặc thiệt hại.
                                            </div>
                                        </div>

                                        <div id="div20"
                                             class="m-b-18 title-backgroud" data-toggle="collapse"
                                             data-target="#quyentruycap">
                                            <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                <span
                                                    class="color-after-icon">QUYỀN TRUY CẬP VÀ THU THẬP THÔNG TIN</span>
                                            </div>
                                        </div>
                                        <div id="quyentruycap"
                                             style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                             class="collapse">
                                            <div style="padding: 20px 20px;">
                                                1.Khi sử dụng trang web Samacom.com.vn , bạn thừa nhận rằng chúng tôi có
                                                quyền thu thập các thông tin sau của bạn:
                                                <br><br>
                                                2.Thông tin cá nhân: bao gồm các thông tin bạn cung cấp cho chúng tôi để
                                                tạo hồ sơ như tên, số điện thoại, địa chỉ email;…
                                                <br><br>
                                                3.Thông tin chung: như các thông tin về kinh nghiệm làm việc, định hướng
                                                nghề nghiệp, mục tiêu công việc; trình độ năng lực; thu nhập;…
                                                <br><br>
                                                4.Bạn thừa nhận và đồng ý một mình chịu trách nhiệm về hình thức, nội
                                                dung và tính xác thực của bất kỳ hồ sơ hoăc tài liệu nào do bạn đăng tải
                                                trên trang web Samacom.com.vn , đồng thời đồng ý một mình chịu trách
                                                nhiệm cho bất kỳ hệ quả nào phát sinh từ việc đăng tải này.
                                                <br><br>
                                                5.Samacom có quyền đề xuất đến bạn dịch vụ và sản phẩm của bên thứ ba
                                                dựa trên các mục phù hợp mà bạn xác định trong khi đăng ký và bất kỳ lúc
                                                nào sau đó hoặc khi bạn đã đồng ý tiếp nhận, các đề xuất này sẽ được
                                                thực hiện bởi Samacom hoặc các bên thứ ba.
                                                <br><br>
                                                6.Samacom được quyền tùy ý tuân theo các yêu cầu pháp lý, các yêu cầu từ
                                                cơ quan thi hành án hoặc yêu cầu của cơ quan quản lý, thậm chí sự tuân
                                                thủ này có thể bao gồm việc công bố một số thông tin Người dùng nhất
                                                định. Ngoài ra, bên thứ ba được phép giữ lại các bản sao lưu trữ thông
                                                tin Người dùng.
                                                <br><br>
                                                7.Bạn hiểu và thừa nhận rằng tất cả các thông tin do bạn cung cấp, Thông
                                                tin cá nhân, hồ sơ và/hoặc thông tin tài khoản của bạn, sẽ được công bố
                                                cho các Nhà tuyển dụng tiềm năng trên Samacom.
                                                <br><br>
                                                8.Samacom tôn trọng tuyệt đối quyền bảo mật thông tin của ứng viên. Nếu
                                                không muốn hồ sơ cá nhân của mình được công khai, bạn vui lòng tắt tính
                                                năng tìm việc & tính năng cho phép nhà tuyển dụng xem hồ sơ để tránh bị
                                                làm phiền.
                                                <br><br>
                                                9.Bạn hiểu và thừa nhận rằng bạn không có các quyền sở hữu trong tài
                                                khoản của bạn và nếu bạn hủy bỏ tài khoản trên trang web Samacom.com.vn
                                                hoặc tài khoản của bạn bị chấm dứt, tất cả các thông tin tài khoản của
                                                bạn tại trang web Samacom.com.vn , bao gồm sơ yếu lý lịch, Thông tin cá
                                                nhân, thư xin việc, các công việc đã lưu, sẽ được đánh dấu là bị xóa và
                                                có thể bị xóa khỏi Cơ sở dữ liệu Samacom và sẽ được gỡ bỏ từ bất kỳ khu
                                                vực chung nào trên trang web Samacom.com.vn . Thông tin có thể tiếp tục
                                                được hiển thị trong một khoảng thời gian vì các trở ngại trong khi
                                                truyền tín hiệu xóa thông qua các máy chủ của Samacom.com.vn hoặc do yêu
                                                cầu của các cơ quan chức năng liên quan. Ngoài ra, các bên thứ ba được
                                                phép giữ lại bản sao thông tin của bạn.
                                                <br><br>
                                                10.Samacom có quyền xỏa tài khoản và tất cả thông tin của bạn sau một
                                                thời gian dài không hoạt động.
                                            </div>
                                        </div>

                                        <div id="div15"
                                             class="m-b-18 title-backgroud" data-toggle="collapse"
                                             data-target="#tuyenbo">
                                            <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                <span class="color-after-icon">TUYÊN BỐ VỀ QUYỀN SỞ HỮU TRÍ TUỆ</span>
                                            </div>
                                        </div>
                                        <div id="tuyenbo"
                                             style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                             class="collapse">
                                            <div style="padding: 20px 20px;">
                                                1.Bạn tuyên bố và đảm bảo rằng: (i) bạn sở hữu Nội dung mà bạn đăng lên
                                                hoặc thông qua Dịch vụ hay nói cách khác, bạn có quyền cấp các quyền và
                                                giấy phép được quy định trong các Điều khoản sử dụng này; (ii) việc đăng
                                                và sử dụng Nội dung trên hoặc thông qua Dịch vụ không vi phạm, chiếm
                                                đoạt hay xâm phạm các quyền của bất kỳ bên thứ ba nào, bao gồm nhưng
                                                không giới hạn ở quyền riêng tư, quyền công khai, bản quyền, nhãn hiệu
                                                thương mại và/hoặc quyền sở hữu trí tuệ khác; (iii) bạn đồng ý thanh
                                                toán tất cả tiền bản quyền tác giả, phí và bất kỳ khoản tiền nào khác
                                                còn nợ do Nội dung mà bạn đăng lên hoặc thông qua Dịch vụ; và (iv) bạn
                                                có quyền và năng lực pháp lý để tham gia vào các Điều khoản sử dụng này
                                                trong quyền hạn của bạn.
                                                <br><br>
                                                2.Dịch vụ chứa nội dung mà Samacom sở hữu hoặc cấp phép ("Nội dung
                                                Samacom"). Nội dung Samacom được bảo vệ bởi bản quyền, nhãn hiệu thương
                                                mại, bằng sáng chế, bí mật thương mại và các luật khác, đồng thời giữa
                                                bạn và Samacom, Samacom sở hữu và nắm giữ tất cả các quyền về Dịch vụ và
                                                Nội dung Samacom. Bạn không được xóa, thay đổi hoặc che giấu bất kỳ
                                                thông báo nào về bản quyền, nhãn hiệu thương mại, nhãn hiệu dịch vụ hay
                                                quyền sở hữu khác được kết hợp với hay đi kèm Nội dung Samacom và bạn
                                                không được sao chép, sửa đổi, điều chỉnh, chuẩn bị các sản phẩm phái
                                                sinh dựa trên, thực hiện, hiển thị, xuất bản, phân phối, truyền đi,
                                                phát, bán, cấp phép hoặc khai thác Nội dung Samacom.
                                                <br><br>
                                                3.Logo và tên Samacom là các nhãn hiệu thương mại của Samacom và không
                                                được sao chép, giả mạo hay sử dụng toàn bộ hoặc một phần khi chưa có sự
                                                cho phép trước bằng văn bản của Samacom. Ngoài ra, tất cả các tiêu đề
                                                trang, đồ họa tùy chỉnh, biểu tượng nút và tập lệnh đều là nhãn hiệu
                                                dịch vụ, nhãn hiệu thương mại và/hoặc bao bì thương mại của Samacom và
                                                không được sao chép, giả mạo hay sử dụng toàn bộ hoặc một phần khi chưa
                                                có sự cho phép trước bằng văn bản của Samacom.
                                                <br><br>
                                                4.Mặc dù mục đích của Samacom là cung cấp Dịch vụ nhiều nhất có thể
                                                nhưng sẽ có trường hợp Dịch vụ có thể bị gián đoạn, bao gồm nhưng không
                                                giới hạn ở việc gián đoạn để bảo trì hoặc nâng cấp theo lịch trình, để
                                                sửa chữa khẩn cấp hay do lỗi của thiết bị và/hoặc liên kết viễn thông.
                                                Ngoài ra, Samacom có quyền xóa bất kỳ Nội dung nào khỏi Dịch vụ vì bất
                                                kỳ lý do gì mà theo nhận định của mình, là vi phạm Điều Khoản này, vi
                                                phạm pháp luật, quy tắc hoặc quy định, có tính chất lăng mạ, gây rối,
                                                xúc phạm hoặc bất hợp pháp, hoặc vi phạm các quyền, hoặc nguy hại hoặc
                                                đe dọa sự an toàn của Người dùng của bất kỳ trang web nào thuộc
                                                Samacom.com.vn. Samacom có quyền trục xuất người dùng và ngăn chặn quyền
                                                truy cập sau đó của họ tới trang web Samacom.com.vn và/hoặc sử dụng các
                                                dịch vụ Samacom khi vi phạm Điều Khoản này hoặc vi phạm pháp luật, quy
                                                tắc hoặc quy định. Samacom được phép thực hiện bất kỳ hành động nào liên
                                                quan đến Nội dung Người dùng khi tự xét thấy cần thiết hoặc thích hợp
                                                nếu Samacom tin rằng Nội dung Người dùng có thể tạo ra trách nhiệm pháp
                                                lý cho Samacom, gây thiệt hại đến thương hiệu Samacom hoặc hình ảnh công
                                                cộng, hoặc dẫn đến việc Samacom để mất người dùng. Nội dung bị xóa khỏi
                                                Dịch vụ có thể tiếp tục được Samacom lưu trữ, bao gồm nhưng không giới
                                                hạn ở việc lưu trữ để tuân thủ một số nghĩa vụ pháp lý nhất định nhưng
                                                có thể không truy xuất được nếu không có lệnh hợp lệ của tòa án. Samacom
                                                sẽ không chịu trách nhiệm pháp lý với bạn về bất kỳ sửa đổi, tạm ngừng
                                                hay gián đoạn Dịch vụ nào hoặc việc mất mát bất kỳ Nội dung nào. Bạn
                                                cũng xác nhận rằng Internet có thể không an toàn và rằng việc gửi Nội
                                                dung hoặc thông tin khác có thể không an toàn.
                                                <br><br>
                                                5.Samacom sẽ không chịu trách nhiệm với bất cứ thông tin đăng tải của
                                                bên thứ ba nào, cho dù với lý do nào, do bất cứ tổ chức nào đăng tải nội
                                                dung trên Samacom. Tuy nhiên, Samacom sẽ cố gắng sử dụng mọi biện pháp
                                                kiểm soát và hạn chế tối đa các trường hợp tin tuyển dụng lừa đảo, thông
                                                tin không đúng….để bảo vệ Người Dùng.
                                                <br><br>
                                                6.Samacom không đại diện hoặc đảm bảo tính trung thực, chính xác, hoặc
                                                độ tin cậy của Nội dung Người dùng, các sản phẩm phái sinh từ Nội dung
                                                Người dùng, hoặc bất kỳ thông tin liên lạc khác được đăng bởi Người dùng
                                                cũng như không xác nhận bất kỳ ý kiến nào được thể hiện bởi Người dùng.
                                                Bạn thừa nhận rằng việc tin tưởng nào vào tài liệu được đăng bởi Người
                                                dùng khác là rủi ro của riêng bạn.
                                            </div>
                                        </div>

                                        <div id="div16"
                                             class="m-b-18 title-backgroud" data-toggle="collapse"
                                             data-target="#tuyenbomientru">
                                            <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                <span class="color-after-icon">TUYÊN BỐ MIỄN TRỪ TRÁCH NHIỆM</span>
                                            </div>
                                        </div>
                                        <div id="tuyenbomientru"
                                             style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                             class="collapse">
                                            <div style="padding: 20px 20px;">
                                                1.Samacom không tuyên bố hay đảm bảo rằng dịch vụ sẽ không bị lỗi hay
                                                không bị gián đoạn; rằng các lỗi sẽ được khắc phục; hoặc rằng dịch vụ
                                                hoặc máy chủ cung cấp dịch vụ không bị nhiễm bất kỳ thành phần có hại
                                                nào, bao gồm nhưng không giới hạn ở vi-rút. Samacom không đưa ra bất kỳ
                                                tuyên bố hay đảm bảo nào rằng thông tin (bao gồm mọi hướng dẫn) về dịch
                                                vụ chính xác, đầy đủ hoặc hữu ích. Bạn xác nhận rằng bạn tự chịu rủi ro
                                                khi sử dụng dịch vụ. Samacom không đảm bảo rằng việc bạn sử dụng dịch vụ
                                                là hợp pháp trong bất kỳ khu vực pháp lý cụ thể nào và Samacom từ chối
                                                đưa ra các bảo đảm đó một cách cụ thể. Một số khu vực pháp lý giới hạn
                                                hoặc không cho phép tuyên bố miễn trừ trách nhiệm về bảo đảm ngụ ý hay
                                                các bảo đảm khác, vì vậy tuyên bố miễn trừ trách nhiệm trên có thể không
                                                áp dụng cho bạn trong phạm vi luật pháp của khu vực pháp lý đó áp dụng
                                                cho bạn và các điều khoản sử dụng này.
                                                <br><br>
                                                2.Bằng cách truy cập hay sử dụng dịch vụ, bạn tuyên bố và bảo đảm rằng
                                                hoạt động của mình là hợp pháp trong mọi khu vực pháp lý nơi bạn truy
                                                cập hay sử dụng dịch vụ.
                                                <br><br>
                                                3.Samacom không xác nhận nội dung và từ chối cụ thể bất kỳ trách nhiệm
                                                hay trách nhiệm pháp lý nào đối với bất kỳ cá nhân hay tổ chức nào về
                                                mọi mất mát, thiệt hại (cho dù thực sự, do hậu quả, do trừng phạt hoặc
                                                bất kỳ điều gì khác), thương tích, khiếu nại, trách nhiệm pháp lý hay
                                                nguyên nhân khác dưới mọi hình thức hoặc đặc điểm dựa trên hoặc do bất
                                                kỳ nội dung nào.
                                            </div>

                                            <div id="div17"
                                                 class="m-b-18 title-backgroud" data-toggle="collapse"
                                                 data-target="#gioihan">
                                                <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                    <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                    <span class="color-after-icon">GIỚI HẠN TRÁCH NHIỆM PHÁP LÝ</span>
                                                </div>
                                            </div>
                                            <div id="gioihan"
                                                 style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                                 class="collapse">
                                                <div style="padding: 20px 20px;">
                                                    Trong mọi tình huống, Samacom sẽ không chịu trách nhiệm pháp lý với
                                                    bạn về bất kỳ mất mát hay thiệt hại nào dưới mọi hình thức (bao gồm
                                                    nhưng không giới hạn ở bất kỳ mất mát hay thiệt hại trực tiếp, gián
                                                    tiếp, kinh tế, cảnh báo, đặc biệt, do trừng phạt, ngẫu nhiên hoặc do
                                                    hậu quả nào) có liên quan trực tiếp hoặc gián tiếp đến: (a) dịch vụ;
                                                    (b) nội dung Samacom; (c) nội dung người dùng; (d) việc bạn sử dụng,
                                                    không thể sử dụng hoặc hiệu quả của dịch vụ; (e) mọi hành động được
                                                    thực hiện có liên quan đến việc điều tra của Samacom hoặc cơ quan
                                                    thực thi pháp luật về việc sử dụng dịch vụ của bạn hoặc bất kỳ bên
                                                    nào khác; (f) bất kỳ hành động nào được thực hiện có liên quan đến
                                                    chủ sở hữu bản quyền hoặc quyền sở hữu trí tuệ khác; (g) mọi lỗi
                                                    hoặc thiếu sót trong hoạt động của dịch vụ; hoặc (h) mọi thiệt hại
                                                    đối với mọi máy tính, thiết bị di động, thiết bị hoặc công nghệ khác
                                                    của người dùng, bao gồm nhưng không giới hạn ở thiệt hại do bất kỳ
                                                    hành vi vi phạm bảo mật nào hoặc do bất kỳ vi-rút, lỗi, giả mạo,
                                                    gian lận, lỗi, thiếu sót, gián đoạn, khiếm khuyết, trì hoãn quá
                                                    trình hoạt động hoặc truyền đi, lỗi mạng hay dòng máy tính, mọi sự
                                                    cố kỹ thuật khác hoặc trục trặc khác, bao gồm nhưng không giới hạn ở
                                                    thiệt hại do mất lợi nhuận, mất tín nhiệm, mất dữ liệu, ngừng việc,
                                                    độ chính xác của kết quả hoặc lỗi hay trục trặc máy tính, ngay cả
                                                    khi có thể dự đoán được hoặc Samacom đã được thông báo hay lẽ ra
                                                    phải biết về khả năng xảy ra các thiệt hại đó, cho dù theo hợp đồng,
                                                    do sơ ý, trách nhiệm pháp lý nghiêm ngặt hoặc sai lầm cá nhân (bao
                                                    gồm, nhưng không giới hạn ở nguyên nhân một phần hoặc toàn bộ do sơ
                                                    ý, thiên tai, lỗi viễn thông, lấy cắp hay hủy hoại dịch vụ). Trong
                                                    mọi trường hợp, Samacom không chịu trách nhiệm pháp lý với bạn hoặc
                                                    bất kỳ ai khác về mất mát, thiệt hại hoặc thương tích, bao gồm nhưng
                                                    không giới hạn ở thương tích cá nhân hoặc tử vong.
                                                </div>
                                            </div>

                                            <div id="div18"
                                                 class="m-b-18 title-backgroud" data-toggle="collapse"
                                                 data-target="#giaiquyet">
                                                <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                    <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                    <span class="color-after-icon">GIẢI QUYẾT TRANH CHẤP</span>
                                                </div>
                                            </div>
                                            <div id="giaiquyet"
                                                 style="border: 1px solid #D3DBE5;border-radius: 0px 0px 4px 4px;"
                                                 class="collapse">
                                                <div style="padding: 20px 20px;">
                                                    Bất kỳ tranh chấp phát sinh trong quá trình sử dụng dịch vụ của
                                                    Samacom sẽ được giải quyết theo pháp luật hiện hành của nước Cộng
                                                    hòa xã hội chủ nghĩa Việt Nam.
                                                    <br><br>
                                                    Bất kỳ khiếu nại nào phát sinh trong quá sử dụng sản phẩm phải được
                                                    gửi đến Samacom ngay sau khi xảy ra sự kiện phát sinh khiếu nại:
                                                    <br><br>
                                                    Địa chỉ liên lạc: Tầng 6, tòa nhà B&B, số 60 ngõ 850 đường Láng,
                                                    quận Đống Đa, Hà Nội
                                                    <br><br>
                                                    Điện thoại: (024).6266.3232
                                                    <br><br>
                                                    Email: hotro@samacom.com.vn
                                                    <br><br>
                                                    Samacom sẽ căn cứ từng trường hợp cụ thể để có phương án giải quyết
                                                    cho phù hợp. Khi thực hiện quyền khiếu nại, người khiếu nại có nghĩa
                                                    vụ cung cấp các giấy tờ, bằng chứng, căn cứ có liên quan đến việc
                                                    khiếu nại và phải chịu trách nhiệm về nội dung khiếu nại, giấy tờ,
                                                    bằng chứng, căn cứ do mình cung cấp theo quy định pháp luật.
                                                    <br><br>
                                                    Samacom chỉ hỗ trợ, giải quyết khiếu nại, tố cáo của Người Dùng
                                                    trong trường hợp bạn đã ghi đầy đủ, trung thực và chính xác thông
                                                    tin khi đăng ký tài khoản.
                                                    <br><br>
                                                    Đối với tranh chấp giữa Người Dùng với nhau, hoặc tranh chấp với Bên
                                                    Thứ Ba, có thể Samacom sẽ gửi thông tin liên hệ cho các đối tượng
                                                    tranh chấp để các bên tự giải quyết hoặc Samacom sẽ căn cứ vào tình
                                                    hình thực tế để giải quyết. Theo đó, Samacom sẽ bảo vệ quyền lợi tối
                                                    đa có thể cho Người Dùng hợp pháp và chính đáng.
                                                    <br><br>
                                                    Người Dùng đồng ý bảo vệ, bồi hoàn và loại trừ Samacom khỏi những
                                                    nghĩa vụ pháp lý, tố tụng, tổn thất, chi phí bao gồm nhưng không
                                                    giới hạn án phí, chi phí luật sư, chuyên gia tư vấn có liên quan đến
                                                    việc giải quyết hoặc phát sinh từ sự vi phạm của Người Dùng trong
                                                    quá trình sử dụng sản phẩm.
                                                    <br><br>
                                                    Nếu tranh chấp không được giải quyết trong vòng sáu mươi (60) ngày
                                                    kể từ ngày một Bên thông báo cho Bên còn lại bằng văn bản về việc
                                                    phát sinh tranh chấp thì một trong các Bên có quyền đưa vụ việc ra
                                                    giải quyết tại tòa án có thẩm quyền tại TP Hà Nội theo quy định của
                                                    pháp luật, Bên thua kiện sẽ phải chịu toàn bộ các chi phí tố tụng
                                                    tại tòa án.
                                                </div>
                                            </div>

                                            <div id="div19"
                                                 class="m-b-18 title-backgroud" data-toggle="collapse"
                                                 data-target="#hieuluc">
                                                <div onclick="switchCollapseDeal(event)" style="padding: 22px 44px; ">
                                                    <i style="color: #07BA90;" class="icon icon-add-2"></i>&nbsp;&nbsp;
                                                    <span
                                                        class="color-after-icon">HIỆU LỰC THỎA THUẬN CỦA HỢP ĐỒNG</span>
                                                </div>
                                            </div>
                                            <div id="hieuluc"
                                                 class="collapse">
                                                <div style="padding: 20px 20px;">
                                                    1.Các điều khoản quy định tại Quy định sử dụng này có thể được cập
                                                    nhật, chỉnh sửa bất cứ lúc nào mà không cần phải thông báo trước tới
                                                    người sử dụng. Samacom sẽ công bố rõ trên Website, về những thay
                                                    đổi, bổ sung đó.
                                                    <br><br>
                                                    2.Trong trường hợp một hoặc một số điều khoản Quy định sử dụng này
                                                    xung đột với các quy định của luật pháp và bị Tòa án tuyên là vô
                                                    hiệu, điều khoản đó sẽ được chỉnh sửa cho phù hợp với quy định pháp
                                                    luật hiện hành, và phần còn lại của Quy định sử dụng vẫn giữ nguyên
                                                    giá trị.
                                                    <br><br>

                                                    3.Thỏa thuận này có giá trị như Hợp Đồng. Người Dùng hiểu rằng, đây
                                                    là hợp đồng điện tử, Giá trị pháp lý của hợp đồng điện tử không thể
                                                    bị phủ nhận chỉ vì hợp đồng đó được thể hiện dưới dạng thông điệp dữ
                                                    liệu theo Pháp Luật về Giao Dịch Điện Tử. Bằng cách nhấn vào nút
                                                    “Tôi đồng ý”, Người Dùng hoàn toàn đồng ý và đã hiểu các điều khoản
                                                    trong Hợp Đồng này và Hợp Đồng có hiệu lực kể từ thời điểm này. Nếu
                                                    vi phạm các Điều khoản này, bạn đồng ý chịu hoàn toàn trách nhiệm và
                                                    bồi thường thiệt hại (Nếu có) với Samacom.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--                                    <div id="menu3" class="tab-pane fade">--}}
                                    {{--                                        <h3>Menu 3</h3>--}}
                                    {{--                                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

            <script>

                $("#div1").click(function () {
                    console.log(11)
                    $(this).toggleClass('backgroud-90');
                    $("#div1 .icon").toggleClass('color-white')
                    $("#div1 .color-after-icon").toggleClass('color-white')
                });
                $("#div2").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div2 .icon").toggleClass('color-white')
                    $("#div2 .color-after-icon").toggleClass('color-white')
                });
                $("#div3").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div3 .icon").toggleClass('color-white')
                    $("#div3 .color-after-icon").toggleClass('color-white')
                });
                $("#div4").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div4 .icon").toggleClass('color-white')
                    $("#div4 .color-after-icon").toggleClass('color-white')
                });
                $("#div5").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div5 .icon").toggleClass('color-white')
                    $("#div5 .color-after-icon").toggleClass('color-white')
                });
                $("#div6").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div6 .icon").toggleClass('color-white')
                    $("#div6 .color-after-icon").toggleClass('color-white')
                });
                $("#div7").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div7 .icon").toggleClass('color-white')
                    $("#div7 .color-after-icon").toggleClass('color-white')
                });
                $("#div8").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div8 .icon").toggleClass('color-white')
                    $("#div8 .color-after-icon").toggleClass('color-white')
                });
                $("#div9").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div9 .icon").toggleClass('color-white')
                    $("#div9 .color-after-icon").toggleClass('color-white')
                });
                $("#div10").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div10 .icon").toggleClass('color-white')
                    $("#div10 .color-after-icon").toggleClass('color-white')
                });
                $("#div11").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div11 .icon").toggleClass('color-white')
                    $("#div11 .color-after-icon").toggleClass('color-white')
                });
                $("#div12").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div12 .icon").toggleClass('color-white')
                    $("#div12 .color-after-icon").toggleClass('color-white')
                });
                $("#div13").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div13 .icon").toggleClass('color-white')
                    $("#div13 .color-after-icon").toggleClass('color-white')
                });
                $("#div14").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div14 .icon").toggleClass('color-white')
                    $("#div14 .color-after-icon").toggleClass('color-white')
                });
                $("#div15").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div15 .icon").toggleClass('color-white')
                    $("#div15 .color-after-icon").toggleClass('color-white')
                });
                $("#div16").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div16 .icon").toggleClass('color-white')
                    $("#div16 .color-after-icon").toggleClass('color-white')
                });
                $("#div17").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div17 .icon").toggleClass('color-white')
                    $("#div17 .color-after-icon").toggleClass('color-white')
                });
                $("#div18").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div18 .icon").toggleClass('color-white')
                    $("#div18 .color-after-icon").toggleClass('color-white')
                });
                $("#div19").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div19 .icon").toggleClass('color-white')
                    $("#div19 .color-after-icon").toggleClass('color-white')
                });
                $("#div20").click(function () {
                    $(this).toggleClass('backgroud-90');
                    $("#div20 .icon").toggleClass('color-white')
                    $("#div20 .color-after-icon").toggleClass('color-white')
                });
                function switchCollapseDeal(event) {
                    let current = event.currentTarget;
                    let arrow = current.querySelector(".icon");
                    if ($(arrow).hasClass("icon-add-2")) {
                        $(arrow).removeClass("icon-add-2");
                        $(arrow).addClass("icon-minus-2");
                        // $(div).removeProperty("")
                    } else {
                        $(arrow).removeClass("icon-minus-2");
                        $(arrow).addClass("icon-add-2");

                    }
                }
            </script>
            @endsection
            @section('CSS')
                <style>
                    .product-imitation {
                        background-image: url("https://images.pexels.com/photos/1586525/pexels-photo-1586525.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260");
                        background-size: cover;
                        color: darkslategray;
                        font-weight: 900;
                        line-height: 42px;
                        /*background-blend-mode: color-burn ;*/
                    }

                </style>

@endsection

