<div>
	<?php if(isset($_SESSION['is_logged_in'])) : ?>
	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/upload">Share Something</a>
	<?php endif; ?>
</div>

<div>
    <table class="table table-bordered table-striped">
        <thead
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Name</th>
                <th>Type</th>
                <th>Size</th>
                <th>Public</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody
        <?php foreach($viewmodel as $item) : ?>
        <tr>
            <th><?php echo $item['id']; ?></th>
            <th><?php echo $item['title']; ?></th>
            <th><?php echo $item['file_name']; ?></th>
            <th><?php echo $item['file_type']; ?></th>
            <th><?php echo $item['file_size']; ?></th>
            <th><?php echo $item['visibility']; ?></th>
            <th>
<!--                action="shares/delete"-->
                <form method="post" action="delete">
                    <input type="submit" name='delete' value="Delete"/>
                    <input type="submit" name='download' value="Download"/>
                </form>
            </th>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
