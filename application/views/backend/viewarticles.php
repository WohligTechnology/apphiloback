<div class="row">
    <div class="col s12">
        <h5 class="pad-left-15">Articles List</h5>
        <div class="col s12 drawchintantable">
            <table class="highlight">
                <thead>
                    <tr>
                        <th data-field="id">ID</th>
                        <th data-field="status">Status</th>
                        <th data-field="title">Title</th>
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
    <div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light red" href="<?php echo site_url("site/createarticles"); ?>"><i class="material-icons">add</i></a>
    </div>

</div>
<script>
    function drawtable(resultrow) {
        return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.status + "</td><td>" + resultrow.title + "</td><td>" + resultrow.timestamp + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light' href='<?php echo site_url('site/editarticles?id=');?>" + resultrow.id + "'><i class='material-icons propericon'>system_update_alt</i></a><a class='btn btn-danger btn-xs' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deletearticles?id='); ?>" + resultrow.id + "'><i class='material-icons propericon'>delete</i></i></a></td></tr>";
    }
    generatejquery('<?php echo $base_url;?>');
</script>