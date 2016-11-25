<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">Select file to upload:</h4>
	</div>
		<div class="panel-body">
                <form method="post" action="upload" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Share Title</label>
                        <input type="text" name="title" class="form-control" />
                    </div>
                    <input class="btn btn-default btn-share"  name="fileToUpload" type="file"><br>
                    Set it to public?<br>
                    <input class="checkbox" type="checkbox" name="public" value="yes"><br>
                    <input class="btn btn-primary" type="submit" value="Upload File" name="upload">
                    <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
                </form>
        </div>
	</div>
</div>

