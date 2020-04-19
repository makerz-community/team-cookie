# members

## 物理名（DB上での名称）
 - members

## 論理名（会話で使う名称）
 - メンバーテーブル
 
## 概要

メンバー情報のマスターテーブル<br>
メンバー情報を保存している。

## 参照されるページ
 - ログイン
 - メンバー新規作成
 - メンバー一覧
 - メンバープロフィール(メンバー詳細)

## 構造

| Field | Type | Null | Key | Default | Extra | 内容 |
| --- | --- | --- | --- | --- | --- | --- |
| id                  | int(11)     | NO | PRI | NULL                | auto_increment              |主キー|
| name                | varchar(255)| NO | UNI | NULL                |                             ||
| created_date       | timestamp   | NO |     | 0000-00-00 00:00:00 |                             |レコード作成日付|
| updated_date         | timestamp   | NO |     | CURRENT_TIMESTAMP   | on update CURRENT_TIMESTAMP |レコード更新日付|
 

## マイグレーションファイル

