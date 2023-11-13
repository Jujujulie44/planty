
<?php
/**
 
 */

?>

	<footer>

		<div class="div-footer">
		<?php
			if( has_nav_menu( 'planty-footer' ) ) :

				wp_nav_menu( [
					'menu' => 'planty-footer'
				] );
				
			endif;
		?>
		</div>

	</footer>

<?php wp_footer(); ?>

</body>
</html>