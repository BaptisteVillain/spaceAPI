<div class="sidebar-day">day <?= isset($select_sol) ? $select_sol : '0' ?></div>
      <div class="sidebar-news">
        <h2 class="sidebar-title">Tweets of the day</h2>
        <?php for ($i=0; $i < $max_size; $i++) {?>
          <div class="tweet">
            <?= $tweets[$i]->tweetText ?>
            <a href="https://twitter.com/MarsCuriosity/status/<?= $tweets[$i]->tweetID ?>" target="_blank">
              <img src="assets/img/logo-twitter.svg" alt="link to tweet">
            </a>
          </div>
        <?php } ?>
        <?php if($max_size == 0){?>
          <p>
            Oops, Curiosity was sleeping this day... <br/>
            <img src="./assets/img/rover-full.svg" alt="curiosity rover">
          </p>
        <?php }?>
      </div>
      <h2 class="sidebar-title photos">Photos - <?= sizeof($images)?> </h2>
      <?php if(!empty($images)){?>
      <div class="row">
          <?php foreach($images as $_index => $_images):?>
            <div class="column hover-shadow">
              <img src="<?= $_images ?>" onclick="openModal();currentSlide(<?= ($_index+1) ?>)">
            </div>
          <?php endforeach; ?>
      </div>

      <div id="myModal" class="modal">
        <span class="close cursor" onclick="closeModal()">&times;</span>
        <div class="modal-content">

          <?php foreach($images as $_index => $_images):?>
            <div class="mySlides">
              <div class="numbertext"><?= ($_index+1) . ' / ' . sizeof($images) ?></div>
              <img src="<?= $_images ?>" onclick="openModal();currentSlide(<?= ($_index+1) ?>)">
            </div>
          <?php endforeach; ?>

          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>

          <div class="column-container">
            <?php foreach($images as $_index => $_images):?>
              <div class="column">
                <img class="demo" src="<?= $_images ?>" onclick="currentSlide(<?= ($_index+1)?>)">
              </div>
            <? endforeach?>
          </div>

        </div>
      </div>
      <?php } else{ ?>
        <p>
          Oops, Curiosity was sleeping this day... <br/>
          <img src="./assets/img/rover-full.svg" alt="curiosity rover">
        </p>
      <?php } ?>
