# フリーマーケット
## 環境構築
### Dockerビルド
1.gh repo clone su-masayuki/freemarket

2.docker-compose up -d --build

*MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて docker-compose.yml ファイルを編集してください。

### Laravel環境構築
1.docker-compose exec php bash

2.composer install

3.env.exampleファイルから.envを作成し、環境変数を変更

4.php artisan key:generate

5.php artisan migrate

6.php artisan db:seed

## 使用技術
・PHP 8.3.6

・Laravel 8.75

・MySQL 8.0.26

## URL
・環境開発:http://localhost/

・phpMyAdmin:http://localhost:8080/
