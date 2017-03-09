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
    this.els.forEach(this.loadImage)
  }

  loadImage = el => {
    el.parentNode.parentNode.classList.add('is-loading')
    const localSrc = localStorage.getItem(`image-${el.dataset.vimeoId}`)

    if (localSrc) {
      return this.setImageSrc(el, localSrc)
    }

    return this.fetchVimeoData(el).then(srcs => {
      localStorage.setItem(`image-${el.dataset.vimeoId}`, srcs.large)
      return this.setImageSrc(el, srcs.large)
    })
  }

  fetchVimeoData = el =>
    fetch(`https://vimeo.com/api/v2/video/${el.dataset.vimeoId}.json`)
    .then(data => checkStatus(data))
    .then(data => parseJSON(data))
    .then(data => ({
      large: data[0].thumbnail_large,
    }))

  setImageSrc= (el, src) => {
    el.src = src
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
