# Lưu ý
## Chạy lần lượt các file sau để tạo TABLES trong DATABASE
1. createDatabase.php
2. DBconnection.php (kiểm tra kết nối được không)
3. createTable.php
4. insertTable.php (không chạy cũng được, thêm vào để kiểm tra có khớp kiểu dữ liệu không)

## Đối với các dữ liệu dạng multiple data (như phone_number, experience, ...) thì đặt tên dạng array
Ví dụ:  
name="phone_number[]"  
Tham khảo thêm ở video này: https://www.youtube.com/watch?v=vvWetw5PvMw&t=881s&ab_channel=FundaOfWebIT

## Init file cv_edit
Trường hợp người dùng chỉnh sửa dữ liệu có sẵn thì để action = "cv_edit.php" và method = "post".  
Dữ liệu gửi về phải có user_id để có thể sử dụng "$_POST['user_id'] để truy cập database

## Init file cv_create
Chi can de action va method nhu edit
