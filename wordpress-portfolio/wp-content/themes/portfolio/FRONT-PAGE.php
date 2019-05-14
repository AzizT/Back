<?php get_header() ?>
<!-- permet d' inclure le haut du site !!! SYNTAXE PROPRE A WP -->

<style type="text/css">
    body {
        background: url(https://c.wallhere.com/photos/44/b3/sunset-105335.jpg!d)no-repeat;
        background-size: cover;
    }
</style>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!-- ce if permet de vérifier si des articles ont été postés, et si oui, la boucle while les passe en revue et les affiche -->

        <div class="col-md-12 px-0 h-entetes">
            <?php dynamic_sidebar('entete') ?>

        </div>

        <h2 class="display-4 text-center mt-4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <!-- titre h2 permet d' afficher le titre de l' article et son lien URL (the_permalink) -->



        <!-- Affiche le corps (Content) de l'Article dans un bloc div. -->
        <div class="container">
            <!-- Affiche la Date. -->
            <?php the_time('F jS, Y'); ?>
            <hr>
            <?php the_content(); ?>

        </div>

    <?php endwhile;
else : ?>

    <!-- on tombe dansle else dans le cas ou aucun article a été posté, on affiche donc une erreur -->

    <p>Contenu non trouvé</p>
<?php endif; ?>

<?php get_footer() ?>