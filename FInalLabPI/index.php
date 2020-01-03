<?php
   $command = escapeshellcmd('python3 core/Query.py ' . $_POST['t'] . ' ' . $_POST['s']);
   $output = shell_exec($command);
   //$datas = json_decode($output, true);
   $tes=json_decode($output,true);
   for($i=0; $i<count($tes); $i++):
      $syntax= shell_exec("cat data/clean/".$tes[$i]['doc']);
      $datas = explode("\n",$syntax);
      $tes[$i]['title']=$datas[0];
      $tes[$i]['content']='';
      for ($j=1; $j<count($datas); $j++) { 
         $tes[$i]['content'].=$datas[$j];
      }
   endfor;

   ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Document</title>
</head>
<body>
   <form action="" method="post">
      <input type="text" name="s">
      <input type="text" name="t">
      <button type="submit">SEARCH NOW !!!</button>
   </form>
   <?php foreach($tes as $data):?>
      <a href="<?=$data['url']?>"><?=$data['title']?></a>
      
      <br>
      <?=$data['content']?>
      <br>
   <?php endforeach;?>
</body>
</html>