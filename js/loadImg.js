$('#fileToUpload').on('change', function(ev) {
     var f = ev.target.files[0];
     var fr = new FileReader();

     fr.onload = function(ev2) {
         console.dir(ev2);
		 $("#imagePreview").removeAttr("src").attr("src", ev2.target.result);
         //$('#imagePreview').attr('src', ev2.target.result);
     };

     fr.readAsDataURL(f);
 });
