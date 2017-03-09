import log from '../utils/log'

class Video {
  constructor(el) {
    log(el)
    this.video = el
  }

  play = () => {
    if (this.video.paused) {
      this.video.play()
    }
  }

  pause = () => {
    if (!this.video.paused) {
      this.video.pause()
    }
  }

}

export default Video
