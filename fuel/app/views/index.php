<header>
  <div id="langchoise">
    <?php var_dump(Lang::get_lang()); ?>
    <?php if (Lang::get_lang() === "nl-BE"): ?>
       <a href="fr-BE">FR</a>
    <?php else: ?>
      <a href="nl-BE">NL</a>
    <?php endif; ?>
  </div>
  <?= Asset::img('layout/logo-'. Lang::get_lang() .'.png'); ?>
  <?php if (Lang::get_lang() == "nl-BE"): ?>
     <iframe width="560" height="315" src="//www.youtube.com/embed/Oa_msGg-oYU?autoplay=1" frameborder="0" allowfullscreen></iframe>
  <?php else: ?>
    <iframe width="560" height="315" src="//www.youtube.com/embed/0ePRde01Uzs?autoplay=1" frameborder="0" allowfullscreen></iframe>
  <?php endif; ?>

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