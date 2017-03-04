import anime from 'animejs'
import log from '../utils/log'

import {
  TRANSITION_DURATION,
} from '../config'

class Scroll {
  createScrollConfig = ({
    container,
    start,
    end,
  }) => {
    const _container = container
    const position = {
      start,
    }
    return {
      targets: position,
      start: end,
      duration: TRANSITION_DURATION,
      easing: 'easeInExpo',
      round: 1,
      update: () => {
        _container.scrollTop = position.start
      },
    }
  }

  scrollTop = (cb) => {
    const container = document.body
    const config = this.createScrollConfig({
      container,
      start: container.scrollTop,
      end: 0,
    })

    return anime({
      ...config,
    })
  }
}

export default Scroll

