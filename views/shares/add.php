<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Share Something</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    	<div class="form-group">
    		<label>Share Title</label>
    		<input type="text" name="title" class="form-control" />
    	</div>
    	<div class="form-group">
    		<label>Body</label>
    		<textarea name="body" class="form-control"></textarea>
    	</div>
    	<div class="form-group">
    		<label>Link</label>
    		<input type="text" name="link" class="form-control" />
    	</div>
    	<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
        <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
    </form>
  </div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">Select file to upload:</h4>
	</div>
		<div class="panel-body">
			<form method="post" action="upload" enctype="multipart/form-data">
				<input class="btn btn-default btn-share"  name="fileToUpload" type="file" id="fileToUpload">
				<input class="btn btn-primary" type="submit" vgit alue="Upload File" name="upload" >
			</form>
		</div>
	</div>
</div>
