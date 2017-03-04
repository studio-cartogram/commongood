import RevealFx from '../vendor/RevealFx'
import log from '../utils/log'

import {
  REVEALER_OPTIONS,
} from '../config'

class Curtain {
  constructor() {
    const curtainEl = document.getElementById('js-curtain')
    this.curtain = new RevealFx(curtainEl)
  }

  show = (cb) => {
    this.curtain.reveal({
      ...REVEALER_OPTIONS,
      onCover: function(contentEl, revealerEl) {
        contentEl.style.opacity = 1
      },
      onComplete: function() {
        if(typeof cb === 'function') {
          cb()
        }
      },
    })
  }

  hide = (cb) => {
    this.curtain.reveal({
      ...REVEALER_OPTIONS,
      onCover: function(contentEl, revealerEl) {
        contentEl.style.opacity = 0
      },
      onComplete: function() {
        if(typeof cb === 'function') {
          cb()
        }
      },
    })
  }
}

export default Curtain
