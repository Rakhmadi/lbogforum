"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _vueRouter = require("vue-router");

var _Home = _interopRequireDefault(require("./components/Home.vue"));

var _User = _interopRequireDefault(require("./components/User.vue"));

var _ExampleComponent = _interopRequireDefault(require("./components/ExampleComponent.vue"));

var _login = _interopRequireDefault(require("./components/login.vue"));

var _register = _interopRequireDefault(require("./components/register.vue"));

var _post = _interopRequireDefault(require("./components/post.vue"));

var _profile = _interopRequireDefault(require("./components/profile.vue"));

var _folower = _interopRequireDefault(require("./components/folower.vue"));

var _createPost = _interopRequireDefault(require("./components/createPost.vue"));

var _createPostC = _interopRequireDefault(require("./components/createPostC.vue"));

var _listPOST = _interopRequireDefault(require("./components/listPOST.vue"));

var _createTag = _interopRequireDefault(require("./components/createTag.vue"));

var _Galery = _interopRequireDefault(require("./components/Galery.vue"));

var _searchPage = _interopRequireDefault(require("./components/searchPage.vue"));

var _f = _interopRequireDefault(require("./components/f.vue"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

function cekLogin(to, from, next) {
  var resp, X;
  return regeneratorRuntime.async(function cekLogin$(_context) {
    while (1) {
      switch (_context.prev = _context.next) {
        case 0:
          _context.next = 2;
          return regeneratorRuntime.awrap(fetch("".concat(window.location.origin, "/api/CEK_TOKEN?token=").concat(sessionStorage['token'])));

        case 2:
          resp = _context.sent;
          _context.next = 5;
          return regeneratorRuntime.awrap(resp.json());

        case 5:
          X = _context.sent;

          if (X.msg === 'logged') {
            next(); // Silahkan masuk ke route ini
          } else if (resp.status === 401) {
            next({
              name: 'login'
            }); // Dilempar ke route dengan name: home
          } else {
            next({
              name: 'login'
            }); // Dilempar ke route dengan name: home
          }

        case 7:
        case "end":
          return _context.stop();
      }
    }
  });
}

var routes = [{
  path: '/f',
  component: _f["default"],
  children: [{
    path: 'login',
    name: 'login',
    component: _login["default"]
  }, {
    path: 'register',
    component: _register["default"]
  }]
}, {
  path: '/f/U/',
  component: _User["default"],
  children: [{
    path: 'home',
    beforeEnter: cekLogin,
    name: 'home',
    component: _Home["default"]
  }, {
    path: 'post',
    beforeEnter: cekLogin,
    component: _post["default"]
  }, {
    name: 'profile',
    beforeEnter: cekLogin,
    path: 'profile',
    component: _profile["default"]
  }, {
    name: 'folower',
    path: 'folower',
    component: _folower["default"]
  }, {
    name: 'searchPage',
    path: 'searchPage/:serch',
    component: _searchPage["default"]
  }, {
    beforeEnter: cekLogin,
    name: 'createPost',
    path: 'createPost',
    component: _createPost["default"],
    children: [{
      name: 'createPostC',
      path: 'createPostC',
      component: _createPostC["default"]
    }, {
      name: 'listPOST',
      path: 'listPOST',
      component: _listPOST["default"]
    }, {
      name: 'createTag',
      path: 'createTag',
      component: _createTag["default"]
    }, {
      name: 'Galery',
      path: 'Galery',
      component: _Galery["default"]
    }]
  }]
}];
var router = (0, _vueRouter.createRouter)({
  history: (0, _vueRouter.createWebHistory)(),
  base: "/".concat(window._locale, "/"),
  routes: routes
});
var _default = router;
exports["default"] = _default;