<?php get_header(); ?>
<main id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header" style="display: none;">
    <h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</header>
<div class="entry-content" itemprop="mainContentOfPage">
<script>
        const menu_main_menu = document.getElementById('menu-main_menu');
        menu_main_menu.classList.add('div-center');
    </script>
    <script>
        var instances_sidenav;
        document.addEventListener("DOMContentLoaded", function(){
            M.AutoInit();
            createBtnMore();
            createProduct();
            eventsMainItem();
            
            var swiper = new Swiper(".swiper-container", {
                slidesPerView: 4,
                spaceBetween: 0,
                pagination: {
                el: ".swiper-pagination",
                clickable: true,
                },
            });

            var swiper = new Swiper(".swiper-container-med", {
                slidesPerView: 2,
                spaceBetween: 0,
                pagination: {
                el: ".swiper-pagination-med",
                clickable: true,
                },
            });

            var swiper = new Swiper(".swiper-container-small", {
                slidesPerView: 1,
                spaceBetween: 0,
                pagination: {
                el: ".swiper-pagination-small",
                clickable: true,
                },
            });
        });

        function topPage(){
            console.log("SCROLL TOP = 0");
            scroll({
                top: 0,
                behavior: "smooth"
            });
        }

        function eventsMainItem() {
            var menu_item=document.getElementsByClassName('menu-item');

            for(var i=0; i<=menu_item.length-1; i++){
                menu_item[i].firstChild.classList.add('sidenav-close');
            }
        }

        function createBtnMore(){
            var sol_info = document.getElementsByClassName('sol-info');
            var info_gradient = document.getElementsByClassName('info-gradient');

            for(var i=0; i<=sol_info.length-1; i++){
                sol_info[i].id="sol-info-"+i;
                info_gradient[i].id="info-gradient-"+i;
            }
        }

        function viewMore(id){
            var sol_info=document.getElementById('sol-info-'+id);
            var info_gradient=document.getElementById('info-gradient-'+id);

            console.log("element: "+sol_info.innerHTML);
            sol_info.classList.add('sol-info-more');
            info_gradient.classList.remove('info-gradient'); info_gradient.classList.add('info-gradient-more');

            var elem_icon_remove=document.getElementsByClassName('elem-icon-remove');
            elem_icon_remove[id].classList.remove('icon-remove-90deg');
            
            var btn_more=document.getElementsByClassName('btn-more');
            btn_more[id].removeAttribute("onclick"); btn_more[id].setAttribute('onclick','hideInfo('+id+')');
        }

        function hideInfo(id){
            var sol_info=document.getElementById('sol-info-'+id);
            var info_gradient=document.getElementById('info-gradient-'+id);

            sol_info.classList.remove('sol-info-more');
            info_gradient.classList.remove('info-gradient-more'); info_gradient.classList.add('info-gradient');

            var elem_icon_remove=document.getElementsByClassName('elem-icon-remove');
            elem_icon_remove[id].classList.add('icon-remove-90deg');
            
            var btn_more=document.getElementsByClassName('btn-more');
            btn_more[id].removeAttribute("onclick"); btn_more[id].setAttribute('onclick','viewMore('+id+')');
        }

        function createProduct(){
            
            var swiper_wrapper_large=document.querySelector('.swiper-wrapper-large');
            var swiper_wrapper_med=document.querySelector('.swiper-wrapper-med');
            var swiper_wrapper_small=document.querySelector('.swiper-wrapper-small');

            var figure_img = document.getElementsByClassName('img-product-sol');
            var h2_title = document.getElementsByClassName('title-product-sol');
            var p_desc = document.getElementsByClassName('desc-product-sol');

            let img_elems=[];
            let div_img_elems=document.createElement('div'); div_img_elems.classList.add('container-img-product','hide')

            for(var i=0; i<=figure_img.length-1; i++){
                img_elems.push(figure_img[i].innerHTML);
                div_img_elems.insertAdjacentHTML( 'beforeend', img_elems[i]);

                if(i>=figure_img.length-1){
                    console.log(div_img_elems.innerHTML);

                    for(var j=0; j<=figure_img.length-1; j++){
                        figure_img[j].style.display="none";
                        h2_title[j].style.display="none";
                        p_desc[j].style.display="none";

                        let list_src_img=div_img_elems.getElementsByTagName('img');
        
                        let div_swiper_slide = document.createElement("div"); div_swiper_slide.classList.add("swiper-slide","col","s3","px-producto");
                        let h6_title=document.createElement("h6"); h6_title.classList.add("font-title-producto"); h6_title.innerHTML=h2_title[j].innerHTML;
                        let p_desc_product=document.createElement("p"); p_desc_product.classList.add("font-body-producto"); p_desc_product.innerHTML=p_desc[j].innerHTML;
                        let img_product=document.createElement("img"); img_product.classList.add("w100"); img_product.src=list_src_img[j].src;

                        div_swiper_slide.appendChild(h6_title);
                        div_swiper_slide.appendChild(p_desc_product);
                        div_swiper_slide.appendChild(img_product);

                        swiper_wrapper_large.appendChild(div_swiper_slide);
                    }
                }
            }

            for(var i=0; i<=figure_img.length-1; i++){
                img_elems.push(figure_img[i].innerHTML);
                div_img_elems.insertAdjacentHTML( 'beforeend', img_elems[i]);

                if(i>=figure_img.length-1){
                    console.log(div_img_elems.innerHTML);

                    for(var j=0; j<=figure_img.length-1; j++){
                        figure_img[j].style.display="none";
                        h2_title[j].style.display="none";
                        p_desc[j].style.display="none";

                        let list_src_img=div_img_elems.getElementsByTagName('img');
        
                        let div_swiper_slide = document.createElement("div"); div_swiper_slide.classList.add("swiper-slide","col","s3","px-producto");
                        let h6_title=document.createElement("h6"); h6_title.classList.add("font-title-producto"); h6_title.innerHTML=h2_title[j].innerHTML;
                        let p_desc_product=document.createElement("p"); p_desc_product.classList.add("font-body-producto"); p_desc_product.innerHTML=p_desc[j].innerHTML;
                        let img_product=document.createElement("img"); img_product.classList.add("w100"); img_product.src=list_src_img[j].src;

                        div_swiper_slide.appendChild(h6_title);
                        div_swiper_slide.appendChild(p_desc_product);
                        div_swiper_slide.appendChild(img_product);

                        swiper_wrapper_med.appendChild(div_swiper_slide);
                    }
                }
            }
            for(var i=0; i<=figure_img.length-1; i++){
                img_elems.push(figure_img[i].innerHTML);
                div_img_elems.insertAdjacentHTML( 'beforeend', img_elems[i]);

                if(i>=figure_img.length-1){
                    console.log(div_img_elems.innerHTML);

                    for(var j=0; j<=figure_img.length-1; j++){
                        figure_img[j].style.display="none";
                        h2_title[j].style.display="none";
                        p_desc[j].style.display="none";

                        let list_src_img=div_img_elems.getElementsByTagName('img');
        
                        let div_swiper_slide = document.createElement("div"); div_swiper_slide.classList.add("swiper-slide","col","s3","px-producto");
                        let h6_title=document.createElement("h6"); h6_title.classList.add("font-title-producto"); h6_title.innerHTML=h2_title[j].innerHTML;
                        let p_desc_product=document.createElement("p"); p_desc_product.classList.add("font-body-producto"); p_desc_product.innerHTML=p_desc[j].innerHTML;
                        let img_product=document.createElement("img"); img_product.classList.add("w100"); img_product.src=list_src_img[j].src;

                        div_swiper_slide.appendChild(h6_title);
                        div_swiper_slide.appendChild(p_desc_product);
                        div_swiper_slide.appendChild(img_product);

                        swiper_wrapper_small.appendChild(div_swiper_slide);
                    }
                }
            }
        }

    </script>
    <div class="container-sol">
        <div class="fixed-action-btn" onclick="topPage()">
            <a class="btn-floating btn-large black waves-effect waves-light">
                <i class="large material-icons up-btn">keyboard_arrow_up</i>
            </a>
        </div>
        <div class="row">
            <div class="col s6">
                <h1 class="font-sol-leon">SOL<br>LEÓN</h1>
                <h1 class="font-sol-frase">
                    <span class="comilla">“</span>
                    <span style="font-weight: 600;">Por qué tú tambien mereces</span>
                    <br>
                    <span class="frase-italic">&nbsp;&nbsp;&nbsp;una figura perfecta.</span>
                    <span class="comilla">”</span>
                </h1>
            </div>
            <img class="col s6" src="https://cdn.shopify.com/s/files/1/0300/5926/6141/files/sol_leon.png?v=1628872648" alt="">
        </div>
        <div class="row px sol-info">
            <div class="info-gradient">
                <div class="btn-more" onclick="viewMore(0)">
                    <i class="material-icons icon-remove">remove</i>
                    <i class="material-icons icon-remove elem-icon-remove icon-remove-90deg">remove</i>
                </div>
            </div>
            <h4 class="font-title" id="biografia">BIOGRAFÍA</h4>
            <p class="font-body">
                Sol León, es una exitosa emprendedora en el área de la moda, especialista en prendas de moldeo con reconocimiento mundial y que fundó su propia empresa, Sol Beauty and Care, en 2018.
                <br><br>
                Marisol López León nació en el seno de una familia trabajadora en Culiacán, Sinaloa. Desde los 7 años mostró gusto y habilidad para los negocios gracias a la mentalidad visionaria que 
                le inculcó su padre, EPD. A los trece años, Sol León descubrió el mundo de las prendas de moldeo y se convirtió en una consumidora ávida de dichas prendas. Era tan grande su gusto 
                que desde entonces empezó a coleccionar y usar todo tipo de fajas de distintas marcas. 
                <br><br>
                En el mismo año, mientras estudiaba la secundaria, Sol León tenía  una clase de corte y confección, donde aprendió a usar una máquina de coser. Fue en ese momento cuando comenzó a 
                modificar sus propias  fajas,  siempre preguntándose ¿Por qué NO existe una faja para mujeres con mi tipo de cuerpo?. Ella siempre ha sido una mujer muy curvilínea, debido a eso nunca 
                pudo encontrar una faja que le ajustara del todo bien a su silueta tan particular. Fue entonces  que, sin imaginar el futuro que le esperaba, siendo tan solo una adolescente comenzó la 
                creación de su famosa faja RELOJ DE ARENA.
                <br><br>
                A los dieciocho años tuvo a su primera hija, Miranda; 5 años después tuvo a su segunda hija Luciana. Durante esa época Sol León, seguía trabajando en la búsqueda de cada elemento para 
                la creación de su exclusiva línea de fajas de moldeo. En el  periodo 2016 - 2018 , Sol León viajó a Colombia para iniciar con el desarrollo de  “La faja Perfecta”. Fue a finales del 2017 
                cuando  culminó la elaboracion de su primera faja. Apoyada y motivada por su esposo, en febrero del 2018 finalmente logró iniciar la producción y comercialización de su propia marca de 
                prendas de moldeo llamado “Sol Beauty and Care”. En 2019 la joven empresa  despegó a nivel global.
                <br><br>
                Actualmente Sol León se dedica a revolucionar las prendas que su empresa realiza, creando además de fajas, innovadoras prendas de moda  con moldeo inteligente integrado.
            </p>
        </div>
        <div class="row px sol-info" style="padding-bottom: 2.5%;">
            <div class="info-gradient">
                <div class="btn-more" onclick="viewMore(1)">
                    <i class="material-icons icon-remove">remove</i>
                    <i class="material-icons icon-remove elem-icon-remove icon-remove-90deg">remove</i>
                </div>
            </div>
            <h4 class="font-title" id="trayectoria">TRAYECTORIA</h4>
            <p class="font-body">
                A los 29 años decidió emprender en el mundo de la moda, especializándose  en prendas de moldeo, convirtiéndose así en una reconocida creadora a nivel internacional. Su primera prenda 
                (cinturilla de Sol Beauty and Care) se realizó en 2018.
                <br><br>
                Tanto fue su éxito que desde el 2018, la marca se comercializa en los 5 continentes, ha llegado a más 46 países y actualmente cuenta con 22 boutiques ubicadas en Estados Unidos de América y México.
                <br><br><br>
                &emsp;• En 2019, presentó su linea deportiva con gran éxito.
                <br><br>
                &emsp;• En 2020, presentó su línea  de Jeans, de la cual fue un éxito total.
                <br><br>
                &emsp;• En 2021 presentó su línea de swimwear que también fue todo un éxito.
                <br><br>
                &emsp;• En 2021 presentó la innovadora línea de prendas de moldeo exteriores,  iniciándola con el increíble LUXURY BOOTY que, cómo era de esperarse, se sumó a la lista de éxitos en su carrera en la 
                industria de el moldeo.
                <br><br><br>
                Sol León actualmente ha posicionado a Sol Beauty and Care como una marca de lujo y moldeo. Por esta razón, las redes sociales de Sol León y Sol Beauty and Care, junto con  su equipo de influencers 
                han llegado a 35 millones de personas (@solleon21).
                <br><br>
                A través del tiempo, Sol León ha desarrollado distintas prendas que se han reconocido a nivel internacional. Actualmente lleva creadas más de 100 prendas de moldeo, causando un revuelo internacional, 
                destacando la icónica faja RELOJ DE ARENA, única faja en el mundo con 81 tallas disponibles por modelo (media pierna, rodilla, negra, beige, etc.).
                <br><br>
                Tal como la joven adolescente de 13 años un día lo soñó y lo creó, hoy ya  existe una faja para mujeres con su tipo de cuerpo.
            </p>
        </div>
        <img class="row w100" src="https://cdn.shopify.com/s/files/1/0300/5926/6141/files/modelos.png?v=1628872648" alt="">
        <div class="row px sol-info" style="padding-bottom: 2.5%;">
            <div class="info-gradient">
                <div class="btn-more" onclick="viewMore(2)">
                    <i class="material-icons icon-remove">remove</i>
                    <i class="material-icons icon-remove elem-icon-remove icon-remove-90deg">remove</i>
                </div>
            </div>
            <h4 class="font-title" id="prenda_moldeo">PRENDAS DE MOLDEO</h4>
            <p class="font-body">Is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 
                1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of 
                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including 
                versions of Lorem Ipsum. Is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard 
                dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has 
                survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 
                1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like 
                Aldus PageMaker including versions of Lorem Ipsum.
                Is simply dummy text of the printing and typesetting industry. Lorem IpLetraset sheets containing Lorem Ipsum passages, and more 
                recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        <iframe class="px frame-video" src="https://www.youtube-nocookie.com/embed/l39i3-VG5Rs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <div id="productos">
            <div class="swiper-container row hide-on-med-and-down">
                <div class="swiper-wrapper swiper-wrapper-large row">
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="swiper-container-med row hide-on-large-only hide-on-small-and-down">
                <div class="swiper-wrapper swiper-wrapper-med row">
                </div>
                <div class="swiper-pagination-med"></div>
            </div>
            <div class="swiper-container-small row hide-on-med-and-up">
                <div class="swiper-wrapper swiper-wrapper-small row">
                </div>
                <div class="swiper-pagination-small"></div>
            </div>
        </div>
        <div class="row div-center div-firma">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 841.58 512">
                <path class="firma" d="M273,136s14.67-20,22.42-51-3.1-48.07-3.1-48.07-10.85-18.6-38.76-10.85S199.3,55.52,199.3,55.52s-34.11,29.46-41.86,62c-4.65,19.55-5.06,31.78-3.23,43.23,3,18.93,18.45,38.16,18.45,38.16,10.88,15.93,26.86,41.66,31.3,61.25,0,0,9.3,43.41-1.55,80.62s-38.77,80.63-38.77,80.63-24.8,34.11-60.46,58.92-57.37,17-57.37,17-17.06,0-24.81-21.71c-4.13-11.57-.24-31.62,5-47.61,31.75-97.42,120.62-140,120.62-140s40.35-21.71,86.84-23.26a546.64,546.64,0,0,0,83.71-9.3l21.77-6.36,13.89-4.49,4.65-1.55,6.2-3.11,4.66-4.65s13.95-17.05,24.8-15.5,9.31,17,9.31,17S401,261,384.32,294.72,349.26,331.84,342,326.85c-15.47-10.57,1.55-51.16,1.55-51.16s6.2-20.16,17.05-32.56l1.23-.19s-11.91,20.24,4.75,28.72,44,8.18,44,8.18,31,2,70.9-26.09,75.49-72.35,75.49-72.35,33.23-41.1,56.23-92,27-56.63,25.35-74.83-46,41.51-46,41.51S550.34,117,532.35,162.38c0,0-33,60.42-43.76,127.89s66.25,25.45,66.25,25.45,45.62-21.88,108.91-86.24"/>
                <path class="labio" d="M750.46,293.15a58.9,58.9,0,0,1-23.37-4.72,83.19,83.19,0,0,0-25.84-6.29c-6.68-.57-7.35-2.06-3.83-7.85,4.12-6.77,8.68-13.18,14.84-18.34a51.17,51.17,0,0,0,6.76-6.81,28.63,28.63,0,0,1,24.21-10.8c14.58.67,25.25-5.27,33.8-16.36,1.81-2.34,3.8-4.56,5.8-6.75,3.95-4.34,8.85-7.55,14.6-8.14,6.77-.71,12.78-3.64,19.22-5.23,1.91-.47,3.71-1.41,5.61-1.92,4.32-1.15,5.82,0,4.65,4.27-2.16,7.86-4.7,15.62-7.22,23.37-2.91,8.92-6.06,17.77-9,26.7A42.56,42.56,0,0,1,799.11,273C785.31,285.58,769.25,293,750.46,293.15Z"/>
                <path class="labio" d="M774.84,174.92c13.22.52,26,3.78,38.83,6.32,3.39.67,6.8,1.34,10.15,2.2,3.07.8,3.7,3,1.68,5.45a7.24,7.24,0,0,1-1.68,1.43c-9.94,6.52-20,12.67-32.31,13.77-5.17.46-10.29,1.46-15.45,2.12-6.91.88-11.78,4.81-15.59,10.29-1.55,2.22-2.76,4.68-4.21,7-2.48,3.91-5.66,6.6-10.55,7.36a95.67,95.67,0,0,0-12.91,3.35c-5.85,1.81-10.4,5.55-14.32,10.15-8,9.4-17.57,16.59-29.37,20.6-.7.24-1.36.6-2.07.83-.94.3-1.94.56-2.75-.3a2.31,2.31,0,0,1-.08-2.73,148.6,148.6,0,0,0,6.56-16.52c2.87-8.14,6.12-16.16,9.36-24.17a67.87,67.87,0,0,1,10.78-17.64c3.72-4.48,8.5-7.55,14.58-7.91,7.41-.46,13.4-3.6,17.47-9.78,4.62-7,11.16-10.16,19.31-10.67C766.47,175.78,770.65,175.3,774.84,174.92Z"/>
            </svg>
        </div>
    </div>
<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</div>
</article>
<?php if ( comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>