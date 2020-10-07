<?php

$link = mysqli_connect("localhost","root","root","crud system");
//サーバー名、データベース名、パスワード
if(mysqli_connect_error()){
    die("データベースの接続に失敗しました。");
}
/*$query = "INSERT INTO `users`(`name`,`Email`,`pass`) VALUES ('dan','dan@gmail.com','DANGO')";

if($result = mysqli_query($link,$query)){
  echo"クエリの発行に成功しました。 ";
}
*/
if(array_key_exists('name',$_POST) OR (array_key_exists('Email',$_POST) OR (array_key_exists('pass',$_POST)))){

    if($_POST['name'] == ''){

      echo "名前を入力してください。";

    } elseif($_POST['Email'] == ''){

      echo "メールアドレスを入力してください。";

    } elseif($_POST['pass'] == ''){

      echo "パスワードを入力してください。";

    } else{
      $query = "SELECT 'id' FROM 'users' WHERE 'Email' = 
      '".mysqli_real_escape_string($link,$_POST['Email'])."'";
      $result = mysqli_query($link,$query);
      if(mysqli_num_rows($result) > 0){
        echo "すでにそのメールアドレスは使用されています。";
      } else{
        $query = "INSERT INTO `users` (`name`,`Email`,`pass`) VALUES 
        ('".mysqli_real_escape_string($link,$_POST['name'])."',
        '".mysqli_real_escape_string($link,$_POST['Email'])."',
        '".mysqli_real_escape_string($link,$_POST['pass'])."')";
        if(mysqli_query($link,$query)){
          echo "登録されました。";
        } else {
          echo "登録に失敗しました。";
        }
      }
    }
}


?>
<h1>会員登録画面</h1>
<form action="" method="POST">
<label for="name">名前</label>
  <input id="name" type="text" name='name' value="">

<br>
<label>メールアドレス</label>
<input id="Email" type="text" name="Email">
<br>
<label for=pass>パスワード</label>
<input id="pass" type="text" name="pass">
<br>
<input id="submit" type="submit" value="確認画面へ">


</form>