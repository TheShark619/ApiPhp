
<form>
        <p> digite o ID do anime </p>
      <input type="text" name = "id">
      <input type = "submit" value = "enviar">
     </form>
     <hr>

    <?php
     
    $con = mysqli_connect('localhost','root','6196','kitsu');

     $url = "https://kitsu.io/api/edge/anime/$_GET[id]";
     $kitsu = json_decode(file_get_contents($url));

     if($kitsu->data->id<=0){
      echo "<br>";
      echo "<br>";
      echo "<hr>";
      echo "<hr>";
      echo "DIGITE UM ID SUPERIOR A 0";
      echo "<hr>";
      echo "<hr>";
      echo "<br>";
      echo "<br>";
     }
    
     echo"id :";
     print_r($kitsu->data->id);
     echo "<hr>";
     echo"type :";
     print_r($kitsu->data->type);
     echo "<hr>"; 
     echo"titulo :";
     print_r($kitsu->data->attributes->slug);
     echo "<hr>";
     echo"titulo em japonês :";
     print_r($kitsu->data->attributes->titles->ja_jp);
     echo "<hr>";
     echo"classificação etária :";
     print_r($kitsu->data->attributes->ageRatingGuide);
     echo "<hr>";
     echo"rank de popularidade :";
     print_r($kitsu->data->attributes->popularityRank);
     echo "<hr>";
     echo "<hr>";
     echo"sinopse :";
     print_r($kitsu->data->attributes->synopsis);
     echo "<hr>"; 
     echo "<hr>";  
     
     $id=$kitsu->data->id;
     $type=$kitsu->data->type;
     $slug=$kitsu->data->attributes->slug;
     $ja_jp=$kitsu->data->attributes->titles->ja_jp;
     $ageRatingGuide=$kitsu->data->attributes->ageRatingGuide;
     $popularityRank=$kitsu->data->attributes->popularityRank;
     $synopsis=$kitsu->data->attributes->synopsis;

     mysqli_query($con,"INSERT INTO `kitsu`(`id`,`type`,`slug`,`ja_jp`,`ageRantingGuide`,`popularityRank`,`sinopsys`) VALUES ($id,'$type', '$slug','$ja_jp','$ageRatingGuide',$popularityRank,'$synopsis')");
     ?>
