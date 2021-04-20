<section class="consultation" style="background-color: rgba(184,125,59,0.1)">
    <div class="block-container">
        <h2 class="consultation__title section-title">
            <?php the_field('zagolovok_konsultacziya', 12);?>
        </h2>
        <div class="consultation__subtitle">
            <?php the_field('podzagolovok_konsultacziya', 12);?>
        </div>
        <div class="consultation__content">
            <?php echo do_shortcode('[contact-form-7 id="24" title="Консультация"]')?>
        </div>
    </div>
</section>