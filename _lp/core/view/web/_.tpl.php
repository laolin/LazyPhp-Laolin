<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
    <title><?php echo $top_title . ' | ' . c('site_name') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>    
<body>
      <h2><?php if($title)echo $title;else echo 'It\'s working!';?></h2>
      <p><?php echo $info?></p>
</body>
</html>