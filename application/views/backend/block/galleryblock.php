<section class="panel">
    <div class="panel-body">
        <ul id="nav-mobile">
            <li><a class="waves-effect waves-light <?php if($this->uri->segment(2)=="editgallery") { echo "active"; } ?>" href="<?php echo site_url('site/editgallery?id=').$before1; ?>">Gallery Details</a></li>
            <li><a class="waves-effect waves-light <?php if($this->uri->segment(2)=="viewgalleryimage" || $this->uri->segment(2)=="editgalleryimage"  || $this->uri->segment(2)=="creategalleryimage") { echo "active"; } ?>" href="<?php echo site_url('site/viewgalleryimage?id=').$before2; ?>">Gallery Image</a></li>
        </ul>
    </div>
</section>