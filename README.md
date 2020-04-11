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
  (ソースのフォルダをつくりたいディレクトリで、)
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