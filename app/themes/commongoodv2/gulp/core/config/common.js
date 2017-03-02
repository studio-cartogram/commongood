// utils
const deepMerge = require('../utils/deepMerge')

// config
const project = require('../../../project.config')
const overrides = require('../../config/common')


/**
 * Common config
 * for all tasks
 *
 */
module.exports = deepMerge({
  paths: {
    theme: {
      src: 'theme',
      dest: `../${project.name}`,
    },
    assets: {
      src: 'assets',
      dest: `../${project.name}/assets`,
    },
  },
}, overrides)
