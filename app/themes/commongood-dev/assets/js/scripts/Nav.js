import log from '../utils/log'
import RevealFx from '../vendor/RevealFx'

import {
  ACTIVE_CLASS,
  MAIN_ELEMENT_ID,
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
        window.addEventListener('keydown', this.trapFocus)
        this.setShowFocus()
        document.body.classList.add('nav-is-shown')
        this.isVisible = true
        this.toggleAria()
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
        this.setHideFocus()
        window.removeEventListener('keydown', this.trapFocus)
        document.body.classList.remove('nav-is-shown')
        this.isVisible = false
        this.toggleAria()
      },
    })
  }

  updateActiveItem = (currentStatus, prevStatus) => {
    const currentUrl = currentStatus ? currentStatus.url : window.location.href
    const prevUrl = prevStatus && prevStatus.url
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


  toggleAria = () => {
    if (this.isVisible) {
      this.navEl.setAttribute('aria-hidden', 'false')
      document.getElementById(MAIN_ELEMENT_ID).setAttribute('aria-hidden', 'true')
    } else {
      this.navEl.setAttribute('aria-hidden', 'true')
      document.getElementById(MAIN_ELEMENT_ID).setAttribute('aria-hidden', 'false')
    }
  }

  setShowFocus = () => this.navEl.querySelector('a[href]').focus()
  setHideFocus = () => this.navToggleEl.focus()
  trapFocus = e => {
    switch (e.keyCode) {
      case 27:
      return this.hide(e)

      case 9:
      const focusables = Array.prototype.slice.call(this.navEl.querySelectorAll('a[href]'))
      const focusIndex = focusables.indexOf(document.activeElement)

      if (e.shiftKey) {
        if (focusIndex === 0) {
          focusables[focusables.length - 1].focus()
          return e.preventDefault()
        }
      } else if (focusIndex === focusables.length - 1) {
        focusables[0].focus()
        return e.preventDefault()
      } else {
        return null
      }
    }
  }
}

export default Nav

