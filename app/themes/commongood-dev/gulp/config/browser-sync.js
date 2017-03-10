/**
 * Override the Default
 * Core Browser Sync
 * Config
 *
 */
var project = require('../../project.config');

module.exports = {
  proxy: 'http://' + project.devUrl
};
