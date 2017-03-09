import log from '../utils/log'
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
    this.isVisible = false
    this.watchActiveItem()
  }

  show = () => {
    if (this.isVisible) {
      return null
    }
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
        this.isVisible = true
      },
    })
  }

  hide = () => {
    if (!this.isVisible) {
      return null
    }
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
        this.isVisible = false
      },
    })
  }

  updateActiveItem = (currentStatus, prevStatus) => {
    const currentUrl = currentStatus ? currentStatus.url.split(window.location.protocol)[1] : window.location.pathname
    const prevUrl = prevStatus && prevStatus.url.split(window.location.protocol)[1]
    const currentActiveLinkEl = this.navEl.querySelector(`[href="${currentUrl}"]`)
    const prevActiveLinkEl = this.navEl.querySelector(`[href="${prevUrl}"]`)

    if (prevUrl && prevActiveLinkEl) {
      prevActiveLinkEl.classList.remove('is-active')
    }

    if (currentActiveLinkEl) {
      currentActiveLinkEl.classList.add('is-active')
    }
  }

  watchActiveItem = () => {
    const navLinks = this.navEl.querySelectorAll('a[href]')
    let i
    const cb = e => {
      if (e.currentTarget.href === window.location.href) {
        e.preventDefault()
        e.stopPropagation()
        this.hide()
      }
    }

    for (i = 0; i < navLinks.length; i++) {
      navLinks[i].addEventListener('click', cb)
    }
  }
}

export default Nav

