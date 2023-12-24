<?php
$id = $_GET['id']; 
include("includes/db.php");
$query = $conn->query("SELECT * FROM `news` WHERE `id`='$id'");
$article = $query->fetch_assoc();
$conn->close();
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
  <title><?=$article['title']?></title>
</head>
<body>
  <header>

    <div class="mainLogo">
      <img src="assets/logo1.svg" ></img>
      <span class="logoText">Галактический<br/> вестник</span>
    </div>
  </header>
  <hr />
  <main class="articleMain">
    <p class="navigation"><a href="/TestTask">Главная</a> &nbsp;/   <span class="navigationSection" ><?=$article['title']?></span></p>
    <header>
      <h1 class="articleHeader">
      <?=$article['title']?>
      </h1>
    </header>
    <div class="articleAndImg">
      <article class="currentArticle">
        <time datetime="<?= date("d-m-Y",strtotime($article['date']));?>"><?= date("d.m.Y",strtotime($article['date']));?></time>
        <header class="announce">
          <?=$article['announce']?>
        </header>
        <div class="contentDiv">
        <?=$article['content']?>
      </div>

    <a href="/TestTask">
      <div style="margin-top:-18px;">

     
      <button style="bottom:72px;" class="articleButton">
        <span style="padding-top:4px;margin-left:0px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="16" viewBox="0 0 26 16" >
            <path d="M0.293015 8.70711C-0.0975094 8.31658 -0.0975094 7.68342 0.293014 7.2929L6.65698 0.928934C7.0475 0.538409 7.68067 0.538409 8.07119 0.928934C8.46171 1.31946 8.46171 1.95262 8.07119 2.34315L2.41434 8L8.07119 13.6569C8.46171 14.0474 8.46171 14.6805 8.07119 15.0711C7.68067 15.4616 7.0475 15.4616 6.65698 15.0711L0.293015 8.70711ZM26 9L1.00012 9L1.00012 7L26 7L26 9Z" />
          </svg>
         </span>

        <p>Назад к новостям</p> 
         
      </button>
      </div>
      </a>

      </article>
      <div class="articleImg">
        <img alt="article cover" style="width:100%" src="assets/images/<?=$article['image']?>" />
      </div>
    </div>

   
    
  </main>

  <footer class="articleFooter">
    <hr class="line" />
    <div>
      <span>
        © 2023 — 2412 «Галактический вестник»
      </span>
    </div>
  </footer>