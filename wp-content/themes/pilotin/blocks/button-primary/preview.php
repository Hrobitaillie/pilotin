<a class="button-primary button-<?php echo block_field("size")?>" href="<?php block_field("link")?>"
    <?php if (block_field("target", false)) { echo 'target="_blank"';} ?>>
    <span><?php block_field("label")?></span>
    <i class="fa-solid fa-arrow-right"></i>
</a>
<style>
    .button-primary {
	 background-color: #26c1d9;
	 border: 1px solid #26c1d9;
	 border-radius: 25px;
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 gap: 0;
	 transition: all 300ms ease-in-out;
    }
    .button-primary a {
        color: #072038;
        text-decoration: none;
    }
    .button-primary i {
        max-width: 0;
        opacity: 0;
        transition: all 300ms ease-in-out;
    }
    .button-primary:hover {
        gap: 8px;
    }
    .button-primary:hover i {
        opacity: 1;
        max-width: 25px;
    }
    .button-lg {
        padding: 12px 16px;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 24px;
        text-decoration: none;
    }
 
</style>