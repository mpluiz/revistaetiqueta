<section id="videos-home">
  <div class="container">
    <a href="/videos"><h3 style="color: #fff; font-weight: 700;">TV ETIQUETA</h3></a>
    <div class="videos row">

      <div class="col-md-8 col-xs-12 video-principal">
        <?php
        foreach ($videos as $video) :
          if (get_field('video_principal', $video->ID) == true) :
            ?>
            <iframe id="video-principal" width="100%" height="auto" src="https://www.youtube.com/embed/<?php echo get_field('link_do_video', $video->ID) ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
          <?php
          endif;
        endforeach;
        ?>

        <a class="btn btn-mais m-top hidden-md hidden-lg" href="/videos">Veja +</a>
      </div>

      <div class="col-md-4 col-xs-12 lista-videos hidden-xs">
        <span class="list-group-item title">ÚLTIMOS VÍDEOS</span>
        <?php
        foreach ($videos as $video) :
          if (get_field('video_principal', $video->ID) != true) :
            ?>
            <button type="button" class="list-group-item title-video" value="https://www.youtube.com/embed/<?php echo get_field('link_do_video', $video->ID) ?>?rel=0&amp;showinfo=0">
              <img class="col-md-4 col-xs-12" src="http://i1.ytimg.com/vi/<?php echo get_field('link_do_video', $video->ID) ?>/default.jpg">
              <span class="col-md-8 col-xs-12"><?php echo $video->post_title ?></span>
            </button>
          <?php
          endif;
        endforeach;
        ?>
        </div>

        </div>
      </div>
</section>

<script>
  $('button.title-video').click(function() {
    new_url = $(this).val();
    iframe = document.getElementById('video-principal');
    iframe.src = new_url;
  });
</script>