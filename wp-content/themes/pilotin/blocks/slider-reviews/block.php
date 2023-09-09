<?php
    $args = array(
        'post_type' => 'slide-review',
        'posts_per_page' => -1,
    );

    $reviews = get_posts($args);
    // echo json_encode(get_fields($review -> ID)); die; 

?>

<section id="slider-reviews">
    <div class="videos-container">
        <div class="videos-slider">
            <?php 
                foreach ($reviews as $key => $review) {
                    echo get_field("media", $review -> ID);
                }
            ?>
        </div>
    </div>
    <div class="gradient">
        <div class="col left">
            <div class="play-button">
                <i class="fa-solid fa-play toggle"></i>
                <i class="fa-solid fa-pause"></i>
            </div>
        </div>
        <div class="col right"></div>
    </div>
    <div class="review-container">
        <div class="review-box">
            <div class="review-slider">
                <?php 
                    foreach ($reviews as $key => $review) {
                        ?>
                            <article data-id="<?php echo $key ?>">
                                    <img src="<?php echo get_field("client_logo", $review -> ID); ?>" alt="">
                                    <h5><?php echo get_field("client_name", $review -> ID); ?> </h5>
                                    <h4>
                                        <?php echo get_field("review_body", $review -> ID); ?>
                                    </h4>
                            </article>
                        <?php
                    }
                ?>
            </div>
        </div>
        <div class="controls">
            <div class="arrows">
                <div class="arrow left">
                    <i class="fa-solid fa-arrow-left"></i>
                </div>
                <div class="arrow right">
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
            </div>
            <div class="dots">
                <?php 
                    foreach ($reviews as $key => $review) {
                        ?>
                            <div class="dot<?php if($key == 0) echo " active"  ?>" data-id="<?php echo $key ?>"></div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

    const sliderReviews = document.querySelector("#slider-reviews")
    let slider = sliderReviews.querySelector(".review-slider")
    const articles = sliderReviews.querySelectorAll("article")

    const videos = sliderReviews.querySelectorAll("iframe")

    const arrows = sliderReviews.querySelectorAll(".arrow")
    const dots = sliderReviews.querySelectorAll(".dot")
    let slideSize;
    let currentIndex = 0
    const maxIndex = articles.length -1
    let allowShift = true;
    resizeArticles()

    window.addEventListener("resize", () => resizeArticles())

    function resizeArticles(){
        const sliderWidth = sliderReviews.offsetWidth

        articles.forEach(element => {
            element.style.maxWidth = (sliderWidth / 2) - 128 + "px"
        });
    }

    arrows.forEach(arrow => {
        arrow.addEventListener("click", (e) => handleArrowClick(e))
    });

    function handleArrowClick(e){
        console.log(e.target);
        if (e.target.classList.contains("right")) {
            slideRight()
        }
        if (e.target.classList.contains("left")) {
            slideLeft()
        }
    }

    function slideRight(){
        if (currentIndex == maxIndex) {
            move(articles, 0);
            move(videos, 0);

            currentIndex = 0;

        }else{
            move(articles, currentIndex + 1);
            move(videos, currentIndex + 1);
            currentIndex ++

        }
    }

    function slideLeft(){
        if (currentIndex == 0) {
            move(articles, articles.length-1);
            move(videos, articles.length-1);

            currentIndex = articles.length-1;

        }else{
            move(articles, currentIndex - 1);
            move(videos, currentIndex - 1);
            currentIndex --

        }
    }

    function move(elements, index){
        elements.forEach(element => {
                element.style.transform = `translateX(-${index}00%)`
        });
        dots.forEach(element => {
            element.classList.remove("active")
        });
        dots[index].classList.add("active")
    }



    const playButton = sliderReviews.querySelector(".play-button")
    const playIcon = playButton.querySelector(".fa-play")
    const pauseIcon = playButton.querySelector(".fa-pause")

    playButton.addEventListener("click", () => toggleVideo())

    function toggleVideo(){

        playIcon.classList.toggle("toggle")
        pauseIcon.classList.toggle("toggle")

        document.querySelector(".gradient .col.left").classList.toggle("active")
        document.querySelector(".gradient .col.right").classList.toggle("inactive")
        document.querySelector(".review-container").classList.toggle("active")

        
        

    }
</script>