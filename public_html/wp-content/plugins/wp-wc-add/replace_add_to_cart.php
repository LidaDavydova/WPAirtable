<script type="text/javascript" src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    <style type="text/css">
        #block1 {
            display: block;
        }
        #block2 {
            display: none;
        }
        #block3 {
            display: none;
        }
        #wrapper {
        max-width: 2000px;
        position: relative;
        }

        .carousel {
        margin-top: 50px;
        margin-bottom: 50px;
        max-width: 2000px;
        overflow: auto;
        scroll-behavior: smooth;
        scrollbar-width: none;
        }

        .carousel::-webkit-scrollbar {
        height: 0;
        }

        #prev1, #prev2, #prev3,
        #next1, #next2, #next3 {
        display: flex;
        justify-content: center;
        align-content: center;
        background: white;
        border: none;
        padding: 8px;
        border-radius: 50%;
        outline: 0;
        cursor: pointer;
        position: absolute;
        }

        #prev1, #prev2, #prev3 {
        top: 50%;
        left: 0;
        transform: translate(50%, -50%);
        display: none;
        }

        #next1, #next2, #next3 {
        top: 50%;
        right: 0;
        transform: translate(-50%, -50%);
        }

        #content1, #content2, #content3 {
        display: grid;
        grid-gap: 16px;
        grid-auto-flow: column;
        margin: auto;
        box-sizing: border-box;
        }

        .item {
        width: 450px;
        height: 450px;
        background: green;
        }


    </style>

    <p>Элементы в комплекте</p>

    <button class="button addtocartbutton" id="button-all">Все</button>
    <button class="button addtocartbutton" id="button-common">Основные</button>
    <button class="button addtocartbutton" id="button-dop">Дополнительные</button>

    <div class="swiper" id="block1">
        <div id="wrapper">
        <div id="carousel1" class="carousel">
            <div id="content1">
                <?php
                    foreach ($result as $row)
                    {   
                        if ($row['type'] == 'Part of the set' || $row['type'] == 'Additional +$') {
                            ?>
                            <div>
                                <a href="<?=get_permalink($row['id_product'])?>" class="item"><?echo wp_get_attachment_image( wc_get_product( $row['id_product'] )->get_image_id());?>
                                
                                </a>
                                <h2 class="woocommerce-loop-product__title"><?echo wc_get_product( $row['id_product'] )->get_title();?></h2>
                                <a href="<?=get_permalink($row['id_product'])?>" data-quantity="1" class="button product_type_simple" data-product_id="<?=$row['id_product']?>" data-product_sku="" aria-label="Прочитайте больше о “Hugo Silva Wheels Toyota GT86”" rel="nofollow"> Подробнее</a>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
        <button id="prev1">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            >
            <path fill="none" d="M0 0h24v24H0V0z" />
            <path d="M15.61 7.41L14.2 6l-6 6 6 6 1.41-1.41L11.03 12l4.58-4.59z" />
            </svg>
        </button>
        <button id="next1">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            >
            <path fill="none" d="M0 0h24v24H0V0z" />
            <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
            </svg>
        </button>
        </div>
    </div>

    <div class="swiper" id="block2">
        <div id="wrapper">
            <div id="carousel2" class="carousel">
                <div id="content2">
                    <?php
                        foreach ($result as $row)
                        {   
                            if ($row['type'] == 'Part of the set') {
                                ?>
                                <div>
                                    <a href="<?=get_permalink($row['id_product'])?>" class="item"><?echo wp_get_attachment_image( wc_get_product( $row['id_product'] )->get_image_id());?>
                                    
                                    </a>
                                    <h2 class="woocommerce-loop-product__title"><?echo wc_get_product( $row['id_product'] )->get_title();?></h2>
                                    <a href="<?=get_permalink($row['id_product'])?>" data-quantity="1" class="button product_type_simple" data-product_id="<?=$row['id_product']?>" data-product_sku="" aria-label="Прочитайте больше о “Hugo Silva Wheels Toyota GT86”" rel="nofollow"> Подробнее</a>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <button id="prev2">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                >
                <path fill="none" d="M0 0h24v24H0V0z" />
                <path d="M15.61 7.41L14.2 6l-6 6 6 6 1.41-1.41L11.03 12l4.58-4.59z" />
                </svg>
            </button>
            <button id="next2">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                >
                <path fill="none" d="M0 0h24v24H0V0z" />
                <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
                </svg>
            </button>
        </div>
    </div>

    <div class="swiper" id="block3">
        <div id="wrapper">
            <div id="carousel3" class="carousel">
                <div id="content3">
                    <?php
                        foreach ($result as $row)
                        {   
                            if ($row['type'] == 'Additional +$') {
                                ?>
                                <div>
                                    <a href="<?=get_permalink($row['id_product'])?>" class="item"><?echo wp_get_attachment_image( wc_get_product( $row['id_product'] )->get_image_id());?>
                                    
                                    </a>
                                    <h2 class="woocommerce-loop-product__title"><?echo wc_get_product( $row['id_product'] )->get_title();?></h2>
                                    <a href="<?=get_permalink($row['id_product'])?>" data-quantity="1" class="button product_type_simple" data-product_id="<?=$row['id_product']?>" data-product_sku="" aria-label="Прочитайте больше о “Hugo Silva Wheels Toyota GT86”" rel="nofollow"> Подробнее</a>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <button id="prev3">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                >
                <path fill="none" d="M0 0h24v24H0V0z" />
                <path d="M15.61 7.41L14.2 6l-6 6 6 6 1.41-1.41L11.03 12l4.58-4.59z" />
                </svg>
            </button>
            <button id="next3">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                >
                <path fill="none" d="M0 0h24v24H0V0z" />
                <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
                </svg>
            </button>
        </div>
    </div>

    <script>
        $('#button-all').on('click',function(){
            $('#block1').css('display', 'block');
            $('#block2').css('display', 'none');
            $('#block3').css('display', 'none');
        });
        $('#button-common').on('click',function(){
            $('#block2').css('display', 'block');
            $('#block1').css('display', 'none');
            $('#block3').css('display', 'none');
        });
        $('#button-dop').on('click',function(){
            $('#block3').css('display', 'block');
            $('#block1').css('display', 'none');
            $('#block2').css('display', 'none');
        });

        const gap1 = 21;
        const gap2 = 21;
        const gap3 = 21;

        const carousel1 = document.getElementById("carousel1"),
        content1 = document.getElementById("content1"),
        next1 = document.getElementById("next1"),
        prev1 = document.getElementById("prev1");

        const carousel2 = document.getElementById("carousel2"),
        content2 = document.getElementById("content2"),
        next2 = document.getElementById("next2"),
        prev2 = document.getElementById("prev2");

        const carousel3 = document.getElementById("carousel3"),
        content3 = document.getElementById("content3"),
        next3 = document.getElementById("next3"),
        prev3 = document.getElementById("prev3");

        next1.addEventListener("click", e => {
        carousel1.scrollBy(width1 + gap1, 0);
        if (carousel1.scrollWidth !== 0) {
            prev1.style.display = "flex";
        }
        if (content.scrollWidth - width1 - gap1 <= carousel1.scrollLeft + width1) {
            next1.style.display = "none";
        }
        });

        next2.addEventListener("click", k => {
        carousel2.scrollBy(width2 + gap2, 0);
        if (carousel2.scrollWidth !== 0) {
            prev2.style.display = "flex";
        }
        if (content2.scrollWidth - width2 - gap2 <= carousel2.scrollLeft + width2) {
            next2.style.display = "none";
        }
        });

        next3.addEventListener("click", p => {
        carousel3.scrollBy(width3 + gap3, 0);
        if (carousel3.scrollWidth !== 0) {
            prev.style.display = "flex";
        }
        if (content3.scrollWidth - width3 - gap3 <= carousel3.scrollLeft + width3) {
            next3.style.display = "none";
        }
        });

        prev1.addEventListener("click", e => {
        carousel1.scrollBy(-(width1 + gap1), 0);
        if (carousel1.scrollLeft - width1 - gap1 <= 0) {
            prev1.style.display = "none";
        }
        if (!content1.scrollWidth - width1 - gap1 <= carousel1.scrollLeft + width1) {
            next1.style.display = "flex";
        }
        });

        prev2.addEventListener("click", k => {
        carousel2.scrollBy(-(width2 + gap2), 0);
        if (carousel2.scrollLeft - width2 - gap2 <= 0) {
            prev2.style.display = "none";
        }
        if (!content2.scrollWidth - width2 - gap2 <= carousel2.scrollLeft + width2) {
            next2.style.display = "flex";
        }
        });

        prev3.addEventListener("click", p => {
        carousel3.scrollBy(-(width3 + gap3), 0);
        if (carousel3.scrollLeft - width3 - gap3 <= 0) {
            prev3.style.display = "none";
        }
        if (!content3.scrollWidth - width3 - gap3 <= carousel3.scrollLeft + width3) {
            next3.style.display = "flex";
        }
        });

        let width1 = carousel1.offsetWidth;
        window.addEventListener("resize", e => (width1 = carousel1.offsetWidth));
        
        let width2 = carousel2.offsetWidth;
        window.addEventListener("resize", k => (width2 = carousel2.offsetWidth));

        let width3 = carousel3.offsetWidth;
        window.addEventListener("resize", p => (width3 = carousel3.offsetWidth));
    </script>