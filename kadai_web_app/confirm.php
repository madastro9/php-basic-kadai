<?php
//セッションを開始
session_start();
// POSTリクエストから入力データを取得
$name = $_POST['empkoyee_name'];
$age = $_POST['employee_age'];
$department = $_POST['department'];


//エラーメッセージを格納する配列
$errors=[];//最初はエラーなし

//お名前のバリデーション
if(empty($name)){
    $errors[]='社員名を入力して下さい';
}

//メールアドレスのバリデーション
if(empty($age)){
    $errors[]='年齢を入力して下さい';
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>kadai_wab_app</title>
</head>

<body>
    <h2>入力内容をご確認ください。</h2>
    <p>問題なければ「確定」、修正する場合は「キャンセル」をクリックしてください。</p>

    <table border ="1">
        <tr>
            <th>項目</th>
            <th>入力内容</th>
        </tr>
        <tr>
            <td>社員名</td>
            <td><?php echo $name; ?></td>
        </tr>
        <tr>
            <td>年齢</td>
            <td><?php echo $age; ?></td>
        </tr>
        <tr>
            <td>所属部署</td>
            <td><?php echo $department; ?></td>
        </tr>
        
    </table>

    <p>
        <button id="confirm-btn" onclick="location.href='complete.php';">確定</button>
        <button id="cancel-btn" onclick="history.back();">キャンセル</button>
    </p>
    <?php
    //入力項目にエラーがある場合の処理
    if(!empty($errors)){
        //配列ないのエラーメッセージを順番に出力
        foreach($errors as $error){
            echo '<font color="red">'.$error .'</font>'. '<br>';
        }
        //確定のボタンを無効化するJavaScriptコードをブラウザ側に送信
        echo '<script>document.getElementById("confirm-btn").disabled=true;</script>';
    }
    ?>
</body>

</html>