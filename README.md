# お問い合わせフォーム

## 環境構築
Docker ビルド
1. リポジトリをクローン  git clone <リポジトリURL>
2.docker-compose up -d --build

Laravel環境構築
1.docker-compose exec php bash
2.composer install
3..env.example(ファイル作成、環境に合わせて設定を変更)
4.php artisan key:generate
5.php artisan migrate
6.php artisan db:seed
## 使用技術
・PHP 8.0
・Laravel 10.x
・MySQL 8.0
## ER図
![ER図](./A_README_file_for_an_application_titled_お問い合わせフォー.png)
## URL
・開発環境:http://localhost/
・phpMyAdmin:http://localhost:8080/
