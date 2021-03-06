<?php

get_header();
include "query.php";

if (have_posts()) {

  $post = get_post();
  $category = get_the_category();
  $category_parent = get_category_parents($category[0]->category_parent);

  // Adicionando Banner em todas as single page se estiver ativo.

  echo '<section id="banner">
        <div class="container">
        <div class="banner owl-carousel owl-theme">';

  foreach ($banners as $banner) {

    $ativo = get_field('ativo_em_todas_as_paginas', $banner->ID);

    if (($ativo == true) && ($category[0]->slug != 'revista')) {

      $id = $banner->ID;

      $date = get_field('ativo_ate', $id);
      $today = date('Ymd');

      if ($today <= $date) {
        $thumbnail = get_thumbnail($id);
        if ($thumbnail != '') {

          if (get_field('extender', $id)) {
            echo '<a class="post extend" href=' . get_field('link', $id) . ' target="_blank">
                      <img src=' . $thumbnail . '>
                  </a>';
          } else {
            echo '<a class="post" href=' . get_field('link', $id) . ' target="_blank">
                      <img src=' . $thumbnail . '>
                  </a>';
          }
        }
      }
    }
  }

  echo '</div>
        </div>
        </section>';

  if (($category[0]->slug == 'noticias') or ($category_parent == 'Noticias/')) {
    include "single/noticia.php";
  }

  if ($category[0]->slug == 'revista') {
    include "single/revista.php";
  }

  if ($category[0]->slug == 'eventos') {
    include "single/evento.php";
  }

  if ($category[0]->slug == 'gastronomias') {
    include "single/gastronomia.php";
  }

  if ($category[0]->slug == 'promocao') {
    include "single/promocao.php";
  }

  if ($category[0]->slug == 'blogs_e_colunas') {
    include "single/colunista.php";
  }

  comments_template();
} else {
  include('404.php');
}

get_footer(); 

?>
