import log from '../utils/log'
/** Fetch Polyfill */
import 'whatwg-fetch'
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
      return this.setElSrc(el, JSON.parse(localSrc))
    }

    return this.fetchVimeoData(el).then(srcs => {
      localStorage.setItem(`image-${el.dataset.vimeoId}`, JSON.stringify(srcs))
      return this.setElSrc(el, srcs)
    })
  }

  fetchVimeoData = el =>
    fetch(`https://vimeo.com/api/v2/video/${el.dataset.vimeoId}.json`, {
      method: 'GET',
      withCredentials: true,
      mode: 'cors',
    })
    .then(data => checkStatus(data))
    .then(data => parseJSON(data))
    .then(data => {
      const imageId = this.getImageIdFromSrc(data[0].thumbnail_large)
       return {
          large: `https://i.vimeocdn.com/video/${imageId}_1920x800.jpg`,
          small: data[0].thumbnail_large,
       }
      })
    .catch(err => {
      this.handleError(el)
    })

  setElSrc= (el, srcs) => {
    switch (el.nodeName) {
      case 'VIDEO':
        el.poster = srcs.large
      break
      default:
        el.src = srcs.small
      break
    }

    el.addEventListener('load', () => {
      el.parentNode.classList.remove('is-loading')
    })

    el.addEventListener('error', () => {
      this.handleError(el)
    })
  }

  handleError = el => {
    el.parentNode.classList.remove('is-loading')
    el.parentNode.classList.add('is-broken')
  }

  getImageIdFromSrc = src => {
  const parts = src.split('/')
  const fileName = parts[parts.length - 1]
  return fileName.split('_')[0]
  }
}

export default LoadVimeoImages
