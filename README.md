B1: Cài đăt môi truờng PHP
Tải XAMPP từ trang chủ Apache Friends. cai bản PHP > 8.1
Cài đặt XAMPP, chọn PHP và MySQL trong quá trình cài đặt -> nhớ chon path lưu xampp
Sau khi cài đặt, mở XAMPP Control Panel và khởi động Apache và MySQL.

B2: Cài đặt Composer:
Tải Composer từ composer.org.
Chạy file cài đặt, trỏ đường dẫn PHP trong quá trình cài đặt.
Kiểm tra cài đặt: mở Terminal (Command Prompt) và gõ: composer -v


B3: Cài đặt Node.js:
Tải Node.js từ nodejs.org và cài đăt nó

B4:
Copy dự án vào  thư muc C:\xampp\htdocs\ và giải nén project

B5 Import database
mở trình duyệt gõ: http://localhost/phpmyadmin
tạo 1 tên database như trong file .env tại mục : database_name
import file sql vào database

B6:
tại thư mục project chạy cmd: composer install

B7:
chạy cmd: php artisan serve
trỏ link vào


* thông tin tk:
url admin: localhost:8000/admin
admin@gmail.com/Admin@123
url website: localhost:8000

* thông tin thanh toán: 
- Quản lý giao dịch:
+ https://sandbox.vnpayment.vn/merchantv2/
+ n.hieuthanhps@gmail.com/Admin@123

- Thẻ test thanh toán:
+ Ngân hàng	NCB
+ Số thẻ	9704198526191432198
+ Tên chủ thẻ	NGUYEN VAN A
+ Ngày phát hành	07/15
+ Mật khẩu OTP	123456

