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
    Barba.Pjax.getTransition = () => this.Transition
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
    const changeSlide = swiper => {
      const targetEl = document.getElementById(swiperSelector.substr(1))
      const prevSlide = swiper.slides[swiper.previousIndex]
      const currSlide = swiper.slides[swiper.realIndex]
      const swiperCurtain = new SwiperCurtain(currSlide)
      if (swiper.realIndex === 0) {
        this.scroll.scrollTop()
      } else {
        this.scroll.scrollTo(targetEl, 64)
      }
      swiperCurtain.show2();
    }

    const commonggoodsSwiper = new Swiper(swiperSelector, {
      keyboardControl: true,
      pagination: '.js-commongoods__pagination',
      nextButton: '.js-commongoods__next',
      prevButton: '.js-commongoods__prev',
      paginationType: 'fraction',
      speed: 500,
      autoHeight: true,
      effect: 'fade',
      onInit: changeSlide,
      onSlideChangeStart: changeSlide,
    })
  }

  initFeaturedSwiper = () => {
    const changeVideo = swiper => {
      const prevSlide = swiper.realIndex === swiper.previousIndex ? null : swiper.slides[swiper.previousIndex]
      const currSlide = swiper.slides[swiper.realIndex]
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
      autoplay: 10000,
      speed: 500,
      effect: 'fade',
      keyboardControl: true,
      onInit: changeVideo,
      onSlideChangeStart: changeVideo,
    })
  }

  initTransitions = () => {
    const _hideCurtain = this.curtain.hide.bind(this)
    const _showCurtain = this.curtain.show.bind(this)
    const _scrollTop = this.scroll.scrollTop.bind(this)

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

