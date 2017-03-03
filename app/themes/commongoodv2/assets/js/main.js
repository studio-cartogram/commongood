/**
 * Setup webpack public path
 * to enable lazy-including of
 * js chunks
 *
 */
import Barba from 'barba.js'
import './vendor/webpack.publicPath'
import RevealFx from './vendor/RevealFx'
import $ from 'jQuery'
/**
 * Your theme's js starts
 * here...
 */

// silly example:
import obj from './scripts/example'
import loadSprite from './vendor/loadSprite'

/* eslint no-console: 0 */
console.log(obj)

loadSprite()
Barba.Pjax.init()

document.body.classList.remove('js-is-loading')
document.body.classList.add('js-is-initialized')

const ACTIVE_CLASS = 'is-active'
const COLOR_BLACK = '#171617'
const COLOR_DARK = '#252328'
const COLOR_LIGHT= '#93939E'
const TRANSITION_DURATION = 400
const TRANSITION_EASING = 'easeInOutCubic'

const navEl = document.querySelector('.js-nav')
const revealer = new RevealFx(navEl)
const navToggleEl = document.querySelector('.js-nav-toggle')


const revealerOptions = {
  bgcolor: COLOR_BLACK,
  duration: TRANSITION_DURATION,
  easing: TRANSITION_EASING,
}

const openNav = () => {
  console.log('opening...')
  revealer.reveal({
    ...revealerOptions,
    onCover: function(contentEl, revealerEl) {
      navEl.classList.add(ACTIVE_CLASS);
      contentEl.style.opacity = 1;
    },
    onComplete: function() {
      navToggleEl.removeEventListener('click', openNav);
      navToggleEl.addEventListener('click', closeNav);
    }
  });
}

const closeNav = () => {
  navToggleEl.removeEventListener('click', closeNav);
  navEl.classList.remove(ACTIVE_CLASS);
  console.log('closing')
  revealer.reveal({
    ...revealerOptions,
    onCover: function(contentEl, revealerEl) {
      navEl.classList.remove(ACTIVE_CLASS);
      contentEl.style.opacity = 0;
    },
    onComplete: function() {
      navToggleEl.removeEventListener('click', closeNav);
      navToggleEl.addEventListener('click', openNav);
    }
  });
}


navToggleEl.addEventListener('click', openNav)
