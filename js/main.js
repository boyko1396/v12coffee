$(document).ready(function(){
  rangeSliderInit();

  // header dropdown toggle
  $('.js-header-toggle').click(function(){
    $('body').toggleClass('is-show-dropdown lock');
  });

  // link to scroll
  $('.js-link-anchor').click(function(e) {
    e.preventDefault();
    $('body').removeClass('is-show-dropdown lock');
    var aid = $(this).attr('href');
    $('html,body').animate({scrollTop: $(aid).offset().top - 50},'slow');
  });

  // modal init
  $('.js-modal-open').click(function(){
    $('body').addClass('is-modal');
    $('.modal--profit').addClass('is-show');
    e.preventDefault();
  });

  setTimeout(function() {
    $('body').addClass('is-modal');
    $('.modal--poll').addClass('is-show');
  }, 40000);

  $('.js-modal-close').click(function(){
    $('body').removeClass('is-modal');
    $('.modal').removeClass('is-show');
    e.preventDefault();
  });

  $('.js-btn-gift').click(function(){
    $(this).toggleClass('is-show-mobile');
    e.preventDefault();
  });

  // mask tel
  if ($('.js-phone-mask')[0]){
    $('.js-phone-mask').inputmask({
      'mask': '+38-099-999-99-99',
      'clearIncomplete': true
    });
  }

  // range slider init
  function rangeSliderInit() {
    var calcProfitConst = 430;
    var $slider1 = $('.js-range-init-1').get(0);
    var $slider2 = $('.js-range-init-2').get(0);
    var $slider3 = $('.js-range-init-3').get(0);
    var calcRangeValue1 = document.getElementById('calc-count-1');
    var calcRangeValue2 = document.getElementById('calc-count-2');
    var calcRangeValue3 = document.getElementById('calc-count-3');
    var calcRangeProfit = document.getElementById('calc-profit');

    // slider range 1
    var minVal = 1;
    var maxVal = 150;
    var gap = 1;

    noUiSlider.create($slider1, {
      start: 30,
      connect: true,
      step: gap,
      tooltips: [
        true
      ],
      range: {
        'min': minVal,
        'max': maxVal
      },
      format: {
        from: function(value) {
          return parseInt(value);
        },
        to: function(value) {
          return parseInt(value);
        }
      },
    });

    var minVal = 1;
    var maxVal = 10;
    var gap = 1;
    noUiSlider.create($slider2, {
      start: minVal,
      connect: true,
      step: gap,
      tooltips: [
        true
      ],
      range: {
        'min': minVal,
        'max': maxVal
      },
      format: {
        from: function(value) {
          return parseInt(value);
        },
        to: function(value) {
          return parseInt(value);
        }
      },
    });

    var minVal = 1;
    var maxVal = 12;
    var gap = 1;
    noUiSlider.create($slider3, {
      start: minVal,
      connect: true,
      step: gap,
      tooltips: [
        true
      ],
      range: {
        'min': minVal,
        'max': maxVal
      },
      format: {
        from: function(value) {
          return parseInt(value);
        },
        to: function(value) {
          return parseInt(value);
        }
      },
    });

    $slider1.noUiSlider.on('update', function(values, handle) {
      calcRangeValue1.innerHTML = values[handle];
      calcRangeProfit.innerHTML = calcRangeValue1.innerHTML * calcRangeValue2.innerHTML * calcRangeValue3.innerHTML * calcProfitConst;
    });

    $slider2.noUiSlider.on('update', function(values, handle) {
      calcRangeValue2.innerHTML = values[handle];
      calcRangeProfit.innerHTML = calcRangeValue1.innerHTML * calcRangeValue2.innerHTML * calcRangeValue3.innerHTML * calcProfitConst;
    });

    $slider3.noUiSlider.on('update', function(values, handle) {
      calcRangeValue3.innerHTML = values[handle];
      calcRangeProfit.innerHTML = calcRangeValue1.innerHTML * calcRangeValue2.innerHTML * calcRangeValue3.innerHTML * calcProfitConst;
    });
  }

  // poll
  $('.poll-el__item.is-active').show();
  $('.js-poll-btn-next').click(function (e) {
    var screenTest = $('.poll-el__item.is-active');
    screenTestNext = screenTest.next();
    screenTestPrev = screenTest.prev();
    screenTest.fadeOut(0);
    screenTestNext.fadeIn(200);
    screenTest.removeClass('is-active');
    screenTestNext.addClass('is-active');
  });

  $('.js-poll-btn-prev').click(function (e) {
    var screenTest = $('.poll-el__item.is-active');
    screenTestNext = screenTest.next();
    screenTestPrev = screenTest.prev();
    screenTest.fadeOut(0);
    screenTestPrev.fadeIn(200);
    screenTest.removeClass('is-active');
    screenTestPrev.addClass('is-active');
  });

  // animation scroll
  if($('.wow').length){
    var wow = new WOW({
      boxClass: 'wow',
      animateClass: 'animated',
      offset: 35,
      mobile: false
    });
    wow.init();
  }

  (function initPlayVideo() {
    var $videoContainer = $('.video-responsive');
    var $videoCover = $('.video-responsive__cover');

    $videoCover.on('click', function () {
      $videoCover.fadeOut();
      $videoContainer.append('<iframe width="652" height="367" src="https://www.youtube.com/embed/oa_kxagn8js?feature=oembed&autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
    });
  })();
});