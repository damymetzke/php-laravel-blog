/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/edit-post.ts":
/*!***********************************!*\
  !*** ./resources/js/edit-post.ts ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var UPDATE_BUTTON = document.getElementById('update-post');
var DELETE_BUTTON = document.getElementById('delete-post');
var TITLE_ELEMENT = document.getElementById('post-title');
var BODY_ELEMENT = document.getElementById('post-body');
var POST_ID = document.getElementById('post-id').value;
var POST_URL = "/api/post/" + POST_ID;
DELETE_BUTTON.addEventListener("click", function () {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var data = JSON.parse(request.responseText);
            if ('success' in data && data.success === true) {
                window.location.href = "/admin";
            }
        }
    };
    request.open("DELETE", POST_URL, true);
    request.send();
});
UPDATE_BUTTON.addEventListener("click", function () {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var data = request.responseText;
            console.log(data);
        }
    };
    request.open("PATCH", POST_URL, true);
    request.setRequestHeader('Content-Type', 'application/json');
    request.send(JSON.stringify({
        title: TITLE_ELEMENT.value,
        body: BODY_ELEMENT.value
    }));
});


/***/ }),

/***/ "./resources/sass/admin.scss":
/*!***********************************!*\
  !*** ./resources/sass/admin.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/create-post.scss":
/*!*****************************************!*\
  !*** ./resources/sass/create-post.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/edit-post.scss":
/*!***************************************!*\
  !*** ./resources/sass/edit-post.scss ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/post.scss":
/*!**********************************!*\
  !*** ./resources/sass/post.scss ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/posts.scss":
/*!***********************************!*\
  !*** ./resources/sass/posts.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/root.scss":
/*!**********************************!*\
  !*** ./resources/sass/root.scss ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** multi ./resources/js/edit-post.ts ./resources/sass/root.scss ./resources/sass/posts.scss ./resources/sass/admin.scss ./resources/sass/post.scss ./resources/sass/edit-post.scss ./resources/sass/create-post.scss ***!
  \*************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /mnt/d/GitRepos/php-laravel-blog/resources/js/edit-post.ts */"./resources/js/edit-post.ts");
__webpack_require__(/*! /mnt/d/GitRepos/php-laravel-blog/resources/sass/root.scss */"./resources/sass/root.scss");
__webpack_require__(/*! /mnt/d/GitRepos/php-laravel-blog/resources/sass/posts.scss */"./resources/sass/posts.scss");
__webpack_require__(/*! /mnt/d/GitRepos/php-laravel-blog/resources/sass/admin.scss */"./resources/sass/admin.scss");
__webpack_require__(/*! /mnt/d/GitRepos/php-laravel-blog/resources/sass/post.scss */"./resources/sass/post.scss");
__webpack_require__(/*! /mnt/d/GitRepos/php-laravel-blog/resources/sass/edit-post.scss */"./resources/sass/edit-post.scss");
module.exports = __webpack_require__(/*! /mnt/d/GitRepos/php-laravel-blog/resources/sass/create-post.scss */"./resources/sass/create-post.scss");


/***/ })

/******/ });