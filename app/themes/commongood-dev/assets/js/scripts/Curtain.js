import RevealFx from '../vendor/RevealFx'
import log from '../utils/log'

import {
  REVEALER_OPTIONS,
} from '../config'

class Curtain {
  constructor(el) {
    const curtainEl = document.getElementById(el)
    if (!curtainEl) return null
    this.curtain = new RevealFx(curtainEl)
  }

  show = cb => {
    this.curtain.reveal({
      ...REVEALER_OPTIONS,
      onCover(contentEl) {
        contentEl.style.opacity = 1
      },
      onComplete() {
        if (cb && typeof cb === 'function') {
          cb()
        }
      },
    })
  }

  hide = cb => {
    this.curtain.reveal({
      ...REVEALER_OPTIONS,
      onCover(contentEl) {
        contentEl.style.opacity = 0
      },
      onComplete() {
        if (cb && typeof cb === 'function') {
          cb()
        }
      },
    })
  }
}

export default Curtain
