<?php  
    include("includes/db.php");
    $db_count = $conn->query("SELECT count(*) FROM news"); // количество записей в таблице news
    $articles_count = $db_count->fetch_row();
    mysqli_close($conn);
    $amountOfPages = ceil($articles_count[0] / 4) ;
    $pageID = @$_GET['p'];
    if($pageID > $amountOfPages){
      header("Location:/TestTask");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="assets/logo1.svg" type="image/svg+xml">
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <title>Галактический вестник Новости</title>
</head>
<body>
  
  <header>

    <div class="mainLogo">
      <img src="assets/logo1.svg" ></img>
      <span class="logoText">Галактический<br/> вестник</span>
    </div>
  </header>

<?php include("views/main_article.php"); ?>

  <div style=" background: linear-gradient(0deg, rgba(0, 0, 0, 0.30) 0%, rgba(0, 0, 0, 0.30) 100%), url('assets/images/<?=$article['image'];?>'), lightgray 50%;  background-repeat: no-repeat;  background-position: center center;  background-attachment: fixed;  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover; width:100%;" class="photo">
    <div class="mainTitle">
      <h1 class="title"><?=$article['title']?></h1>
      <h1 class="subtitle"><?=$article['announce']?></h1>
    </div>
 </div>

  <main>
    <header>
      <h1>Новости</h1>
    </header>

   

    <div class="twoArticles">
    <?php include("views/articles.php"); ?>

    </div>

      
   

    </section>

   
   
      <ul class="pagination">
        <?php include("views/pagination.php"); ?>
      </ul>
    

     
   
  </main>
    <footer>
      <hr class="line" />
      <div>
        <span>
          © 2023 — 2412 «Галактический вестник»
        </span>
      </div>
    </footer>
</body>
</html>