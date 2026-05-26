=== VUA Bao Bì Công Nghiệp — WordPress Theme ===

CÀI ĐẶT
1. Nén thư mục này thành vua-baobi.zip (đã có sẵn file zip kèm theo).
2. WordPress: Giao diện (Appearance) → Themes → Add New → Upload Theme → chọn vua-baobi.zip → Install → Activate.
3. Cài đặt → Đọc (Settings → Reading): chọn "Trang chủ hiển thị: Một trang tĩnh" hoặc để mặc định.
   Theme dùng front-page.php nên trang chủ tự động là landing page (không cần cấu hình thêm).

CHỈNH SỬA NỘI DUNG
- Thông tin liên hệ + tiêu đề Hero: Giao diện → Tùy biến (Customize) → "VUA — Thông tin & Hero".
- Logo: Tùy biến → Nhận diện trang (Site Identity) → Logo (nếu không đặt, dùng logo mặc định trong theme).
- Menu header: Giao diện → Menu → tạo menu, gán vị trí "Menu chính (Header)".
- Tin tức: thêm Bài viết (Posts) như bình thường; section "Kiến thức ngành bao bì" tự lấy 3 bài mới nhất (có ảnh đại diện).

FORM BÁO GIÁ
- Khi khách gửi form: lưu vào menu "Báo giá (Leads)" trong wp-admin + gửi email tới admin_email (Cài đặt → Tổng quan).
- Để nhận mail ổn định, nên cài plugin SMTP (vd: WP Mail SMTP) vì hosting mặc định hay chặn wp_mail().

ẢNH SẢN PHẨM
- Ảnh nằm trong assets/img/ (products/p0..p7.jpg, factory.jpg, quotebg.jpg, hero.webp, logo.png).
- Muốn đổi: thay file cùng tên, hoặc nâng cấp thành Custom Post Type sản phẩm (liên hệ dev).

YÊU CẦU
- WordPress 5.5+, PHP 7.4+.
