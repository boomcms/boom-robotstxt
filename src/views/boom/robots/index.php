	<?= View::make('boom::header', ['title' => 'Robotst.txt file']) ?>
	<?= $menu ?>

	<div id="b-topbar" class="b-toolbar">
		<?= $menuButton() ?>
		<?= $button('accept', 'Save', ['id' => 'b-robots-save', 'class' => 'b-button-withtext']) ?>
	</div>

	<div id="b-robots">
		<form>
            <textarea name="rules"><?= $rules ?></textarea>
		</form>
	</div>

	<style type="text/css">
		textarea {
			position: absolute;
			margin: 10px;
			border: 1px solid #222;
		}
	</style>

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