<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/6297452530.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>

<script>
    $(".testmonial_slider_area").owlCarousel({
        autoplay: true,
        slideSpeed: 1000,
        autoplayTimeout:2000,
        items: 3,
        loop: true,
        nav: true,
        navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
        margin: 2,
        dots: true,
        responsive: {
            320: {
                items: 1
            },
            767: {
                items: 2
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }

    });
</script>

<script>
    $(".gallery_slider_area").owlCarousel({
        autoplay: true,
        slideSpeed: 1000,
        autoplayTimeout:2000,
        items: 3,
        loop: true,
        nav: true,
        navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
        margin: 10,
        dots: true,
        responsive: {
            320: {
                items: 1
            },
            767: {
                items: 2
            },
            600: {
                items: 2
            },
            1000: {
                items:4
            }
        }

    });
</script>

<script>
    $(".work_slider_area").owlCarousel({
        autoplay: true,
        slideSpeed: 1000,
        autoplayTimeout:2000,
        items: 4,
        loop: true,
        nav: true,
        navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
        margin: 10,
        dots: true,
        responsive: {
            320: {
                items: 1
            },
            767: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }

    });
</script>

<!-- // Add active class to the current menu in header (highlight it) -->
<script>
    const currentlink = location.href;
    const menuitems = document.getElementsByClassName('nav-link');
    // console.log(menuitems);
    for (let i = 0; i < menuitems.length; i++) {
        if (menuitems[i].href === currentlink) {
            menuitems[i].className = "current";
        }
    }
</script>

<!-- ----------------------location--------------------------- -->
<script>
    function myloc(){
        location.href ="https://goo.gl/maps/FWQjmHDVSgSBcCGL9";
    }
    function callNow(){
        location.href ="tel:919522299988";
    }
    function mailNow(){
        location.href ="mailto:connect.completehome@gmail.com";
    }
</script>

<!-- ------------------------------video_popup------------------------ -->

<script>
    $(function() {
        $('.popup').magnificPopup({
            // disableOn: 700,
            type: 'iframe',
            // mainClass: 'mfp-fade',
            // removalDelay: 160,
            // preloader: false,
            // fixedContentPos: false
        });
    });
</script>
<!-- ---------------------------number_vailidation--------- -->
<script>
    function val(elem) {
        if (isNaN(elem.value)) {
            document.getElementById('msg_number').innerHTML = " * Enter Only Number";
        } else {
            document.getElementById('msg_number').innerHTML = "";

            if (elem.value.length > 10) {
                document.getElementById('msg_number').innerHTML = "* Enter Only 10 digit";

            }
        }
    }
</script>

<!-- ---------------------------------email_vailidation____________ -->



<script>
    var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 1000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) {
            delta /= 2;
        }

        if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
        }

        setTimeout(function() {
            that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i = 0; i < elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
                new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };
</script>




<script>
    let tablinks = document.getElementsByClassName("tab-links");
    let tabcontents = document.getElementsByClassName("service4_box");

    function ontablink(tabname) {
        for (tablink of tablinks) {
            tablink.classList.remove("active-links");
        }
        for (tabcontent of tabcontents) {
            tabcontent.classList.remove("active-tab");
        }
        event.currentTarget.classList.add("active-links");
        document.getElementById(tabname).classList.add("active-tab");
    };
</script>
</body>

</html>