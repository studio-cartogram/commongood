/**
 * Setup webpack public path
 * to enable lazy-including of
 * js chunks
 *
 */
import './vendor/webpack.publicPath'
import Barba from 'barba.js'

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
