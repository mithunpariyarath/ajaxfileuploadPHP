	<!DOCTYPE html>
	<html>

	<head>
	    <title>File Upload</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <form class="form-row mt-5" role="form" method="post" action="" enctype="multipart/formdata" >
						<div class="col-auto">
							<input type="file" name="files[]" multiple="multiple" class="form-control" id="customFile" />
						</div>
						<div class="col-auto">
							<button class="btn btn-primary ml-1" type="button" id="upload">Upload</button>
						</div>
	                </form>
	            </div>
	        </div>
			<div class="row">
				<div class="col-12">
				<div id="msg" class="mt-3">

				</div>
				</div>
			</div>
	    </div>


		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	    <script type="text/javascript">
	    $(document).ready(function(e) {
	        $('#upload').on('click', function() {
	            var form_data = new FormData();
	            var ins = document.getElementById('customFile').files.length;
				if(ins!=null||0){
				for (var x = 0; x < ins; x++) {
	                form_data.append("files[]", document.getElementById('customFile').files[x]);
	            }
	            $.ajax({
	                url: 'fileupload.php', // point to server-side PHP script 
	                dataType: 'text', // what to expect back from the PHP script
	                cache: false,
	                contentType: false,
	                processData: false,
	                data: form_data,
	                type: 'post',
	                success: function(response) {
	                    $('#msg').html(
	                    response); // display success response from the PHP script
	                },
	                error: function(response) {
	                    $('#msg').html(response); // display error response from the PHP script
	                }
	            });
				}
	        });
	    });
	    </script>

	</body>

	</html>