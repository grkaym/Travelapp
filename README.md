<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->
・リポジトリ（Webアプリ）の名前：Name
・概要：Overview
・デモ：Demo
・使い方：Usage
・環境：Requirement
・インストール方法：Install
・注意事項：Note
・文責：Author
・ライセンスlicense
・参考文献 References

# travel

## 概要
旅の記録やアイデアを共有できるアプリを作成しました。

## 主な機能
旅程の投稿、編集、削除、閲覧（いいね、検索）ができます。
管理ユーザーはさらにユーザーリストでユーザーの削除、復元ができます。

## 使い方
テストアカウント
一般ユーザー：mail → user@example.com　password → password
管理ユーザー：mail → admin@example.com　password → password

### 投稿作成について
投稿を作成するにはまず旅程のタイトルを登録し、その中に場所の情報を追加していきます。
タイトル横に鍵マークがついている間は非公開となり、ほかユーザーに見られることはありません。
公開までの流れは以下の通りです。

1. ヘッダーの「投稿する」より新規作成画面に移動。
2. タイトル（必須）、旅程紹介文、タグを入力し、「作成」をクリックで編集画面に移動。
3. 登録する日を選択する。（－/＋をクリックすることで日の追加、削除ができます。）
4. 「スポット追加」をクリックでスポット登録画面に移動。
5. 名前（必須）、住所（必須）、スポット紹介文を入力し、「追加」をクリックで登録と同時に編集画面に戻ります。
6. 必要であれば画像を登録できます。写真アイコンをクリック、ファイルを選択して「追加」をクリック。（同じスポットに複数枚登録できます。）
7. 旅程が完成するまでスポットを追加していきます。スポット情報の編集、削除は右下のアイコンから移動できます。
8. 旅程が完成したら編集画面下部の「公開する」をクリック、マイページに移動します。タイトル横の鍵マークが外れ、他ユーザーに公開されました。

### 検索機能について
キーワードで投稿を絞り込んで閲覧することができます。検索方法が２つあります。

#### 検索バーからキーワード検索する方法
ヘッダー右側の検索バーからキーワード検索することができます。
※スペースなどで区切った複数のキーワード検索には対応していません。
検索対象は以下です。
1. 投稿タイトル
2. 投稿説明文
3. 投稿に含まれるスポット名
4. 投稿に含まれるスポット紹介文
5. タグ名
これらにキーワードが含まれていれば、一覧に投稿が表示されます。

#### タグをクリックして検索する方法
マイページやタイムラインから、投稿についているタグをクリックして検索することができます。
検索対象はタグのみで、全く同じタグを持つ投稿が一覧に表示されます。

### いいね機能について
ユーザーは投稿に対して「いいね」することができます。
マイページやタイムラインから投稿タイトルをクリックして詳細画面に移動し、ハートマークをクリックすることでいいねできます。
いいねした投稿はマイページ → いいねした投稿から閲覧することができます。

## 環境
Laravel Framework 8.83.27
PHP 8.1.6
MySQL
XAMMP

## データベース
データベース名: travelapp
データベースを作成後、プロジェクト配下にあるtravelapp.sqlをインポートしてください。

ユーザー、投稿にダミーを登録しています。
内容が滅茶苦茶ですが、意味はありません。