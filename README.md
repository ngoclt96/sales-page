Sales-page laf một trang web bán hàng.
Database gồm có 6 bảng : admin, category, product, user, transaction, order
---
1 : Chi tiết 1 số bảng :
---
     **category :
          id : khóa chính và trường dữ liệu này mình để tự tăng
          name: tên danh mục
          parent_id: id của danh mục cha,vì danh mục sẽ được phân theo nhiều cấp.
    **product :
          id : khóa chính và trường dữ liệu này mình để tự tăng
          catalog_id: id của danh mục sản phẩm,vì 1 sản phẩm phải thuộc 1 danh mục nào đó
          name: tên sản phẩm
          price: giá của sản phẩm
          discount: lưu chiết khấu, giảm giá
          price: giá của sản phẩm
          image_link: lưu link file ảnh minh họa cho sản phẩm
          image_list: lưu danh sách link file ảnh kèm theo cho sản phẩm
          created: thời điểm tạo sản phẩm
          view: lượt xem sản phẩm này.
    **transaction :
          id : khóa chính và trường dữ liệu này mình để tự tăng
          status: lưu trạng thái của giao dịch,dựa vào trạng thái này để biết giao dịch đã thanh toán thành công chưa,ví dụ 1 là thành công,0 là chưa thanh toán
          user_id: id của thành viên mua hàng,nếu khách không có tài khoản thì trương này không cần lưu
          user_name: tên của khách hàng
          user_email: email của khách hàng
          user_phone: số điện thoại của khách hàng
          amount: tổng số tiền cần thanh toán,và đây chính là tổng số tiền chúng ta gửi sang bên cổng thanh toán
          payment: tên cổng thanh toán mà khách hàng chọn để thanh toán
          payment_info: toàn bộ thông trả về từ bên cổng thanh toán gủi cho chúng ta
          message: nội dung yêu cầu của khách hàng
          security: mã bảo mật cho giao dịch,1 số cổng thanh toán ta cần gửi mã bảo mật
          created: thời điểm tạo giao dịch,dựa vào trường này mà chúng ta hoàn toàn có thể làm thống kê cáo cáo doanh thu theo thời gian
    **order :
          id : khóa chính và trường dữ liệu này mình để tự tăng
          transaction_id: id của giao dịch,1 giao dịch có thể có nhiều đơn hàng và 1 đơn hàng phải thuộc 1 giao dịch nào đó.
          product_id: id của sản phẩm
          qty: số lượng sản phẩm trong đơn hàng,như ví dụ trên thì với tivi thì qty = 1,và điện thoại thì qty = 2
          amount: số tiền của đơn hàng,các bạn lưu ý là số tiền(amount) trong bảng giao dịch sẽ bằng tổng số tiền trong bảng đơn hàng tương ứng nhé
          data: lưu dữ liệu nào đó mà bạn muốn
          status: đây chính là trạng thái của đơn hàng,và trạng thái này cho chúng ta biết sản phẩm của đơn hàng này đã được gửi cho khách chưa,ví dụ status = 1 là đã gửi,status = 0 là chưa gửi hàng cho khách
  ---
  2 : Mô hình code(ở đây xây dựng các lớp theo hướng đối tượng)
  ---
    ***chú ý : Khi code thì tên foder ở resource, Controller đều phải giống nhau thì mới chạy dc nhé, nếu không nó sẽ báo lỗi.
      **Model :
          +) class BaseModel sẽ giống như lớp cha, và các model khác sẽ dc extends từ lớp này.
      **Controller :
          +) class BaseController sẽ giống như lớp cha, các controoler khác sẽ extends từ lớp này.
      *** Các quyền xử lý, truy cập(vd : tạo form, delete..)
          +) Phải khai báo ở file acl.php
      *** resource :
          +) Các foder tạo cho các bảng dc tạo ở views/pc.
          +) Giao diện backend dc tạo ở file views/pc/layouts/default.blade.php
      *** Tich hợp ckfinder và ckeditor đã dc lưu ở public/js/plugin :
          +) Khi tạo nội dung(vd : như giới thiệu sơ lược sản phẩm, đăng ảnh sp) thì cần dùng đến cái này.
      
