$(document).ready(function(){
	var form_data = {};
	$(".loader").hide();
	$(".nid_wrapper").hide();
	$(document).on('change', '#files', function(){
		$(".loader").show();
		
		var form_data = new FormData();

		// Read selected files
        var totalfiles = document.getElementById('files').files.length;
        for (var index = 0; index < totalfiles; index++) {
            form_data.append("files", document.getElementById('files').files[index]);
            var name = document.getElementById("files").files[index].name;
            var ext = name.split('.').pop().toLowerCase();
			if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
			{
				alert("Invalid Image File");
			}
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById("files").files[index]);
			var f = document.getElementById("files").files[index];
			var fsize = f.size||f.fileSize;
			
        }

        if(fsize > 1000000)
		{
			$(".loader").hide();
			alert("Image File Size is very big");
		}
		else {
			// AJAX request
            $.ajax({
                url: 'upload.php',
               	type: 'post',
               	data: form_data,
               	dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
                	console.log(response);
					$("#nid").val(response);
					$(".loader").hide();
					$(".nid_wrapper").show();
					
                }
            });
		}
        
	});
});	