<?php
include "admin/config.php";
global $con;
?>
<!-- Our Room Area Start -->
<section class="roberto-rooms-area">
    <div class="rooms-slides owl-carousel">
        <!-- Single Room Slide -->
        <?
                            $sql4 = "select * from paket where chegirma !=null or chegirma > 0 limit 0,4";
                            $r4 = mysqli_query($con, $sql4);
                            while ($q4 = mysqli_fetch_array($r4, MYSQLI_ASSOC)) {
                                        ?>
                                <div class="single-room-slide d-flex align-items-center">
                                    <!-- Thumbnail -->
                                    <div class="room-thumbnail h-100 bg-img" style="background-image: url('./uploads/<?=$q4['photo'];?>');"></div>

                                    <!-- Content -->
                                    <div class="room-content">
                                        <h2 data-animation="fadeInUp" data-delay="100ms"><?=$q4['name_'.$lang];?></h2>
                                        <ul class="room-feature" data-animation="fadeInUp" data-delay="500ms" data-duration="2s">
                                            <li><span><i class="fa fa-check"></i> <?=$local_strings[$lang]['p4'];?></span><span>: <?=$q4['kun'];?></span></li>
                                            <li><span><i class="fa fa-check"></i> <?=$local_strings[$lang]['p5'];?></span><span>: <?=$q4['soni'];?></span></li>
                                            <li><span><i class="fa fa-check"></i> <?=$local_strings[$lang]['p6'];?></span><span>: <?=$q4['narx'];?></span></li>
                                        </ul>
                                        <a href="#" class="btn roberto-btn mt-30" data-animation="fadeInUp" data-delay="700ms" data-duration="2s"><?=$local_strings[$lang]['p7'];?></a>
                                    </div>
                                </div>
                                <?
                            }
        ?>
    </div>
</section>
<!-- Our Room Area End -->

