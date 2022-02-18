//
//
// typo next theme javascript features
//
//

( function() {
  //
  // add wrappings for headings in columns
  //
  $("article.post .entry-content .wp-block-column h3").wrapInner("<span></span>");
  $("article.post .entry-content .wp-block-column h4").wrapInner("<span></span>");

  //
  // marquee
  // details: https://github.com/aamirafridi/jQuery.Marquee
  //
  //
  const startMarquee = function (selector) {
    $(selector).marquee({
      //duration in milliseconds of the marquee
      duration: 15000,
      //gap in pixels between the tickers
      gap: 50,
      //time in milliseconds before the marquee will start animating
      delayBeforeStart: 0,
      //'left' or 'right'
      direction: 'left',
      //true or false - should the marquee be duplicated to show an effect of continues flow
      duplicated: true,
      startVisible: true
    });
  };

  const toggleMarquee = function(selector) {
    $(selector).marquee('resume');
  };

  //
  // start all marquees on the page after loading
  //
  // startMarquee(":not(.modal-content) .marquee");

  startMarquee("div:not(#modal-menu) .marquee");

  //
  //
  // modal windows
  //
  //

  //
  // add support of modals to figure's elements
  //
  $("article.post .entry-content figure.wp-block-image a").each(function(i, e) {
    $(e).src = "#";

    var cls = $(e).find("img").attr("class");

    $(e).addClass("js-modal-trigger");
    $(e).attr("href", "#");

    $(e).attr("data-target", "modal-" + cls);

  });

  //
  // trigger callbacks
  //
  document.addEventListener('DOMContentLoaded', () => {
    // Functions to open and close a modal
    function openModal($el) {
      $el.classList.add('is-active');
      // start marquee;
      // startMarquee(".modal-content .marquee");
      toggleMarquee("#modal-menu .marquee");
    }

    function closeModal($el) {
      $el.classList.remove('is-active');
    }

    function closeAllModals() {
      (document.querySelectorAll('.modal') || []).forEach(($modal) => {
        closeModal($modal);
      });
    }

    // Add a click event on buttons to open a specific modal
    (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
      const modal = $trigger.dataset.target;
      const $target = document.getElementById(modal);
      console.log($target);

      $trigger.addEventListener('click', () => {
        openModal($target);
      });
    });

    // Add a click event on various child elements to close the parent modal
    (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button, .close-menu-button') || []).forEach(($close) => {
      const $target = $close.closest('.modal');

      $close.addEventListener('click', () => {
        closeModal($target);
      });
    });

    // Add a keyboard event to close all modals
    document.addEventListener('keydown', (event) => {
      const e = event || window.event;

      if (e.keyCode === 27) { // Escape key
        closeAllModals();
      }
    });
  });
}() );
