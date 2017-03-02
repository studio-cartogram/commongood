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

/* eslint no-console: 0 */
console.log(obj)

Barba.Pjax.init()

