<section class="panel">
    <div class="panel-body">
        <ul id="nav-mobile">
            <li><a class="waves-effect waves-light <?php if($this->uri->segment(2)=="editblog") { echo "active"; } ?>"  href="<?php echo site_url('site/editblog?id=').$before1; ?>">Blog Details</a></li>
            <li><a class="waves-effect waves-light <?php if($this->uri->segment(2)=="viewblogvideo") { echo "active"; } ?>" href="<?php echo site_url('site/viewblogvideo?id=').$before2; ?>">Blog Video</a></li>
            <li><a class="waves-effect waves-light <?php if($this->uri->segment(2)=="viewblogimages") { echo "active"; } ?>" href="<?php echo site_url('site/viewblogimages?id=').$before3; ?>">Blog Images</a></li>
        </ul>
    </div>
</section>