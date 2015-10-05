<div class="row">
    <div class="col s12">
        <div class="row">
            <div class="col s12 drawchintantable">
               <?php $this->chintantable->createsearch("List of Event Video");?>
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                               <th data-field="id">ID</th>
            <!--                                    <th data-field="event">Event</th>-->
                                        <th data-field="url">Url</th>
                                        <th data-field="status">Status</th>
            <!--                                    <th data-field="order">Order</th>-->
                                        <th data-field="action">Action</th>
            
                        </tr>
                    </thead>
                    <tbody>
            
                    </tbody>
                </table>
            </div>
        </div>
        <?php $this->chintantable->createpagination();?>



    </div>
    <div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light blue darken-4 tooltipped" href="<?php echo site_url("site/createeventvideo?id=").$this->input->get('id');?>"data-position="top" data-delay="50" data-tooltip="Create"><i class="material-icons">add</i></a>
    </div>

</div>
<script>
    function drawtable(resultrow) {
           return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.url + "</td><td>" + resultrow.status + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/editeventvideo?id=');?>" + resultrow.id + "&eventid=" + resultrow.eventid + "'><i class='fa fa-pencil-square propericon'></i></a><a class='btn btn-danger btn-xs waves-effect waves-light red pad10 z-depth-0 less-pad' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deleteeventvideo?id='); ?>" + resultrow.id + "&eventid=" + resultrow.eventid + "'><i class='material-icons propericon'>delete</i></a></td></tr>";
    }
    generatejquery('<?php echo $base_url;?>');
</script>