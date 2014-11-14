	<?= View::factory('boom/header', array('title' => 'Robots.txt Editor'))?>
	<?= new \Boom\Menu\Menu ?>

	<div id="b-topbar" class="b-toolbar">
		<?= new \Boom\UI\MenuButton() ?>
		<?= new \Boom\UI\Button('accept', __('Save'), array('id' => 'b-robots-save', 'class' => 'b-button-withtext')) ?>
	</div>

	<div id="b-robots">
		<form>
            <textarea name="rules"><?= $rules ?></textarea>
		</form>
	</div>

	<?= Boom::include_js() ?>
    <?= Assets::factory('boom-robots')
        ->js('robotsEditor.js')
        ->css('robots.css.less')
    ?>

	<script type="text/javascript">
		//<![CDATA[
		(function($){
			$.boom.init({
                csrf : '<?= Security::token() ?>'
             });

			$('body').robotsEditor();
		})(jQuery);
		//]]>
	</script>
</body>
</html>