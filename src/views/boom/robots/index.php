	<?= View::make('boom::header', ['title' => 'Robotst.txt file']) ?>
	<?= $menu()->render() ?>

	<div id="b-topbar" class="b-toolbar">
		<?= $menuButton() ?>
		<?= $button('check', 'Save', ['id' => 'b-robots-save', 'class' => 'b-button-withtext']) ?>
	</div>

	<div id="b-robots">
		<form>
            <textarea name="rules" style="position: absolute; margin: 10px; border: 1px solid #222"><?= $rules ?></textarea>
		</form>
	</div>

	<?= $boomJS ?>
	<script type="text/javascript" src="/vendor/boomcms/boom-robotstxt/js/robotsEditor.js"></script>
	<script type="text/javascript">
		//<![CDATA[
		(function($){
			$.boom.init();

			$('body').robotsEditor();
		})(jQuery);
		//]]>
	</script>
</body>
</html>