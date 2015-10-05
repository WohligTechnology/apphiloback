<section class="panel">
    <div class="panel-body">
        <ul id="nav-mobile">
            <li><a class="waves-effect waves-light <?php if($this->uri->segment(2)=="editvideogallery") { echo "active"; } ?>" href="<?php echo site_url('site/editvideogallery?id=').$before1; ?>">Video Details</a></li>
            <li><a class="waves-effect waves-light <?php if($this->uri->segment(2)=="viewvideogalleryvideo") { echo "active"; } ?>" href="<?php echo site_url('site/viewvideogalleryvideo?id=').$before2; ?>">Video Gallery Details</a></li>
        </ul>
    </div>
</section>