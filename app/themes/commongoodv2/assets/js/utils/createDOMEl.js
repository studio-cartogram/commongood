const createDOMEl = (type, className, content, attrs) => {
  var el = document.createElement(type)
  el.className = className || ''
  el.innerHTML = content || ''

  if(typeof attrs === 'object') {
    Object.keys(attrs).forEach(key => {
      console.log(key, attrs[key])
      el[key] = attrs[key]
    })

    console.log(el)
  }
  return el
}

export default createDOMEl
