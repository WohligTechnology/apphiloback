<div class="row">
    <div class="col s12">
        <div class="col s12 drawchintantable">
           <?php $this->chintantable->createsearch("Blog List");?>
            <table class="highlight">
                <thead>
                    <tr>
                        <th data-field="id">ID</th>
                        <th data-field="name">Name</th>
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
    <div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light light-green accent-4" href="<?php echo site_url("site/createblog "); ?>"><i class="material-icons">add</i></a>
    </div>

</div>
<script>
    function drawtable(resultrow) {
        return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.title + "</td><td>" + resultrow.timestamp + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light orange lighten-1' href='<?php echo site_url('site/editblog?id=');?>" + resultrow.id + "'><i class='material-icons propericon'>system_update_alt</i></a><a class='btn btn-danger btn-xs waves-effect waves-light red' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deleteblog?id='); ?>" + resultrow.id + "'><i class='material-icons propericon'>delete</i></a></td></tr>";
    }
    generatejquery('<?php echo $base_url;?>');
</script>