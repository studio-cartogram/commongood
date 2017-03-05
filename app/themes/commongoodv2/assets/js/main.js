/**
 * Setup webpack public path
 * to enable lazy-including of
 * js chunks
 *
 */
import Barba from 'barba.js'
import swiper from 'swiper'
// import Player from '@vimeo/player';
import RevealFx from './vendor/RevealFx'
import createDOMEl from './utils/createDOMEl'
import log from './utils/log'
import {
  ACTIVE_CLASS,
  REVEALER_OPTIONS,
} from './config'

import './vendor/webpack.publicPath'
import Curtain from './scripts/Curtain'
import Scroll from './scripts/Scroll'
import Nav from './scripts/Nav'
import loadSprite from './vendor/loadSprite'

class App {
  constructor() {
    this.init()
    loadSprite()
    document.body.classList.remove('js-is-loading')
    document.body.classList.add('js-is-initialized')
    Barba.Pjax.init()
    Barba.Pjax.getTransition = () => {
      return this.Transition;
    }

  }
  init = () => {
    log('init app')
    this.curtain = new Curtain('js-curtain')
    this.nav = new Nav()
    this.scroll = new Scroll()
    this.initTransitions()
    this.initSwiper()
    this.initScrollLinks()
    Barba.Dispatcher.on('initStateChange', currentStatus => {
      document.body.classList.add('js-is-loading')
      this.nav.hide()
    })
    Barba.Dispatcher.on('transitionCompleted', () => {
      this.initSwiper()
      this.initScrollLinks()
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

  scrollTo = (str) => {
    const targetEl = document.getElementById(str.substr(1))
    if(targetEl) {
      log(targetEl)
      this.scroll.scrollTo(targetEl)
    }
  }

  initScrollLinks = () => {
    const scrollLinks = document.querySelectorAll('.js-scroll-link');

    scrollLinks.forEach(el => {
      el.addEventListener('click', (e) => {
        e.preventDefault()
        const target = el.getAttribute('href')
        this.scrollTo(target)
      })
    })
  }

  initSwiper = () => {

    var mySwiper = new Swiper ('#js-swiper-featured', {
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
      start: function() {
        Promise
        .all([
          this.newContainerLoading,
          _scrollTop().finished,
          this.showCurtain(),
        ])
        .then(this.showNewPage.bind(this));
      },

      showCurtain: function() {
        const deferred = Barba.Utils.deferred();

        _showCurtain(() => {
          deferred.resolve();
        })

        return deferred.promise;
      },

      showNewPage: function() {
        this.done()
        _hideCurtain(() => {
        })
      }
    })
  }
}

const app = new App()

