import log from '../utils/log'
import { checkStatus, parseJSON } from '../utils/request'

class LoadVimeoImages {
  constructor(selector) {
    this.selector = selector
    this.init()
  }

  init = () => {
    this.els = document.querySelectorAll(this.selector)
    if (this.els.length === 0) {
      return null
    }

    Array.prototype.forEach.call(this.els, this.loadImage)
  }

  loadImage = el => {
    const localSrc = localStorage.getItem(`image-${el.dataset.vimeoId}`)
    el.parentNode.parentNode.classList.add('is-loading')

    if (localSrc) {
      return this.setElSrc(el, localSrc)
    }

    return this.fetchVimeoData(el).then(srcs => {
      localStorage.setItem(`image-${el.dataset.vimeoId}`, srcs.large)
      return this.setElSrc(el, srcs.large)
    })
  }

  fetchVimeoData = el =>
    fetch(`http://vimeo.com/api/v2/video/${el.dataset.vimeoId}.json`)
    .then(data => checkStatus(data))
    .then(data => parseJSON(data))
    .then(data => ({
      large: data[0].thumbnail_large,
    }))

  setElSrc= (el, src) => {
    switch (el.nodeName) {
      case 'VIDEO':
        el.poster = src
      break
      default:
        el.src = src
      break
    }
    el.addEventListener('load', () => {
      el.parentNode.parentNode.classList.remove('is-loading')
    })

    el.addEventListener('error', () => {
      el.parentNode.parentNode.classList.remove('is-loading')
      el.parentNode.parentNode.classList.add('is-broken')
    })
  }
}

export default LoadVimeoImages
