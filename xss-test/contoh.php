<!DOCTYPE html>
<html>
<head>
  <title>Hasil Komentar</title>
</head>
<body>
  <h2>Hasil Komentar</h2>
  <?php
  $comment = htmlspecialchars($_GET['comment']);
  echo "Komentar Anda: " . htmlspecialchars($comment);
  ?>
</body>
</html>
