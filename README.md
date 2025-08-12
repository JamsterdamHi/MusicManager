# MusicManager

選曲を楽しいものに！WEBシステムで曲を管理

---

![MusicManager_スクショ](https://user-images.githubusercontent.com/112298582/219134277-675b03ff-768c-4129-9085-46c2c17e31f1.jpg)

---

## ✅ 使い方

1. 「新規会員登録」画面で新規会員の登録ができる
2. 「ログインフォーム」画面でログインすると、登録された会員のみがシステム利用できる
3. 新しい曲の登録・編集・削除ができる（自分の登録曲のみ）
4. サンプル曲や各ユーザーが登録した曲が表示され、試聴URLをクリックするとYouTubeなどで試聴できる
5. 「ムード」「ジャンル」「曲名」「アーティスト名」で並び替えができる
6. キーワードで「曲名」「アーティスト名」の検索ができる
7. プレイリストを作成し、選択した曲を登録できる
8. プレイリスト内の曲にコメントを記入できる
9. プレイリスト内の曲順をドラッグ＆ドロップで並び替え可能

---

## ▶️ [アプリ解説動画](https://youtu.be/BdJuCLINEZI)

このアプリを開発した際の制作発表で撮影した動画です。使い方の説明にもなっております。

---

## 💻 開発環境

- PHP 8.1.x  
- Laravel 8.83.27  
- JavaScript  
- jQuery 3.5.1  
- MySQL 8.0.32  
- HTML / CSS

---

## 📘 設計書

- [要件定義書](https://docs.google.com/spreadsheets/d/11u9jmTkl6lsVuGSV8nyVj6bRKL9LG9qQ3Iqu_TTiZ1g/edit#gid=0)
- [基本設計書](https://docs.google.com/spreadsheets/d/1Ch0TT-_SpsTigiCgpGtHc6YyR5H-wN0roP5FsfhmhEc/edit#gid=0)
- [画面設計書](https://docs.google.com/spreadsheets/d/1GUBp9ULB9u5a9eURxna4lqYXyWxMxY2lyJmoy5mpc7U/edit#gid=0)
- [DB定義書](https://docs.google.com/spreadsheets/d/197SEYUnOZk45gYIzAEAwuZ5-fZaKgxXogrYW92ua308/edit#gid=0)
- [テスト仕様書兼報告書](https://docs.google.com/spreadsheets/d/1s3cn0oKwZiwy-h4X216wxl78wSLRYZTLIerJUj_fHwA/edit#gid=1170946066)

---

## 🔍 システム閲覧（本番環境）

▶️ [アプリケーションを開く](https://musicmanager.herokuapp.com/)

### テストアカウント情報

```
メールアドレス : b@b
パスワード     : 98765432
```

---

## ⚠️ ローカル開発時の注意点

### 🔒 HTTPSに勝手にリダイレクトされる場合の対処法

ローカルで `APP_ENV=production` のままだと、HTTPS に自動リダイレクトされて画面が表示されません。  
これは `AppServiceProvider.php` に以下の記述があるためです：

```php
if (\App::environment(['production'])) {
    \URL::forceScheme('https');
}
```

### ✅ ローカル用 `.env` 設定例

```
APP_ENV=local
APP_URL=http://127.0.0.1:8000
APP_DEBUG=true
```

### ✅ 本番環境用 `.env` 設定例

```
APP_ENV=production
APP_URL=https://your-production-url.com
APP_DEBUG=false
```

⚠️ `.env` ファイルは絶対に Git に含めないよう注意してください（`.gitignore` に記載）  
⚠️ 他の開発者用に `.env.example` を用意しておくと便利です

---

## 💡 今後の保守メモ

- `.env` を書き換える際は、`php artisan config:clear` を忘れずに実行する
- ログが出ない・挙動が変なときは `storage/logs/laravel.log` を `tail -f` で確認
- `APP_ENV=production` に戻すのは、本番にデプロイしてテストが済んだ後に行う

---

## ✅ バックアップの推奨

安定動作が確認できたタイミングで Git に commit しておくと安心です：

```bash
git add .
git commit -m "安定動作確認後のバックアップコミット"
git push origin main
```
