<div class="sidebar-day">SOL 145</div>
      <div class="sidebar-info">
        <h2 class="sidebar-title">Informations</h2>
        <div class="info-general">
        <div>Temperature on Mars: <strong>-10</strong></div>
        <br>
        <div>Sol : <strong>150</strong></div>
        </div>
      </div>
      <div class="sidebar-news">
        <h2 class="sidebar-title">News of that day</h2>
        <div>lorem</div>
        <div>lorem</div>
        <div>lorem</div>
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
        <p>Oops, Curiosity was sleeping this day</p>
      <?php } ?>



