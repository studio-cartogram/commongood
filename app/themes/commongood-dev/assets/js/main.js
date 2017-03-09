/**
 * Setup webpack public path
 * to enable lazy-including of
 * js chunks
 *
 */
import Barba from 'barba.js'
import Swiper from 'swiper'
// import Player from '@vimeo/player';
import log from './utils/log'

import './vendor/webpack.publicPath'
import Curtain from './scripts/Curtain'
import Scroll from './scripts/Scroll'
import Nav from './scripts/Nav'
import LoadVimeoImages from './scripts/LoadVimeoImages'
import loadSprite from './vendor/loadSprite'

class App {
  constructor() {
    this.init()
    loadSprite()
    document.body.classList.remove('js-is-loading')
    document.body.classList.add('js-is-initialized')
    Barba.Pjax.init()
    Barba.Prefetch.init()
    Barba.Pjax.getTransition = () => this.Transition
    this.nav.updateActiveItem()
  }

  init = () => {
    log('init app')
    this.loadVimeoImages = new LoadVimeoImages('.js-load-vimeo-image')
    this.curtain = new Curtain('js-curtain')
    this.nav = new Nav()
    this.scroll = new Scroll()
    this.initTransitions()
    this.initFeaturedSwiper()
    this.initCommongoodsSwiper()
    this.initScrollLinks()
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
      log('have hash')
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

    scrollLinks.forEach(el => {
      el.addEventListener('click', e => {
        e.preventDefault()
        const target = el.getAttribute('href')
        this.scrollTo(target)
      })
    })
  }

  initCommongoodsSwiper = () => {
    const commonggoodsSwiper = new Swiper('#js-swiper-commongoods', {
      keyboardControl: true,
      pagination: '.js-commongoods__pagination',
      nextButton: '.js-commongoods__next',
      prevButton: '.js-commongoods__prev',
      paginationType: 'fraction',
      autoHeight: true,
    })
  }

  initFeaturedSwiper = () => {
    const featuredSwiper = new Swiper('#js-swiper-featured', {
      autoplay: 5000,
      speed: 500,
      loop: true,
      effect: 'fade',
      keyboardControl: true,
      // onSlideChangeStart: (swiper) => {
      //   log('change start')
      //   const previousSlide = swiper.slides[swiper.previousIndex]
      //   previousSlide.querySelector('.featured__video').innerHTML = ''
      //
      //   log('change end')
      //   const currentSlide = swiper.slides[swiper.realIndex]
      //   if(currentSlide.querySelector('iframe')) return null
      //   currentSlide.classList.add('is-loading')
      //   const vimeo_url = currentSlide.dataset.cgVimeoUrl;
      //   const videoOptions = {
      //     id: 'js-video-iframe',
      //     src: vimeo_url,
      //     frameborder: "0",
      //   }
      //   const video = createDOMEl('iframe', 'featured__video__video', null, videoOptions)
      //   currentSlide.querySelector('.featured__video').appendChild(video)
      // },
      // onSlideChangeEnd: (swiper) => {
      //   const currentSlide = swiper.slides[swiper.realIndex]
      //   currentSlide.classList.remove('is-loading')
      // },

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

