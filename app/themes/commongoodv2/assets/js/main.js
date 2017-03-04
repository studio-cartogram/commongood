/**
 * Setup webpack public path
 * to enable lazy-including of
 * js chunks
 *
 */
import Barba from 'barba.js'
import RevealFx from './vendor/RevealFx'
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

const pageTransition = Barba.BaseTransition.extend({
});


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
    this.curtain = new Curtain()
    this.nav = new Nav()
    this.scroll = new Scroll()
    this.initTransitions()
    Barba.Dispatcher.on('initStateChange', currentStatus => {
      document.body.classList.add('js-is-loading')
      this.nav.hide()
    })
    Barba.Dispatcher.on('transitionCompleted', () => {
      setTimeout(() => {
        document.body.classList.remove('js-is-loading')
      }, 200)
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

