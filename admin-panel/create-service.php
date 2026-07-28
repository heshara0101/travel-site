<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main-content">
    <?php include 'includes/topbar.php'; ?>

    <div class="page-body">
        <div class="breadcrumb">
            <a href="index.php">Dashboard</a> / Create Services
        </div>

        <div class="card">
            <h3 class="card-title">Create Services</h3>

            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Enter Title">
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control">
                </div>

                <div class="form-group">
                    <label>Short Description</label>
                    <input type="text" class="form-control" placeholder="Enter Short Description">
                </div>

                <div class="form-group">
                    <label style="align-self: flex-start; margin-top: 10px;">Description</label>
                    <div style="flex-grow: 1;">
                        <textarea id="editor" name="description"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label></label>
                    <button type="button" class="btn-submit">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>