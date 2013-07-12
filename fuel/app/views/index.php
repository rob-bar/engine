<header>
  <?= Asset::img('layout/logo-'. Lang::get_lang() .'.png'); ?>
  <!-- <iframe width="560" height="315" src="//www.youtube.com/embed/Oa_msGg-oYU?autoplay=1" frameborder="0" allowfullscreen></iframe> -->
</header>
<footer>

   <?= Asset::img('layout/smurf-'. Lang::get_lang() .'.png',array("id" => "smurf")); ?>
   <a href="<?= __('twitter_url'); ?>" id="twitter-badge"><?= Asset::img('icon/twitter-badge-'. Lang::get_lang() .'.png') ?></a> 
   <section>
     <h1><?= __('title'); ?></h1>
     <a href="<?= __('facebook_url'); ?>" class ="button"><?= __('button'); ?></a>
   </section>
   <?= Asset::img('layout/price.png',array("id" => "price")); ?>

   <a href="<?= __('regulation_url'); ?>" id="regulations"><?= __('regulations'); ?></a>
  
</footer>