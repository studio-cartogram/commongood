import log from '../utils/log'

class Video {
  constructor(el) {
    if (!el) return null
    this.video = el
  }

  play = () => {
    if (this.video) {
      this.video.play()
    }
  }

  pause = () => {
    if (this.video && !this.video.paused) {
      setTimeout(() => {
        this.video.pause()
      }, 1)
    }
  }

}

export default Video
