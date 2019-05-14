<?php get_header() ?>
<!-- permet d' inclure le haut du site !!! SYNTAXE PROPRE A WP -->


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<!-- ce if permet de vérifier si des articles ont été postés, et si oui, la boucle while les passe en revue et les affiche -->

        <h2 class="display-4 text-center mt-4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <!-- titre h2 permet d' afficher le titre de l' article et son lien URL (the_permalink) -->

        

        <!-- Affiche le corps (Content) de l'Article dans un bloc div. -->
        <div class="container">
            <!-- Affiche la Date. -->
        <?php the_time('F jS, Y'); ?><hr>
            <?php the_content(); ?>

        </div>

<?php endwhile; else : ?>

<!-- on tombe dansle else dans le cas ou aucun article a été posté, on affiche donc une erreur -->

<p>Contenu non trouvé</p>
<?php endif; ?>

<?php get_footer() ?>