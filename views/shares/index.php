<!--
TO-DO: spojiti ili odvojiti forme za upload/blog post
       dodati public button u upload formi i upisati u bazi
       -->
<div>
	<?php if(isset($_SESSION['is_logged_in'])) : ?>
	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/add">Share Something</a>
	<?php endif; ?>
	<?php foreach($viewmodel as $item) : ?>
		<div class="well">
			<h3><?php echo $item['title']; ?></h3>
			<small><?php echo $item['create_date']; ?></small>
			<hr />
			<p><?php echo $item['body']; ?></p>
			<br />
			<a class="btn btn-default" href="<?php echo $item['link']; ?>" target="_blank">Go To Website</a>
		</div>
	<?php endforeach; ?>
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
            <th><?php echo $item['public']; ?></th>
            <th><?php echo $item['public']; ?></th>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
