1. Sau khi cài đặt git, mở command line để config cho git biết mình là ai

git config --global user.email "you@example.com"
git config --global user.name "Your Name"

Có thể thay tham số --global bằng --local, để khỏi config lại khi
làm việc ở project khác thì để --global luôn cho tiện.

2. Clone repository

Bước này là để tải thư mục source code về từ repository.
Bước này chỉ làm lần đầu, lần sau sẽ dùng lệnh ở mục 3.

Vào thư mục server, ví dụ đường dẫn tới thư mục server là C:\apache
thì từ thư mục đó, nhập lệnh

git clone https://github.com/laiminhlamgt/WP-assignment.git
VD: C:\apache>git clone https://github.com/laiminhlamgt/WP-assignment.git

Sau khi nhập xong, thư mục WP-assignment sẽ xuất hiện trong thư mục apache.

3. Pull

Bước này rất quan trọng, có chức năng cập nhật bản mới nhất của source code.
Cho nên hãy thực hiện nó trước khi code.
Lệnh:

git pull

4. Commit

Bước này để update source mình vừa viết lên reposiroty.

Lệnh:
git add README.txt
git commit -m "This is a message"
git push -u origin master

VD: để update toàn bộ thư mục views
git add * (nếu đang ở trong thư mục views)
hoặc git add views/* (nếu đang ở trong thư mục cha)
git commit -m "This is a message"
git push -u origin master
