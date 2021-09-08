"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.store = void 0;

var _vuex = require("vuex");

var _axios = _interopRequireDefault(require("axios"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

var store = (0, _vuex.createStore)({
  state: {
    userDetail: [],
    postList: []
  },
  mutations: {
    setUserDetail: function setUserDetail(state, userDetail) {
      state.userDetail = userDetail;
    },
    postLists: function postLists(state, postList) {
      return state.postList = postList;
    }
  },
  actions: {
    getUserInfo: function getUserInfo(store, userId) {
      return fetch("/api/userDetail/".concat(userId, "?token=").concat(sessionStorage['token'])).then(function (x) {
        return x.json();
      }).then(function (data) {
        localStorage.setItem('userDetail', JSON.stringify(data));
        store.commit('setUserDetail', data);
        return store.state.userDetail;
      });
    },
    getPost: function getPost(_ref, _ref2) {
      var commit = _ref.commit,
          state = _ref.state;
      var order = _ref2.order,
          page = _ref2.page,
          friendpost = _ref2.friendpost;
      return _axios["default"].get("".concat(window.location.origin, "/api/post?order=").concat(order, "&page=").concat(page, "&friendpost=").concat(friendpost, "&token=").concat(sessionStorage['token'])).then(function (x) {
        commit('postLists', x.data);
        return state.postList;
      });
    },
    registerPost: function registerPost(_ref3, _ref4) {
      var commit = _ref3.commit;
      var name = _ref4.name,
          email = _ref4.email,
          password = _ref4.password;
      return _axios["default"].post('/api/Auth/Register', {
        name: name,
        email: email,
        password: password
      }).then(function (x) {
        return x;
      });
    },
    registerGooglePost: function registerGooglePost(_ref5, _ref6) {
      var commit = _ref5.commit;
      var data = _ref6.data;
      return _axios["default"].post('/api/Auth/GoogleAuth', {
        email: data.email,
        name: data.name,
        avatar: data.avatar,
        google_id: data.google_id
      }).then(function (x) {
        return x;
      });
    },
    logOut: function logOut() {
      return _axios["default"].get("/api/Auth/logout?token=".concat(sessionStorage['token'])).then(function (x) {
        return x;
      });
    },
    isDark: function isDark() {
      return localStorage.getItem('isDark');
    }
  }
});
exports.store = store;