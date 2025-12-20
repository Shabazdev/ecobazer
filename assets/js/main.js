$(document).ready(function () {
  // Toggle submenu and icon
  $('.shopCollapse').click(function () {
    let submenu = $(this).find('.shopOpen');
    let iconElement = $(this).find('iconify-icon');
    submenu.toggleClass('active');
    iconElement.attr(
      'icon',
      iconElement.attr('icon') === 'ep:arrow-down-bold'
        ? 'ep:arrow-right-bold'
        : 'ep:arrow-down-bold'
    );
  });

  // Password visibility toggle
  $('.pasToggl').click(function () {
    let inputField = $(this).siblings('input');
    let isPassword = inputField.attr('type') === 'password';
    inputField.attr('type', isPassword ? 'text' : 'password');
    $(this)
      .find('iconify-icon')
      .attr('icon', isPassword ? 'ion:eye-outline' : 'ion:eye-off-outline');
  });

  // Mobile search box toggle
  $('.searchMob').click(function () {
    $('.searchBoxMobile').addClass('active');
    $('.bottomNavBar').addClass('d-none');
  });
  $('.closeBtnSearch').click(function () {
    $('.searchBoxMobile').removeClass('active');
    $('.bottomNavBar').removeClass('d-none');
  });

  // *Swipper
  var bannerSwiper = new Swiper('#banner .mySwiper', {
    pagination: {
      el: '#banner .swiper-pagination',
      dynamicBullets: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
  var swiper = new Swiper('#featureProduct .mySwiper', {
    slidesPerView: 5,
    spaceBetween: 10,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      991: {
        slidesPerView: 5,
      },
      450: {
        slidesPerView: 2,
      },
      414: {
        slidesPerView: 2,
      },
      300: {
        slidesPerView: 1,
      },
    },
  });

  // *  popup close
  $('.close-btn').click(function () {
    $('.popup').addClass('d-none');
  });

  $(window).on('load', function () {
    setTimeout(function () {
      $('.popup').removeClass('d-none');
      $('.popup').addClass('d-block');
    }, 2000);
  });

  // category

  $('.fruitsBtn').click(function () {
    $('.Vegetables').addClass('d-none');
    $('.fruits').removeClass('d-none');
    $('.fruitsBtn').addClass('active');
    $('#all').removeClass('active');
    $('.veg').removeClass('active');
  });
  $('.All').click(function () {
    $('.fruits').removeClass('d-none');
    $('.Vegetables').removeClass('d-none');
    $('.fruitsBtn').removeClass('active');
    $('#all').addClass('active');
    $('.veg').removeClass('active');
  });
  $('.veg').click(function () {
    $('.fruits').addClass('d-none');
    $('.Vegetables').removeClass('d-none');
    $('.fruitsBtn').removeClass('active');
    $('.veg').addClass('active');
    $('#all').removeClass('active');
  });
  // countdown
  const targetDate = 'Apr 29, 2025 12:00:00'; // You can load this from a server, CMS, etc.
  const countDownDate = new Date(targetDate).getTime();

  const x = setInterval(() => {
    const now = new Date().getTime();
    const distance = countDownDate - now;

    if (distance < 0) {
      clearInterval(x);
      $('#days').text('00');
      $('#hours').text('00');
      $('#mins').text('00');
      $('#secs').text('00');
      return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor(
      (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
    );
    const mins = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const secs = Math.floor((distance % (1000 * 60)) / 1000);

    $('#days').text(days);
    $('#hours').text(hours);
    $('#mins').text(mins);
    $('#secs').text(secs);
  }, 1000);

  $('#video .vid').click(function () {
    console.log(1);

    $('#video-m').removeClass('d-none');
  });

  // <=================Shop Page JavaScript================>
  $('.searchMob').click(function () {
    $('.searchBoxMobile').addClass('active');
    $('.bottomNavBar').addClass('d-none');
  });
  $('.closeBtnSearch').click(function () {
    $('.searchBoxMobile').removeClass('active');
    $('.bottomNavBar').removeClass('d-none');
  });

  $('.categoreBtn').click(function () {
    let iconElement = $(this).find('iconify-icon');
    $('.shopOpen').toggleClass('active');
    iconElement.attr(
      'icon',
      iconElement.attr('icon') === 'ep:arrow-down-bold'
        ? 'ep:arrow-up-bold'
        : 'ep:arrow-down-bold'
    );
  });
  $('.ratingBtn').click(function () {
    $('.shopCollapse').toggleClass('active');
  });
  $('.priceBtn').click(function () {
    $('.priceRangeOpen').toggleClass('active');
  });
  $('.popularBtn').click(function () {
    let iconElement = $(this).find('iconify-icon');
    $('.popularTagBox').toggleClass('active');
    iconElement.attr(
      'icon',
      iconElement.attr('icon') === 'ep:arrow-down-bold'
        ? 'ep:arrow-up-bold'
        : 'ep:arrow-down-bold'
    );
  });

  // Filter Mobile Button
  $('.filterMdBtn').click(function () {
    $('.filterCotant').addClass('active');
  });
  $('.filterClose').click(function () {
    $('.filterCotant').removeClass('active');
  });

  $('.All').click(function () {
    $('.VegetablesCard').removeClass('d-none');
    $('.CookingCard').removeClass('d-none');
    $('.FruitCard').removeClass('d-none');
  });
  $('.freshFruit').click(function () {
    $('.VegetablesCard').addClass('d-none');
    $('.CookingCard').addClass('d-none');
    $('.FruitCard').removeClass('d-none');
  });
  $('.vegetable').click(function () {
    $('.FruitCard').addClass('d-none');
    $('.CookingCard').addClass('d-none');
    $('.VegetablesCard').removeClass('d-none');
  });
  $('.cooking').click(function () {
    $('.FruitCard').addClass('d-none');
    $('.CookingCard').removeClass('d-none');
    $('.VegetablesCard').addClass('d-none');
  });

  // Price toggle

  // Price Range Slider End Here
  const rangevalue = document.querySelector('.slider-container .price-slider');
  const rangeInputvalue = document.querySelectorAll('.range-input input');
  // Set the price gap
  let priceGap = 500;
  // Adding event listners to price input elements
  const priceInputvalue = document.querySelectorAll('.price-input input');
  for (let i = 0; i < priceInputvalue.length; i++) {
    priceInputvalue[i].addEventListener('input', (e) => {
      // Parse min and max values of the range input
      let minp = parseInt(priceInputvalue[0].value);
      let maxp = parseInt(priceInputvalue[1].value);
      let diff = maxp - minp;

      if (minp < 0) {
        alert('minimum price cannot be less than 0');
        priceInputvalue[0].value = 0;
        minp = 0;
      }

      // Validate the input values
      if (maxp > 10000) {
        alert('maximum price cannot be greater than 10000');
        priceInputvalue[1].value = 10000;
        maxp = 10000;
      }

      if (minp > maxp - priceGap) {
        priceInputvalue[0].value = maxp - priceGap;
        minp = maxp - priceGap;

        if (minp < 0) {
          priceInputvalue[0].value = 0;
          minp = 0;
        }
      }

      // Check if the price gap is met
      // and max price is within the range
      if (diff >= priceGap && maxp <= rangeInputvalue[1].max) {
        if (e.target.className === 'min-input') {
          rangeInputvalue[0].value = minp;
          let value1 = rangeInputvalue[0].max;
          rangevalue.style.left = `${(minp / value1) * 100}%`;
        } else {
          rangeInputvalue[1].value = maxp;
          let value2 = rangeInputvalue[1].max;
          rangevalue.style.right = `${100 - (maxp / value2) * 100}%`;
        }
      }
    });

    // Add event listeners to range input elements
    for (let i = 0; i < rangeInputvalue.length; i++) {
      rangeInputvalue[i].addEventListener('input', (e) => {
        let minVal = parseInt(rangeInputvalue[0].value);
        let maxVal = parseInt(rangeInputvalue[1].value);

        let diff = maxVal - minVal;

        // Check if the price gap is exceeded
        if (diff < priceGap) {
          // Check if the input is the min range input
          if (e.target.className === 'min-range') {
            rangeInputvalue[0].value = maxVal - priceGap;
          } else {
            rangeInputvalue[1].value = minVal + priceGap;
          }
        } else {
          // Update price inputs and range progress
          priceInputvalue[0].value = minVal;
          priceInputvalue[1].value = maxVal;
          rangevalue.style.left = `${(minVal / rangeInputvalue[0].max) * 100}%`;
          rangevalue.style.right = `${
            100 - (maxVal / rangeInputvalue[1].max) * 100
          }%`;
        }
      });
    }
  }
  // Price Range Slider Start Here

  // 404 Error Page Start Here
  $(document).ready(function () {
    $('#backToHome').click(function () {
      // Replace 'index.html' with your home page URL or file name
      window.location.href = 'index.html';
    });
  });
  // 404 Error Page End Here

  //<=============Cart Page JavaScript==============>
  $('.shopCollapse').click(function () {
    let submenu = $(this).find('.shopOpen');
    let iconElement = $(this).find('iconify-icon');
    submenu.toggleClass('active');
    iconElement.attr(
      'icon',
      iconElement.attr('icon') === 'ep:arrow-down-bold'
        ? 'ep:arrow-right-bold'
        : 'ep:arrow-down-bold'
    );
  });
  // Mobile search box toggle
  $('.searchMob').click(function () {
    $('.searchBoxMobile').addClass('active');
    $('.bottomNavBar').addClass('d-none');
  });
  $('.closeBtnSearch').click(function () {
    $('.searchBoxMobile').removeClass('active');
    $('.bottomNavBar').removeClass('d-none');
  });

  //<=================Checkout Page JavaScript================>
  $('.thumb').click(function () {
    let imgSrc = $(this).attr('src');
    $('#mainPreview').attr('src', imgSrc);
    $('.thumb').removeClass('active');
    $(this).addClass('active');
  });
  // Quantity increment and decrement
  let qty = 1;
  $('.plus').click(function () {
    qty++;
    $('.qty-value').text(qty);
  });

  $('.minus').click(function () {
    if (qty > 1) {
      qty--;
      $('.qty-value').text(qty);
    }
  });

  $('.wishlist-btn').click(function () {
    $(this).toggleClass('active');
    $(this).find('i').toggleClass('far fas');
  });

  // Tab functionality
  $('.tab-btn').click(function () {
    var tabId = $(this).data('tab');

    // Toggle active class
    $('.tab-btn').removeClass('active');
    $(this).addClass('active');

    // Hide all tab content
    $('.tab-content').addClass('d-none');

    // Show selected tab content
    $('.' + tabId).removeClass('d-none');
  });
    //<=============User Dashdoard Page JavaScript==============>
    
});
