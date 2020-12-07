<?php
$id = $_GET["id"];
//var_dump($id);
$dsn = "mysql:host=localhost;dbname=restaurantdb;charset=utf8";
$user = "restaurantdb_admin";
$password = "admin123";
$pdo = new PDO($dsn, $user, $password);
$sql = "select * from restaurants where id = $id";
$sql1 = "select * from reviews where restaurant_id = $id";
$pstmt = $pdo->prepare($sql);
$pstmt1 = $pdo->prepare($sql1);
$pstmt->execute();
$pstmt1->execute();
$record = $pstmt->fetchAll(PDO::FETCH_ASSOC);
$reviews = $pstmt1->fetchAll(PDO::FETCH_ASSOC);
//var_dump($record);
//var_dump($reviews);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>レストランレビュサイト - 小テスト</title>
	<link rel="stylesheet" href="../assets/css/style.css" />
	<link rel="stylesheet" href="../assets/css/detail.css" />
</head>
<body id="detail">
	<div class="p-wrapper">
	<header>
		<h1><a href="list.php">レストラン レビュ サイト</a></h1>
	</header>
	<main>
		<article class="detail">
			<h2>レストラン詳細</h2>
			<section>
			    <?php foreach ($record as $res){ ?>
				<table class="list">
					<tr>
						<td class="photo"><img name="image" src="../pages/img/<?php echo $res["image"]; ?>" /></td>
						<td class="info">
							<dl>
								<dt name="name"><?php echo $res["name"]; ?></dt>
								<dd name="description">
									<?php echo $res["description"]; ?>
								</dd>
							</dl>
						</td>
					</tr>
				</table>
			    <?php } ?>
			</section>
		</article>
		<article class="reviews">
			<h2>レビュ一覧</h2>
			<section>
			    <?php foreach ($reviews as $rev){ ?>
				<dl class="review">
					<dt name="point"><?php $po = $rev["point"]; for($i = 0;$i < $po;$i++){ echo "★";}for($j = 0;$j < 5-$po;$j++){echo "☆";}?></dt>
					<dd name="description">
							<?php echo $rev["comment"]; ?>
							<div name="posted">
								（<span name="posted_at"><span><span name="reviewer"><?php $rev["reviewer"]; ?></span>さん）
							</div>
					</dd>
				</dl>
				<?php } ?>
			</section>
		</article>
		<article class="entry">
			<h2>レビュを書き込む</h2>
			<section>
				<form action="detail.php" method="post">
					<table class="entry">
						<tr>
							<th>お名前</th>
							<td>
								<input type="text" name="name" />
							</td>
						</tr>
						<tr>
							<th>ポイント</th>
							<td>
								<input type="radio" name="point" value="1">1
								<input type="radio" name="point" value="2">2
								<input type="radio" name="point" value="3" checked>3
								<input type="radio" name="point" value="4">4
								<input type="radio" name="point" value="5">5
							</td>
						</tr>
						<tr>
							<th>レビュ</th>
							<td>
								<textarea name="comment"></textarea>
							</td>
						</tr>
					</table>
					<div class="buttons">
						<input type="submit" value="投稿" />
						<input type="reset" value="クリア" />
					</div>
				</form>
			</section>
		</article>
	</main>
	<footer>
		<div class="copyright">&copy; 2020 the applied course of web system development</div>
	</footer>
	</div>
</body>
</html>