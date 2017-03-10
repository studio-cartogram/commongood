const createDOMEl = (type, className, content, attrs) => {
  const el = document.createElement(type)
  el.className = className || ''
  el.innerHTML = content || ''

  if (typeof attrs === 'object') {
    Object.keys(attrs).forEach(key => {
      el[key] = attrs[key]
    })
  }

  return el
}

export default createDOMEl
