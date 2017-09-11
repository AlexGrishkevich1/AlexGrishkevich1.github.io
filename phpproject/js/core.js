var forms = document.querySelectorAll('form[name="delete_track_form"]');
for (var i=0; i<forms.length; i++) {
	var form = forms.item(i);
	form.addEventListener('submit', function (e) {
		if (!confirm('Вы уверены?')) {
			e.preventDefault();
		}
		//e.preventDefault();
		//e.stopPropagation();
	});
}

 
