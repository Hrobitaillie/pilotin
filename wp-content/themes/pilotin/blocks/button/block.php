<a class="button button-<?php echo block_field("variants")?> button-<?php echo block_field("size")?> <?php echo block_field("classes")?>" href="<?php block_field("link")?>"
    <?php if (block_field("target", false)) { echo 'target="_blank"';} ?>>
    <span><?php block_field("label")?></span>
    <i class="fa-solid fa-arrow-right"></i>
</a>