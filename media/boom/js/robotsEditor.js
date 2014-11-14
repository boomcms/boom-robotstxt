$.widget('ui.robotsEditor', {
	saveUrl : '/cms/robots/save',

	_create : function() {
		this.bind();
	},

	bind : function() {
		var robotsEditor = this;

		this.element.on('click', '#b-robots-save', function() {
			robotsEditor.save();
		});
	},

	save : function() {
		$.boom.post(this.saveUrl, this.element.find('form').serialize())
			.done(function() {
				new boomNotification('Robots.txt rules saved');
			});
	}
});