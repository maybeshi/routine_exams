# 第三回小テスト

	作業-1. list.phpとdetail.phpで、PDOを取得するコードを関数として定義して、その関数を呼出すコードに変更してください。
	作業-2. detail.phpの画面において、［投稿］ボタンをクリックして入力された新規のレビュをデータベースに登録するプログラムを追加することを考えます。

　　　　　　・list.phpの「詳細」リンクをクリックして遷移した場合
　　　　　　・detail.phpの［投稿］ボタンがクリックされて遷移した場合

　　　　　のそれぞれの場合でどのようなリクエストパラメータが送信されるかを検討し、どのようなリクエストパラメータがあれば［投稿］ボタンがクリックされたと判断できるかを考えて下さい。そして、［投稿］ボタンがクリックされたと判断できるためのリクエストパラメータの内容をvar_dump関数で表示確認しましょう。var_dump関数で確認した後は、削除せずにその行をコメントアウトしておいてください。
	作業-4. 新規のレビュを入力して、［投稿］ボタンがクリックされたとき、新規のレビュがreviewsテーブルに挿入されるプログラムを追加して下さい。