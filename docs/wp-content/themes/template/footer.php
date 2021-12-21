    <footer>
        <div class="container footer-container">
            <div class="footer-folder-main" itemscope itemtype="http://schema.org/Organization">
                <a class="logo" href="/">Бизнес-комплекс на русаковской</a>
                <div class="footer-folder-main-address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <a href="geo:55.784405,37.673421">
                        <span itemprop="postalCode">107140</span>,
                        <span itemprop="addressLocality">г. Москва</span>,
                        <span itemprop="streetAddress">ул. Русаковская, д.13</span>
                    </a>
                </div>
                <div class="footer-folder-main-contacts">
                    <div class="footer-folder-main-contact" itemprop="telephone"><a href="tel:+74994018888">+7 (499) 401-88-88</a></div>
                    <div class="footer-folder-main-contact" itemprop="email"><a href="mailto:info@bcrsk.ru">info@bcrsk.ru</a></div>
                </div>
            </div>
            <!-- <div class="hr filter-white"><div></div></div> -->
        </div>
    </footer>
    <section id="modals">
        <div class="modal-overlay"></div>
        <div class="modal-container" id="modal-offer">
            <div class="modal-close">✕</div>
            <h3 class="modal-title">Оставить заявку на оформление</h3>
            <div class="modal-form">
                <form action="" class="modal-form-inputs">
                  <input type="text" placeholder="Как к вам обращаться *" required name="name" class="modal-form-input">
                  <input type="tel" placeholder="Номер телефона *" required name="phone" class="modal-form-input">
                  <input type="email" placeholder="Адрес электронной почты" name="email" class="modal-form-input">
                  <textarea placeholder="Комментарий" name="text" class="modal-form-input"></textarea>
                  <button class="modal-form-button">Отправить заявку</button>
                </form>
            </div>
        </div>
        <div class="modal-container" id="modal-success">
            <div class="modal-close">✕</div>
            <div class="modal-success-response">Спасибо, что оставили заявку, наши специалисты свяжутся с вами в ближайшее время</div>
        </div>
    </section>
        <script src="https://api-maps.yandex.ru/2.1/?apikey=1a62ef6e-4c38-4d02-84ec-ff7cf5082432&lang=ru_RU" type="text/javascript"></script>
        <script src="<?php echo get_template_directory_uri() ?>/js/swiper-bundle.min.js"></script>
        <script src="<?php echo get_template_directory_uri() ?>/js/lightgallery.umd.min.js"></script>
        <script>
             let swiper = new Swiper(".swiper-clients", {
                slidesPerView: 5,
                spaceBetween: 30,
                slidesPerGroup: 1,
                loop: true,
                loopFillGroupWithBlank: true,
                navigation: {
                  nextEl: ".swiper-button-next",
                  prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                  320: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                  },
                  640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                  },
                  768: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                  },
                  1024: {
                    slidesPerView: 5,
                    spaceBetween: 50,
                  },
                },
              });
            const mapOverlay = document.querySelector('.map-overlay');
            mapOverlay.addEventListener('click', () => {
                mapOverlay.classList.add('hide');
            })
            const profits = document.querySelectorAll('.main-profits-folder')
            profits.forEach((el) => {
                el.addEventListener('click', () => {
                    el.classList.add('active')
                })
            })

            const contactForm = document.querySelector('#contact-form')
            const contactFormInputs = document.querySelectorAll('#contact-form input.contacts-form-input')
            const submitButton = document.querySelector('.contacts-form-submit')

            contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
                let response = await fetch('/send-message.php', {
                  method: 'POST',
                  body: new FormData(contactForm)
                });
                let result = await response.json();
                if (result.status === '200') {
                    contactFormInputs.forEach(el => {
                        el.value = ''
                    })
                    submitButton.disabled = true;
                    submitButton.value = 'Сообщение отправлено'
                    submitButton.classList.add('inactive')
                } else {
                    console.log('Something wrong')
                }
            });
            lightGallery(document.getElementById('office-list'), {
                selector: '.thumbnail-item',
                controls: false,
                animateThumb: false,
                zoomFromOrigin: false,
                allowMediaOverlap: true,
                toggleThumb: true,
            });

        </script>
        <?php wp_footer(); ?>
       <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(86949849, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/86949849" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
    </body>
</html>
