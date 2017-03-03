const createDOMEl = (type, className, content) => {
  var el = document.createElement(type)
  el.className = className || ''
  el.innerHTML = content || ''
  return el
}

export default createDOMEl
