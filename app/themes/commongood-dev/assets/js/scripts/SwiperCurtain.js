import log from '../utils/log'
import RevealFx from '../vendor/RevealFx'

import {
  ACTIVE_CLASS,
  REVEALER_OPTIONS,
  COLOR_DARK,
} from '../config'

class SwiperCurtain {
  constructor(slide) {
    this.curtain1 = new RevealFx(slide.querySelector('.js-curtain-1'))
    this.curtain2 = new RevealFx(slide.querySelector('.js-curtain-2'))
    this.curtain3 = new RevealFx(slide.querySelector('.js-curtain-3'))
  }

  show1 = () => {
    this.curtain1.reveal({
      ...REVEALER_OPTIONS,
      direction: 'lr',
      onStart: (contentEl, revealerEl) => {
        contentEl.style.opacity = 0
      },
      onCover: (contentEl, revealerEl) => {
        contentEl.style.opacity = 1
      },
    })
  }
  show2 = () => {
    this.curtain2.reveal({
      ...REVEALER_OPTIONS,
      bgcolor: COLOR_DARK,
      direction: 'bt',
      onStart: (contentEl, revealerEl) => {
        contentEl.style.opacity = 0
      },
      onCover: (contentEl, revealerEl) => {
        contentEl.style.opacity = 1
      },
      onComplete: (contentEl, revealerEl) => {
        this.show1()
        this.show3()
      }
    })
  }
  show3 = () => {
    this.curtain3.reveal({
      ...REVEALER_OPTIONS,
      bgcolor: COLOR_DARK,
      direction: 'lr',
      onStart: (contentEl, revealerEl) => {
        contentEl.style.opacity = 0
      },
      onCover: (contentEl, revealerEl) => {
        contentEl.style.opacity = 1
      },
    })
  }

}

export default SwiperCurtain

