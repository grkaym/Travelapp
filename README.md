# travel

## サイトURL
https://kiki.capoo.jp/

## 概要
旅の記録やアイデアを共有できるアプリを作成しました。

## 主な機能
旅程の投稿、編集、削除、閲覧（いいね、検索）ができます。

管理ユーザーはさらにユーザーリストでユーザーの削除、復元ができます。

## 使い方
- テストアカウント
    - 一般ユーザー：mail → user@example.com　password → password
    - 管理ユーザー：mail → admin@example.com　password → password

### 投稿作成について
投稿を作成するにはまず旅程のタイトルを登録し、その中に場所の情報を追加していきます。

タイトル横に鍵マークがついている間は非公開となり、他ユーザーに見られることはありません。

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

**※スペースなどで区切った複数のキーワード検索には対応していません。**

検索対象は以下です。

1. 投稿タイトル
2. 投稿紹介文
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
- Laravel Framework 8.83.27
- PHP 8.1.6
- MySQL
- XAMMP


ユーザー、投稿にダミーを登録しています。
