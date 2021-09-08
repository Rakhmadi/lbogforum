"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _vueMeta = require("vue-meta");

var _App = _interopRequireDefault(require("./App.vue"));

var _vue = require("vue");

var _router = _interopRequireDefault(require("./router"));

var _vue3GoogleOauth = _interopRequireDefault(require("vue3-google-oauth2"));

var _store = require("./store");

var _aos = _interopRequireDefault(require("aos"));

var _vueToaster = _interopRequireDefault(require("@meforma/vue-toaster"));

require("aos/dist/aos.css");

require("bootstrap/dist/css/bootstrap.min.css");

require("bootstrap/dist/js/bootstrap.min");

require("@mdi/font/css/materialdesignicons.min.css");

var _modal = _interopRequireDefault(require("./components/component/modal.vue"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

_aos["default"].init();

var app = (0, _vue.createApp)(_App["default"]);
app.component('modal', _modal["default"]);
var gAuthOptions = {
  clientId: '647291233126-97nmoe3tnqorroofhe5fv64m1vii99le.apps.googleusercontent.com',
  scope: 'email',
  prompt: 'select_account'
};
app.use(_router["default"]);
app.use(_store.store);
app.use((0, _vueMeta.createMetaManager)());
app.use(_vueToaster["default"]);
app.use(_vue3GoogleOauth["default"], gAuthOptions);
app.mount('#app');
var _default = app;
exports["default"] = _default;