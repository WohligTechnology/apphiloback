<div class="row">
    <div class="col s12">
        <h5 class="pad-left-15">Notification List</h5>
        <div class="col s12 drawchintantable">
            <table class="highlight">
                <thead>
                    <tr>
                        <th data-field="id">ID</th>
                        <th data-field="videogallery">Video Gallery</th>
                        <th data-field="event">event</th>
<!--                        <th data-field="article">article</th>-->
                        <th data-field="status">Status</th>
                        <th data-field="image">Image</th>
                        <th data-field="timestamp">Timestamp</th>
                        <th data-field="action">Action</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <?php $this->chintantable->createpagination();?>



    </div>
    <div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light light-green accent-4" href="<?php echo site_url("site/createnotification "); ?>"><i class="material-icons">add</i></a>
    </div>

</div>
<script>
    function drawtable(resultrow) {
        var image = "<a href='<?php echo base_url('uploads').'/'; ?>" + resultrow.image + "' target='_blank'><img src='<?php echo base_url('uploads').'/'; ?>" + resultrow.image + "' width='80px' height='80px'></a>";
        if (resultrow.image == "") {
            image = "No Receipt Available";
        }
        return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.videogallery + "</td><td>" + resultrow.event + "</td><td>" + resultrow.status + "</td><td>" + image + "</td><td>" + resultrow.timestamp + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light' href='<?php echo site_url('site/editnotification?id=');?>" + resultrow.id + "'><i class='material-icons propericon'>system_update_alt</i></a><a class='btn btn-danger btn-xs waves-effect waves-light' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deletenotification?id='); ?>" + resultrow.id + "'><i class='material-icons propericon'>delete</i></a></td></tr>";
    }
    generatejquery('<?php echo $base_url;?>');
</script>