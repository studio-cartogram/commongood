import RevealFx from '../vendor/RevealFx'

import {
  ACTIVE_CLASS,
  REVEALER_OPTIONS,
} from '../config'

class Nav {
  constructor() {
    this.navEl = document.getElementById('js-nav')
    this.navToggleEl = document.querySelector('.js-nav-toggle')
    this.navToggleEl.addEventListener('click', this.show)
    this.nav = new RevealFx(this.navEl)
  }

  show = () => {
    this.nav.reveal({
      ...REVEALER_OPTIONS,
      onCover: contentEl => {
        this.navToggleEl.classList.add(ACTIVE_CLASS)
        this.navEl.classList.add(ACTIVE_CLASS)
        contentEl.style.opacity = 1
      },
      onComplete: () => {
        this.navToggleEl.removeEventListener('click', this.show)
        this.navToggleEl.addEventListener('click', this.hide)
        document.body.classList.add('nav-is-shown')
      },
    })
  }

  hide = () => {
    this.nav.reveal({
      ...REVEALER_OPTIONS,
      onStart: () => {
        this.navToggleEl.removeEventListener('click', this.hide)
        this.navEl.classList.remove(ACTIVE_CLASS)
      },
      onCover: contentEl => {
        this.navToggleEl.classList.remove(ACTIVE_CLASS)
        this.navEl.classList.remove(ACTIVE_CLASS)
        contentEl.style.opacity = 0
      },
      onComplete: () => {
        this.navToggleEl.removeEventListener('click', this.hide)
        this.navToggleEl.addEventListener('click', this.show)
        document.body.classList.remove('nav-is-shown')
      },
    })
  }
}

export default Nav

