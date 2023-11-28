# Chạy lần lượt các file sau để tạo TABLES trong DATABASE
1. createDatabase.php
2. DBconnection.php (kiểm tra kết nối được không)
3. createTable.php
4. insertTable.php (không chạy cũng được, thêm vào để kiểm tra có khớp kiểu dữ liệu không)

# Đối với các dữ liệu dạng multiple data (như phone_number, experience, ...) thì đặt tên dạng array
Ví dụ:
<form action="your_script.php" method="post">
  Phone number 1: <input type="text" name="phone_number[]"><br>
  Phone number 2: <input type="text" name="phone_number[]"><br>
  Phone number 3: <input type="text" name="phone_number[]"><br>
  <input type="submit">
</form>
Tham khảo thêm ở video này: https://www.youtube.com/watch?v=vvWetw5PvMw&t=881s&ab_channel=FundaOfWebIT
