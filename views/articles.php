<?php include("./includes/db.php");
    if(isset($_GET['p'])){ // если параметр существует
      echo "<input type=hidden id=current_p value=".$_GET['p'].">";  // для работы через js
      if($_GET['p'] == 1){ $p_start = 0; }  // если шаг=1 - то же самое, что и главная страница
      else{ $p_start = $_GET['p'] * 4 - 4; } // переводим шаги в страницы и вычисляем начало лимита
    }
    else{  // значит главная страница - первые 4 свежие записи
      $p_start = 0;
    }
    $db_query = $conn->query("SELECT * FROM `news` ORDER BY  `date` DESC LIMIT $p_start, 4");  // DESC - в обратном порядке,  $p_start - начало лимита, 4 - сколько выводить после $p_start
    $count_articles = 0;
    while (($row = $db_query ->fetch_assoc()) != false):
      $count_articles++;
      $date = date("d.m.Y",strtotime($row['date']));
      $title = $row['title'];
      $anonce = $row['announce'];
    ?>
    <article>
        <time datetime="2412-06-11"><?=$date?></time>

        <header>
          <h2><?=$title?></h2>
        </header>

        
          <?=$anonce?>
        
        <a href="article.php?id=<?=$row['id']?>">
	        <button>
	          <p>Подробнее</p> 
	           <span style="padding-top:4px;margin-left:0px;">
	              <svg xmlns="http://www.w3.org/2000/svg" width="26" height="16" viewBox="0 0 26 16" >
	              <path d="M25.707 8.70711C26.0975 8.31658 26.0975 7.68342 25.707 7.2929L19.343 0.928934C18.9525 0.538409 18.3193 0.538409 17.9288 0.928934C17.5383 1.31946 17.5383 1.95262 17.9288 2.34315L23.5857 8L17.9288 13.6569C17.5383 14.0474 17.5383 14.6805 17.9288 15.0711C18.3193 15.4616 18.9525 15.4616 19.343 15.0711L25.707 8.70711ZM-8.74228e-08 9L24.9999 9L24.9999 7L8.74228e-08 7L-8.74228e-08 9Z"/>
	              </svg>
	           </span>
	        </button>
        </a>
      </article>

      <?php endwhile; ?>