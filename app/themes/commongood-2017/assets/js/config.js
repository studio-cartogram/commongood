/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports, __webpack_require__) {

	eval("module.exports = __webpack_require__(1);\n\n\n//////////////////\n// WEBPACK FOOTER\n// multi config\n// module id = 0\n// module chunks = 0\n//# sourceURL=webpack:///multi_config?");

/***/ },
/* 1 */
/***/ function(module, exports) {

	eval("'use strict';\n\nObject.defineProperty(exports, \"__esModule\", {\n  value: true\n});\nvar ACTIVE_CLASS = 'is-active';\nvar COLOR_BLACK = '#171617';\nvar COLOR_DARK = '#252328';\nvar COLOR_LIGHT = '#93939E';\nvar TRANSITION_DURATION = 400;\nvar TRANSITION_EASING = 'easeInOutCubic';\nvar REVEALER_OPTIONS = {\n  bgcolor: COLOR_BLACK,\n  duration: TRANSITION_DURATION,\n  easing: TRANSITION_EASING,\n  direction: 'tb'\n};\n\nexports.ACTIVE_CLASS = ACTIVE_CLASS;\nexports.COLOR_BLACK = COLOR_BLACK;\nexports.COLOR_DARK = COLOR_DARK;\nexports.COLOR_LIGHT = COLOR_LIGHT;\nexports.TRANSITION_DURATION = TRANSITION_DURATION;\nexports.TRANSITION_EASING = TRANSITION_EASING;\nexports.REVEALER_OPTIONS = REVEALER_OPTIONS;\n\n//////////////////\n// WEBPACK FOOTER\n// ./assets/js/config.js\n// module id = 1\n// module chunks = 0 2\n//# sourceURL=webpack:///./assets/js/config.js?");

/***/ }
/******/ ]);