<?php
// // データベースに接続
// $dsn = 'mysql:host=mysql5.star.ne.jp;dbname=ruricomugi_acnl;charset=utf8';
// $db_user = 'ruricomugi_php';
// $db_pass = 'WKjtStkjAv6f9DK';
// try {
//     $pdo = new PDO($dsn, $db_user, $db_pass);
// } catch (PDOException $e) {
//     exit('データベース接続失敗 ' . $e->getMessage());
// }

$dsn = 'mysql:host=localhost;dbname=acnl;charset=utf8';
$db_user = 'php';
$db_pass = '';
try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
} catch (PDOException $e) {
    exit('データベース接続失敗 ' . $e->getMessage());
}

// PDOクラスをインスタンス化
$pdo = new PDO($dsn, $db_user, $db_pass);

// PDOStatementオブジェクトに結果セット保持
$sql =  $_POST['sql'];
$stmt = $pdo->query($sql);

// 値を取得
$results = $stmt->fetchALL(PDO::FETCH_ASSOC);
$columns = array_keys($results[0]);
?>

<!-- 値をテーブルで表示 -->
<div class="result">
    <table>
        <tr>
        <?php foreach ($columns as $column){ ?>
            <th><?php print_r($column); ?></th>
        <?php } ?>
        </tr>
        <?php foreach ($results as $result){ ?>
        <tr>
            <?php foreach ($result as $value){ ?>
                <td><?php print_r($value); ?></td>
            <?php } ?>
        <?php } ?>
        </tr>
    </table>
</div>
