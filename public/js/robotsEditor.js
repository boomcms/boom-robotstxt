$.widget('ui.robotsEditor', {
	saveUrl : '/cms/robots',

	_create : function() {
		this.bind();
	},

	bind : function() {
		var robotsEditor = this;

		this.element
			.on('click', '#b-robots-save', function() {
				robotsEditor.save();
			})
			.find('textarea')
			.css({
				width : document.documentElement.clientWidth - 20,
				height :  document.documentElement.clientHeight - 110
			});
	},

	save : function() {
		$.post(this.saveUrl, this.element.find('form').serialize())
			.done(function() {
				new boomNotification('Robots.txt rules saved');
			});
	}
});