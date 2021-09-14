"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = pDebounce;

// Source: https://github.com/sindresorhus/p-debounce/blob/master/index.js
// @ts-ignore
function pDebounce(fn, wait) {
  var options = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};

  if (!Number.isFinite(wait)) {
    throw new TypeError("Expected `wait` to be a finite number");
  } // @ts-ignore


  var leadingValue; // @ts-ignore

  var timer; // @ts-ignore

  var resolveList = []; // @ts-ignore

  return function () {
    var _this = this;

    for (var _len = arguments.length, arguments_ = new Array(_len), _key = 0; _key < _len; _key++) {
      arguments_[_key] = arguments[_key];
    }

    return new Promise(function (resolve) {
      // @ts-ignore
      var runImmediately = options.leading && !timer; // @ts-ignore

      clearTimeout(timer);
      timer = setTimeout(function () {
        timer = null; // @ts-ignore

        var result = options.leading // @ts-ignore
        ? leadingValue // @ts-ignore
        : fn.apply(_this, arguments_); // @ts-ignore

        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
          for (var _iterator = resolveList[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
            resolve = _step.value;
            resolve(result);
          }
        } catch (err) {
          _didIteratorError = true;
          _iteratorError = err;
        } finally {
          try {
            if (!_iteratorNormalCompletion && _iterator["return"] != null) {
              _iterator["return"]();
            }
          } finally {
            if (_didIteratorError) {
              throw _iteratorError;
            }
          }
        }

        resolveList = [];
      }, wait);

      if (runImmediately) {
        // @ts-ignore
        leadingValue = fn.apply(_this, arguments_);
        resolve(leadingValue);
      } else {
        resolveList.push(resolve);
      }
    });
  };
}