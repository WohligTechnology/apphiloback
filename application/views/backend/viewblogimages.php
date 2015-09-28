<div class="row">
    <div class="col s12">
        <h5 class="pad-left-15">Blogimages List</h5>
        <div class="col s12 drawchintantable">
            <table class="highlight">
                <thead>
                    <tr>
                        <th data-field="id">ID</th>
                        <th data-field="blog">Blog</th>
                        <th data-field="status">Status</th>
                        <th data-field="order">Order</th>
                        <th data-field="image">Image</th>
                        <th data-field="action">Action</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <?php $this->chintantable->createpagination();?>



    </div>
    <div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light red" href="<?php echo site_url("site/createblogimages?id=").$this->input->get('id');?>"><i class="material-icons">add</i></a>
    </div>

</div>
<script>
    function drawtable(resultrow) {
        var image = "<a href='<?php echo base_url('uploads').'/'; ?>" + resultrow.image + "' target='_blank'><img src='<?php echo base_url('uploads').'/'; ?>" + resultrow.image + "' width='80px' height='80px'></a>";
        if (resultrow.image == "") {
            image = "No Receipt Available";
        }
        return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.blog + "</td><td>" + resultrow.status + "</td><td>" + resultrow.order + "</td><td>" + image + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editblogimages?id=');?>" + resultrow.id + "&blogid=" + resultrow.blogid + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=return confirm(\"Are you sure you want to delete?\") href='<?php echo site_url('site/deleteblogimages?id='); ?>" + resultrow.id + "&blogid=" + resultrow.blogid + "'><i class='icon-trash '></i></a></td></tr>";
    }
    generatejquery('<?php echo $base_url;?>');
</script>