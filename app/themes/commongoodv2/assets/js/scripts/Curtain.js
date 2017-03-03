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

  show = () => {
    this.curtain.reveal({
      ...REVEALER_OPTIONS,
      onCover: function(contentEl, revealerEl) {
        contentEl.style.opacity = 1
      },
    })
  }

  hide = () => {
    this.curtain.reveal({
      ...REVEALER_OPTIONS,
      onCover: function(contentEl, revealerEl) {
        contentEl.style.opacity = 0
      },
    })
  }
}

export default Curtain
