/**
 * Setup webpack public path
 * to enable lazy-including of
 * js chunks
 *
 */
import Barba from 'barba.js'
import Swiper from 'swiper'
import log from './utils/log'
import creatDOMEl from './utils/createDOMEl'
import './vendor/webpack.publicPath'
import Curtain from './scripts/Curtain'
import Scroll from './scripts/Scroll'
import Nav from './scripts/Nav'
import SwiperCurtain from './scripts/SwiperCurtain'
import Video from './scripts/Video'
import LoadVimeoImages from './scripts/LoadVimeoImages'
import loadSprite from './vendor/loadSprite'
import RevealFx from './vendor/RevealFx'


class App {
  constructor() {
    this.init()
    loadSprite()
    document.body.classList.remove('js-is-loading')
    document.body.classList.add('js-is-initialized')
    Barba.Pjax.init()
    Barba.Prefetch.init()
    Barba.Pjax.getTransition = currentStatus => {
      const prevView = Barba.HistoryManager.prevStatus().namespace
      switch (prevView) {
        case 'single':
          return this.TransitionSingle
        default:
          return this.Transition
      }
    }
  }

  init = () => {
    this.loadVimeoImages = new LoadVimeoImages('.js-load-vimeo-image')
    this.curtain = new Curtain('js-curtain')
    this.nav = new Nav()
    this.scroll = new Scroll()
    this.initTransitions()
    this.initScrollLinks()
    this.nav.updateActiveItem()

    Barba.Dispatcher.on('initStateChange', () => {
      document.body.classList.add('js-is-loading')
      this.nav.hide()
    })
    Barba.Dispatcher.on('transitionCompleted', (currentStatus, prevStatus) => {
      this.initFeaturedSwiper()
      this.initCommongoodsSwiper()
      this.initScrollLinks()
      this.loadVimeoImages.init()
      this.nav.updateActiveItem(currentStatus, prevStatus)
      setTimeout(() => {
        document.body.classList.remove('js-is-loading')
      }, 200)
    })
    if (window.location.hash) {
      setTimeout(() => {
        this.scrollTo(window.location.hash)
      }, 0)
    }
  }

  scrollTo = str => {
    const targetEl = document.getElementById(str.substr(1))
    if (targetEl) {
      log(targetEl)
      this.scroll.scrollTo(targetEl)
    }
  }

  initScrollLinks = () => {
    const scrollLinks = document.querySelectorAll('.js-scroll-link')
    Array.prototype.forEach.call(scrollLinks, el => {
      el.addEventListener('click', e => {
        e.preventDefault()
        const target = el.getAttribute('href')
        this.scrollTo(target)
      })
    })
  }

  initCommongoodsSwiper = () => {

    const swiperSelector = '#js-swiper-commongoods'
    const that = this;
    function changeSlide() {
      const targetEl = document.getElementById(swiperSelector.substr(1))
      const prevSlide = this.slides[this.previousIndex]
      const currSlide = this.slides[this.activeIndex]
      console.log(this.activeIndex, this.realIndex)

      if (currSlide) {
        const swiperCurtain = new SwiperCurtain(currSlide)
        swiperCurtain.show2();
      }

      if (this.realIndex === 0) {
        that.scroll.scrollTop()
      } else {
        that.scroll.scrollTo(targetEl, 64)
      }
    }

    function initChildSwiper() {
      const childSwiperSelector = this.$wrapperEl.find('.js-swiper-commongoods-child');
      const commonggoodsSwiperChild = new Swiper(childSwiperSelector, {
        autoplay: {
          delay: 1000,
        },
        speed: 500,
        effect: 'fade',
        loop: true,
      })
    }

    const commonggoodsSwiper = new Swiper(swiperSelector, {
      autoplay: {
        delay: 12000,
      },
      speed: 500,
      loop: true,
      navigation: {
        nextEl: '.js-commongoods__next',
        prevEl: '.js-commongoods__prev',
      },
      pagination: {
        el: '.js-commongoods__pagination',
        type: 'fraction',
      },
      autoHeight: true,
      nested: true,
      effect: 'fade',
      on: {
        slideChangeTransitionStart: changeSlide,
        slideChangeTransitionEnd: initChildSwiper,

      },
    })
  }

  initFeaturedSwiper = () => {
    function changeVideo() {
      const prevSlide = this.realIndex === this.previousIndex ? null : this.slides[this.previousIndex]
      const currSlide = this.slides[this.realIndex]
      const currVideo = new Video(currSlide.querySelector('.js-video'))
      if (!currVideo) {
        return null
      }

      currVideo.play()

      if (prevSlide) {
        const prevVideo = new Video(prevSlide.querySelector('.js-video'))
        prevVideo.pause()
      }
    }

    const featuredSwiper = new Swiper('#js-swiper-featured', {
      autoplay: {
        delay: 5000,
      },
      speed: 500,
      effect: 'fade',
      keyboard: {
        enabled: true,
        onlyInViewport: false,
      },
      on: {
        // init: changeSlide,
        slideChangeTransitionStart: changeVideo,
      },
    })
  }

  initTransitions = () => {
    const _hideCurtain = this.curtain.hide.bind(this)
    const _showCurtain = this.curtain.show.bind(this)
    const _scrollTop = this.scroll.scrollTop.bind(this)

    this.TransitionSingle = Barba.BaseTransition.extend({
      start() {
        Promise
        .all([
          this.newContainerLoading,
          _scrollTop().finished,
        ])
        .then(this.showNewPage.bind(this))
      },

      showNewPage() {
        this.done()
      },
    })

    this.Transition = Barba.BaseTransition.extend({
      start() {
        Promise
        .all([
          this.newContainerLoading,
          _scrollTop().finished,
          this.showCurtain(),
        ])
        .then(this.showNewPage.bind(this))
      },

      showCurtain() {
        const deferred = Barba.Utils.deferred()

        _showCurtain(() => {
          deferred.resolve()
        })

        return deferred.promise
      },

      showNewPage() {
        this.done()
        _hideCurtain(() => {
        })
      },
    })
  }
}

const app = new App()

window.app = app

