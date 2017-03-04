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
import Nav from './scripts/Nav'
import loadSprite from './vendor/loadSprite'

const curtain = new Curtain()
const nav = new Nav()

const HideShowTransition = Barba.BaseTransition.extend({
  start: function() {
    nav.hide()
    curtain.show()
    this.newContainerLoading.then(this.finish.bind(this));
  },

  finish: function() {
    curtain.hide()
    this.done()
  }
})

class App {
  constructor() {
    this.init()
  }
  init = () => {
    loadSprite()
    document.body.classList.remove('js-is-loading')
    document.body.classList.add('js-is-initialized')
    Barba.Pjax.init()
    Barba.Pjax.getTransition = function() {
      return HideShowTransition;
    }
  }
}

const app = new App()

