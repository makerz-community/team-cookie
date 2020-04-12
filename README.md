こんにちは！
makerzのcookieチームの制作アプリです。

## ローカル開発環境のセットアップ方法

1. Dockerをインストール

  - [ここ](https://docs.docker.com/get-docker/)から、自分のOSのDocker Desktop for ◯◯を選択
  - 正しくインストールされていれば、ターミナルから `docker version` と `docker-compose version` が実行できます

2. gitをPCにインストール

  - [ここ](https://git-scm.com/book/ja/v2/%E4%BD%BF%E3%81%84%E5%A7%8B%E3%82%81%E3%82%8B-Git%E3%81%AE%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB)を参考下さい

3. このリポジトリをclone

  下記コマンドの実行で、GitHub上にあるソースを落とします
  (ソースのフォルダをつくりたいディレクトリで)
  ```bash
  git clone https://github.com/makerz-community/team-cookie.git
  ```

4. dockerを立ち上げる

  (cloneしたディレクトリで)
  ```
  cd team-cookie
  docker-compose up
  ```
  パッケージやイメージをダウンロードするので、結構待ちます（ネットワークが必要です）

5. http://localhost:8080 にアクセス

`/www/html/index.php` にかかれている内容が表示されていると思います


## 開発の流れ

1. `/www/html/` 以下にphpファイルを作る or 編集
2. 画面で確認
3. OKな内容なら、gitでcommit
4. Reviewしてもらう段階になったらGitHubにPush
5. `develop` ブランチに対しプルリクエストを作成し、レビューをSlackでお願いする
6. (Reviewerに指定された人) 変更したほうが良さそうなことや、気になることなどをコメントを残す
7. (Reviewerに指定された人) 内容に問題がなければApproveし、Approveしたよ！とSlackで伝える
8. プルリクエストをmergeし、 `develop` ブランチがアップデートされたことをSlackで伝える
9. (本人以外) `develop` ブランチをpullする。この時作業途中な場合も多いので、自分がプルリクエストを出すまでの良きタイミングで行う

## MySQLへコマンドラインで接続したいとき

docker-compose up している状態で、
```bash
docker-compose exec db bash
(コンテナに入ったので、)
mysql -u root -p
> (docker-compose.ymlに記載のパスワードを入力)
```

## データベースのテーブルの変更の仕方

チーム開発では、データベースの構成が全員に共有されている必要があります。
誰かが追加した/変更したテーブルを検知し、自分が開発に使っているデータベースにもその変更を反映させたい。
本プロジェクトでは、そういった「データベースのバージョン管理」であるマイグレーションを取り入れ、現場のチーム開発に近いことを経験しましょう！

### 使用するマイグレーションツール

https://phinx.org/

### 実際のマイグレーションの使い方

[ここ](https://qiita.com/hypermkt/items/b915b8a9fbda2f0c612e)や[ここ](https://qiita.com/macchaka/items/3decc5f48a15f00e188c)をかなり参考にしています。ぜひ見てみてください

- コンテナが立ち上がっていない場合は、(本README.mdがあるディレクトリで) docker-compose up でコンテナを立ち上げる
- `docker-compose exec php bash` で、phpコンテナの中（Linux）に入る
- `vendor/bin/phinx status` が実行できることを確認する

#### 自分がテーブルを追加する場合

- `vendor/bin/phinx create <変更内容>`
  - users っていうテーブルを作成するなら、変更内容は `AddUsersTable` などになります
- 実際の変更内容（どういった変更をデータベースにするか？）を記載する「マイグレーションファイル」が `db/migrations` に作成されます
- サンプルを見たり、ドキュメントを見ながら変更内容を記載します
- `vendor/bin/phinx migrate -e development` でデータベースへの変更を実行できます
  - [このへん](https://qiita.com/hypermkt/items/b915b8a9fbda2f0c612e#%E3%83%90%E3%83%BC%E3%82%B8%E3%83%A7%E3%83%B3%E3%83%8A%E3%83%B3%E3%83%90%E3%83%BC%E3%82%92%E6%8C%87%E5%AE%9A%E3%81%97%E3%81%A6%E5%AE%9F%E8%A1%8C)の、バージョンナンバーを指定して実行するケースや、dry-run（よくこの言葉は使われます）での実行なども見ておきましょう


#### 他のメンバーのマイグレーションとバッティングした倍
