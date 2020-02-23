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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/my-current-input.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/vir/my-current-input.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "my-current-input",
  props: ["value"],
  data: function data() {
    return {
      isInputActive: true
    };
  },
  computed: {
    displayValue: {
      get: function get() {
        if (this.isInputActive) {
          // Cursor is inside the input field. unformat display value for user
          return this.value.toString();
        } else {
          // User is not modifying now. Format display value for user interface
          return "$ " + this.value.toFixed(0).replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,");
        }
      },
      set: function set(modifiedValue) {
        // Recalculate value after ignoring "$" and "," in user input
        var newValue = parseFloat(modifiedValue.replace(/[^\d\.]/g, "")); // Ensure that it is not NaN

        if (isNaN(newValue)) {
          newValue = 0;
        } // Note: we cannot set this.value as it is a "prop". It needs to be passed to parent component
        // $emit the event so that parent component gets it


        this.$emit('input', newValue);
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/step1.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/vir/step1.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "step1",
  props: {
    virdata: {
      type: Object
    }
  },
  data: function data() {
    return {
      filedJob: [],
      vir: {
        filed: [],
        province: '',
        district: '',
        position_wish: []
      },
      province: [],
      districtAll: [],
      district: [],
      groupSale: [{
        id: 1,
        name: 'Sale Admin'
      }, {
        id: 2,
        name: 'Telesale'
      }, {
        id: 3,
        name: 'Sale tư vấn'
      }, {
        id: 4,
        name: 'Sale thị trường'
      }, {
        id: 5,
        name: 'Sale bán hàng'
      }, {
        id: 6,
        name: 'Sale online'
      }],
      errors: {}
    };
  },
  mounted: function mounted() {
    // this.removeAllRawDataLocalStorage();
    this.fetchAllFieldJob();
    this.fetchAllProvince(); // this.profile['account']['name'] = 'tienvm';
    // this.profile['accountDetail']['gender'] = 2;
  },
  methods: {
    changeInputPostition: function changeInputPostition() {},
    nextStep1: function nextStep1() {
      var objectNullValidate = !(Object.keys(this.validateForm()).length === 0 && this.validateForm().constructor === Object);

      if (objectNullValidate) {
        this.errors = this.validateForm();
        return;
      }

      this.pushRawDataToLocalStorage(this.vir);
      this.$emit('pass-data-to-paren', 2);
    },
    validateForm: function validateForm() {
      var requiredInput = 'Trường này không được để trống';
      var errors = {};

      if (!this.vir.province) {
        errors.province = requiredInput;
      }

      return errors;
    },
    fetchAllFieldJob: function fetchAllFieldJob() {
      var _this = this;

      axios.get('/account/get-all-filed-job').then(function (data) {
        _this.filedJob = data.data; // this.profile.accountEdu = data.data;
      });
    },
    fetchAllProvince: function fetchAllProvince() {
      var _this2 = this;

      axios.get('/api/list-province').then(function (data) {
        _this2.province = data.data[0];
        _this2.districtAll = data.data[1];
      });
    },
    pushRawDataToLocalStorage: function pushRawDataToLocalStorage(rawData) {
      var rawDataStorage = {};

      if (this.getRawDataToLocalStorage()) {
        rawDataStorage = this.getRawDataToLocalStorage();
      }

      rawDataStorage['step1'] = rawData;
      localStorage.setItem('rawDataCallServer', JSON.stringify(rawDataStorage));
    },
    getRawDataToLocalStorage: function getRawDataToLocalStorage() {
      return JSON.parse(localStorage.getItem('rawDataCallServer'));
    },
    removeAllRawDataLocalStorage: function removeAllRawDataLocalStorage() {
      var rawDataStorage = {};

      if (this.getRawDataToLocalStorage()) {
        rawDataStorage = this.getRawDataToLocalStorage();
        delete rawDataStorage['step2'];
        delete rawDataStorage['step3'];
        delete rawDataStorage['step1'];
        localStorage.setItem('rawDataCallServer', JSON.stringify(rawDataStorage));
      }
    },
    changeProvince: function changeProvince() {
      this.district = this.districtAll[this.vir.province];
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/step2.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/vir/step2.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _my_current_input_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./my-current-input.vue */ "./resources/js/vir/my-current-input.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "step2",
  components: {
    MyCurrencyInput: _my_current_input_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  data: function data() {
    return {
      envCompany: [{
        id: 1,
        name: 'Thu nhập'
      }, {
        id: 2,
        name: 'Kiến thức'
      }, {
        id: 3,
        name: 'Môi trường'
      }, {
        id: 4,
        name: 'Cơ hội thăng tiến'
      }],
      vir: {
        env: [],
        skill: [],
        character: [],
        baseSalaryMin: '',
        baseSalaryMax: '',
        inComeMin: '',
        inComeMax: ''
      },
      allSkill: [],
      allCharacters: [],
      allFieldJob: []
    };
  },
  methods: {
    fetchAllSkill: function fetchAllSkill() {
      var _this = this;

      axios.get('/account/get-list-all-skill').then(function (data) {
        _this.allSkill = data.data;
      });
    },
    fetchAllFieldJob: function fetchAllFieldJob() {
      var _this2 = this;

      axios.get('/account/get-all-filed-job').then(function (data) {
        _this2.allFieldJob = data.data;

        _this2.allFieldJob.unshift({
          'id': 0,
          'name': 'Ngành nghề'
        });
      });
    },
    pushRawDataToLocalStorage: function pushRawDataToLocalStorage(rawData) {
      var rawDataStorage = {};

      if (this.getRawDataToLocalStorage()) {
        rawDataStorage = this.getRawDataToLocalStorage();
      }

      rawDataStorage['step2'] = rawData;
      localStorage.setItem('rawDataCallServer', JSON.stringify(rawDataStorage));
    },
    getRawDataToLocalStorage: function getRawDataToLocalStorage() {
      return JSON.parse(localStorage.getItem('rawDataCallServer'));
    },
    fetchAllCharactor: function fetchAllCharactor() {
      var _this3 = this;

      axios.get('/account/get-list-all-character').then(function (data) {
        _this3.allCharacters = data.data; // this.profile.accountEdu = data.data;
      });
    },
    nextStep2: function nextStep2() {
      this.pushRawDataToLocalStorage(this.vir);
      this.$emit('pass-data-to-paren', 3);
    },
    removeRawDataLocalStorage: function removeRawDataLocalStorage() {
      var rawDataStorage = {};

      if (this.getRawDataToLocalStorage()) {
        rawDataStorage = this.getRawDataToLocalStorage();
        delete rawDataStorage['step2'];
        delete rawDataStorage['step3'];
        localStorage.setItem('rawDataCallServer', JSON.stringify(rawDataStorage));
      }
    },
    backStep: function backStep() {
      this.$emit('pass-data-to-paren', 1);
    }
  },
  mounted: function mounted() {
    var rawData = this.getRawDataToLocalStorage();
    this.fetchAllSkill();
    this.fetchAllCharactor();
    this.fetchAllFieldJob(); // this.removeRawDataLocalStorage();
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/step3.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/vir/step3.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "step3",
  data: function data() {
    return {
      vir: {
        full_name: '',
        number_phone: '',
        email: '' // date_of_birth : ''

      },
      errors: {},
      isDisable: {
        full_name: false,
        number_phone: false,
        email: false
      }
    };
  },
  mounted: function mounted() {
    var rawData = this.getRawDataToLocalStorage();
    this.setUserLogin(); // this.removeRawDataLocalStorage();
  },
  methods: {
    setUserLogin: function setUserLogin() {
      if (userInfo) {
        this.vir.full_name = userInfo.name;
        this.vir.number_phone = userInfo.phone;
        this.vir.email = userInfo.email; // set disable button

        this.isDisable.full_name = true;
        this.isDisable.number_phone = true;
        this.isDisable.email = true;
      }
    },
    pushRawDataToLocalStorage: function pushRawDataToLocalStorage(rawData) {
      var rawDataStorage = {};

      if (this.getRawDataToLocalStorage()) {
        rawDataStorage = this.getRawDataToLocalStorage();
      }

      rawDataStorage['step3'] = rawData;
      localStorage.setItem('rawDataCallServer', JSON.stringify(rawDataStorage));
    },
    getRawDataToLocalStorage: function getRawDataToLocalStorage() {
      return JSON.parse(localStorage.getItem('rawDataCallServer'));
    },
    backStep: function backStep() {
      this.$emit('pass-data-to-paren', 2);
    },
    btnSubmit: function btnSubmit() {
      var objectNullValidate = !(Object.keys(this.validateForm()).length === 0 && this.validateForm().constructor === Object);

      if (objectNullValidate) {
        this.errors = this.validateForm();
        return;
      }

      this.pushRawDataToLocalStorage(this.vir);
      this.$emit('pass-data-to-paren', 5);
    },
    removeRawDataLocalStorage: function removeRawDataLocalStorage() {
      var rawDataStorage = {};

      if (this.getRawDataToLocalStorage()) {
        rawDataStorage = this.getRawDataToLocalStorage();
        delete rawDataStorage['step3'];
        localStorage.setItem('rawDataCallServer', JSON.stringify(rawDataStorage));
      }
    },
    validateForm: function validateForm() {
      var requiredInput = 'Trường này không được để trống';
      var errors = {};

      if (!this.vir.full_name) {
        errors.full_name = requiredInput;
      }

      if (!this.vir.number_phone) {
        errors.number_phone = requiredInput;
      }

      if (!this.vir.email) {
        errors.email = requiredInput;
      }

      return errors;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/step4.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/vir/step4.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "step4"
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/stepLast.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/vir/stepLast.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "stepLast",
  props: {
    virdata: {
      type: Object
    }
  },
  data: function data() {
    return {
      listJob: []
    };
  },
  mounted: function mounted() {
    // localStorage.clear();
    var rawData = this.getRawDataToLocalStorage();
    this.fetchAllDataJob();
    this.updateDesire();
    this.updateSkill();
    this.updateCharactor();
  },
  methods: {
    btnSubmit: function btnSubmit() {},
    formatPrice: function formatPrice(value) {
      var val = (value / 1).toFixed(0).replace('.', ',');
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    backStep: function backStep() {
      this.$emit('pass-data-to-paren', 3);
    },
    getRawDataToLocalStorage: function getRawDataToLocalStorage() {
      return JSON.parse(localStorage.getItem('rawDataCallServer'));
    },
    updateAllRawDataToProfileUser: function updateAllRawDataToProfileUser() {},
    updateCharactor: function updateCharactor() {
      var rawDataLocalStorage = this.getRawDataToLocalStorage();

      if (typeof rawDataLocalStorage['step2']['character'] != "undefined" && rawDataLocalStorage['step2']['character'].length > 0) {
        var rawData = [];
        rawDataLocalStorage['step2']['character'].forEach(function (item) {
          rawData.push({
            name: 'Can than',
            id: item
          });
        });
        axios.post('/api/update-account-character', [rawData]).then(function (response) {})["catch"](function (err) {});
      }
    },
    updateSkill: function updateSkill() {
      var rawDataLocalStorage = this.getRawDataToLocalStorage();

      if (typeof rawDataLocalStorage['step2']['skill'] != "undefined" && rawDataLocalStorage['step2']['skill'].length > 0) {
        rawDataLocalStorage['step2']['skill'].forEach(function (item) {
          var _this = this;

          var dataPost = {
            'skill_id': item,
            'point': 50
          };
          axios.post('/account/add-account-skill', dataPost).then(function (data) {})["catch"](function (error) {
            _this.isLoading = false;
            _this.errors = {
              skill_id: 'Kỹ năng đã tồn tại'
            };
            return;
          });
        });
      }
    },
    updateDesire: function updateDesire() {
      var rawDataLocalStorage = this.getRawDataToLocalStorage();
      var rawData = {// filed_work_wish : this.profile['accountWish']['filed_work_wish'],
        // position_wish : this.profile['accountWish']['position_wish'],
        // - job_type_wish : this.profile['accountWish']['job_type_wish'],
        // - salary_wish : this.profile['accountWish']['salary_wish'],
        // province_id : this.profile['accountWish']['province_id'],
        // district_id : this.profile['accountWish']['district_id'],
        //  - current_priority : this.profile['accountWish']['current_priority'],
      };

      if (typeof rawDataLocalStorage['step1']['province'] != "undefined") {
        rawData['province_id'] = rawDataLocalStorage['step1']['province'];
      }

      if (typeof rawDataLocalStorage['step2']['env'] != "undefined" && rawDataLocalStorage['step2']['env'].length > 0) {
        rawData['current_priority'] = rawDataLocalStorage['step2']['env'][0];
      }

      if (typeof rawDataLocalStorage['step1']['district'] != "undefined") {
        rawData['district_id'] = rawDataLocalStorage['step1']['district'];
      }

      if (typeof rawDataLocalStorage['step1']['position_wish'] != "undefined" && rawDataLocalStorage['step1']['position_wish'].length > 0) {
        rawData['position_wish'] = rawDataLocalStorage['step1']['position_wish'][0];
      }

      if (typeof rawDataLocalStorage['step1']['filed'] != "undefined" && rawDataLocalStorage['step1']['filed'].length > 0) {
        rawData['filed_work_wish'] = rawDataLocalStorage['step1']['filed'][0];
      }

      axios.post('/account/add-account-wish', rawData).then(function (data) {});
    },
    fetchAllDataJob: function fetchAllDataJob() {
      var _this2 = this;

      var rawDataLocalStorage = this.getRawDataToLocalStorage();
      var rawData = {
        data: {
          province_id: rawDataLocalStorage['step1']['province'],
          name: '',
          phone: '',
          email: '',
          // date_of_birth : '',
          districts: rawDataLocalStorage['step1']['district'],
          skill_id: rawDataLocalStorage['step1']['skill'],
          tag_id: rawDataLocalStorage['step1']['position_wish'],
          character_id: rawDataLocalStorage['step2']['character'],
          base_salary_min: rawDataLocalStorage['step2']['baseSalaryMin'],
          base_salary_max: rawDataLocalStorage['step2']['baseSalaryMax'],
          income_min: rawDataLocalStorage['step2']['inComeMax'],
          income_max: rawDataLocalStorage['step2']['inComeMin']
        }
      };
      axios.post('api/virtual-assistant/get-job', rawData).then(function (data) {
        _this2.listJob = data.data;
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/top-step.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/vir/top-step.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "top-step",
  props: {
    virdata: {
      type: Object
    }
  },
  data: function data() {
    return {
      classActive: {
        step1: '',
        step2: '',
        step3: '',
        step5: ''
      }
    };
  },
  methods: {
    buildClassStep: function buildClassStep() {
      return 'progress-list--active-' + this.virdata.step;
    }
  },
  mounted: function mounted() {}
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/my-current-input.vue?vue&type=template&id=648121fa&scoped=true&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/vir/my-current-input.vue?vue&type=template&id=648121fa&scoped=true& ***!
  \************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("input", {
      directives: [
        {
          name: "model",
          rawName: "v-model",
          value: _vm.displayValue,
          expression: "displayValue"
        }
      ],
      staticClass: "form-control",
      attrs: { type: "text" },
      domProps: { value: _vm.displayValue },
      on: {
        blur: function($event) {
          _vm.isInputActive = false
        },
        focus: function($event) {
          _vm.isInputActive = true
        },
        input: function($event) {
          if ($event.target.composing) {
            return
          }
          _vm.displayValue = $event.target.value
        }
      }
    })
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/step1.vue?vue&type=template&id=028e9c32&scoped=true&":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/vir/step1.vue?vue&type=template&id=028e9c32&scoped=true& ***!
  \*************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "va-step va-step-1 animated " }, [
    _c("div", { staticClass: "page-block m-b-30 p-b-20" }, [
      _c(
        "div",
        { staticClass: "choose-tags", attrs: { id: "va_step_workfield" } },
        [
          _c("div", { staticClass: "s-text2 m-b-6" }, [
            _vm._v("Ngành nghề mà bạn quan tâm?")
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "s-text8 m-b-20" }, [
            _vm._v("Được chọn tối đa 3 ngành nghề")
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "choose-tags__block" },
            _vm._l(_vm.filedJob, function(item) {
              return _c("div", { staticClass: "choose-tags__item" }, [
                _c(
                  "label",
                  {
                    class: _vm.vir.filed.includes(item.id) ? "is-checked" : "",
                    attrs: { for: "workfield-" + item.id }
                  },
                  [
                    _vm._v(
                      "\n                            " +
                        _vm._s(item.name) +
                        "\n                            "
                    ),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.vir.filed,
                          expression: "vir.filed"
                        }
                      ],
                      staticClass: "custom-control-input",
                      attrs: {
                        type: "checkbox",
                        checked: "checked",
                        id: "workfield-" + item.id,
                        disabled:
                          _vm.vir.filed.length > 2 &&
                          _vm.vir.filed.indexOf(item.id) === -1
                      },
                      domProps: {
                        value: item.id,
                        checked: Array.isArray(_vm.vir.filed)
                          ? _vm._i(_vm.vir.filed, item.id) > -1
                          : _vm.vir.filed
                      },
                      on: {
                        change: function($event) {
                          var $$a = _vm.vir.filed,
                            $$el = $event.target,
                            $$c = $$el.checked ? true : false
                          if (Array.isArray($$a)) {
                            var $$v = item.id,
                              $$i = _vm._i($$a, $$v)
                            if ($$el.checked) {
                              $$i < 0 &&
                                _vm.$set(_vm.vir, "filed", $$a.concat([$$v]))
                            } else {
                              $$i > -1 &&
                                _vm.$set(
                                  _vm.vir,
                                  "filed",
                                  $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                                )
                            }
                          } else {
                            _vm.$set(_vm.vir, "filed", $$c)
                          }
                        }
                      }
                    })
                  ]
                )
              ])
            }),
            0
          )
        ]
      )
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "page-block m-b-30 p-b-10" }, [
      _c("div", { staticClass: "s-text2 m-b-20" }, [
        _vm._v("Bạn ở khu vực nào?")
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "grid-form grid-form--no-fix" }, [
        _c("div", { staticClass: "grid-form__item" }, [
          _vm._m(0),
          _vm._v(" "),
          _c("div", { staticClass: "select-wrapper" }, [
            _c(
              "select",
              {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.vir.province,
                    expression: "vir.province"
                  }
                ],
                staticClass: "chosen-select primary-select",
                attrs: {
                  id: "province_id",
                  click: _vm.changeProvince(),
                  "data-placeholder": "Chọn tỉnh thành...",
                  tabindex: "2"
                },
                on: {
                  change: function($event) {
                    var $$selectedVal = Array.prototype.filter
                      .call($event.target.options, function(o) {
                        return o.selected
                      })
                      .map(function(o) {
                        var val = "_value" in o ? o._value : o.value
                        return val
                      })
                    _vm.$set(
                      _vm.vir,
                      "province",
                      $event.target.multiple ? $$selectedVal : $$selectedVal[0]
                    )
                  }
                }
              },
              [
                _c("option", { attrs: { value: "", selected: "" } }, [
                  _vm._v("Chọn tỉnh thành")
                ]),
                _vm._v(" "),
                _vm._l(_vm.province, function(item) {
                  return _c(
                    "option",
                    {
                      attrs: { "data-placeholder": "Chọn Tỉnh/Thành phố" },
                      domProps: { value: item.id }
                    },
                    [_vm._v(_vm._s(item.provinceName))]
                  )
                })
              ],
              2
            ),
            _vm._v(" "),
            _vm.errors["province"]
              ? _c(
                  "span",
                  {
                    staticClass:
                      "text-danger notification_email text-under-input"
                  },
                  [_vm._v(_vm._s(_vm.errors["province"]))]
                )
              : _vm._e()
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "grid-form__item" }, [
          _c("label", [_vm._v("Quận/Huyện")]),
          _vm._v(" "),
          _c("div", { staticClass: "select-wrapper" }, [
            _c(
              "select",
              {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.vir.district,
                    expression: "vir.district"
                  }
                ],
                staticClass: "chosen-select primary-select",
                attrs: {
                  name: "district_id",
                  id: "district_id",
                  "data-placeholder": "Chọn quận huyện...",
                  tabindex: "2"
                },
                on: {
                  change: function($event) {
                    var $$selectedVal = Array.prototype.filter
                      .call($event.target.options, function(o) {
                        return o.selected
                      })
                      .map(function(o) {
                        var val = "_value" in o ? o._value : o.value
                        return val
                      })
                    _vm.$set(
                      _vm.vir,
                      "district",
                      $event.target.multiple ? $$selectedVal : $$selectedVal[0]
                    )
                  }
                }
              },
              [
                _c("option", { attrs: { value: "", selected: "" } }, [
                  _vm._v("Chọn quận huyện")
                ]),
                _vm._v(" "),
                _vm._l(_vm.district, function(item) {
                  return _c(
                    "option",
                    { domProps: { value: item.districtsId } },
                    [_vm._v(_vm._s(item.name))]
                  )
                })
              ],
              2
            )
          ])
        ])
      ])
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "page-block m-b-30 p-b-20" }, [
      _c(
        "div",
        { staticClass: "choose-tags", attrs: { id: "va_step_salefield" } },
        [
          _c("div", { staticClass: "s-text2 m-b-6" }, [
            _vm._v("Vị trí mà bạn thấy phù hợp?")
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "s-text8 m-b-20" }, [
            _vm._v("Được chọn tối đa 2 vị trí")
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "choose-tags__block" },
            _vm._l(_vm.groupSale, function(item) {
              return _c("div", { staticClass: "choose-tags__item" }, [
                _c(
                  "label",
                  {
                    class: _vm.vir.position_wish.includes(item.id)
                      ? "is-checked"
                      : "",
                    attrs: { for: "position-" + item.id }
                  },
                  [
                    _vm._v(
                      "\n                            " +
                        _vm._s(item.name) +
                        "\n                            "
                    ),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.vir.position_wish,
                          expression: "vir.position_wish"
                        }
                      ],
                      staticClass: "custom-control-input",
                      attrs: {
                        type: "checkbox",
                        value: "",
                        name: "tag_id",
                        id: "position-" + item.id,
                        disabled:
                          _vm.vir.position_wish.length > 1 &&
                          _vm.vir.position_wish.indexOf(item.id) === -1
                      },
                      domProps: {
                        value: item.id,
                        checked: Array.isArray(_vm.vir.position_wish)
                          ? _vm._i(_vm.vir.position_wish, item.id) > -1
                          : _vm.vir.position_wish
                      },
                      on: {
                        change: [
                          function($event) {
                            var $$a = _vm.vir.position_wish,
                              $$el = $event.target,
                              $$c = $$el.checked ? true : false
                            if (Array.isArray($$a)) {
                              var $$v = item.id,
                                $$i = _vm._i($$a, $$v)
                              if ($$el.checked) {
                                $$i < 0 &&
                                  _vm.$set(
                                    _vm.vir,
                                    "position_wish",
                                    $$a.concat([$$v])
                                  )
                              } else {
                                $$i > -1 &&
                                  _vm.$set(
                                    _vm.vir,
                                    "position_wish",
                                    $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                                  )
                              }
                            } else {
                              _vm.$set(_vm.vir, "position_wish", $$c)
                            }
                          },
                          function($event) {
                            return _vm.changeInputPostition()
                          }
                        ]
                      }
                    })
                  ]
                )
              ])
            }),
            0
          )
        ]
      )
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "button-container tar m-b-40" }, [
      _c(
        "div",
        {
          staticClass: "button-primary btn-step-1 tac",
          on: {
            click: function($event) {
              return _vm.nextStep1()
            }
          }
        },
        [
          _vm._v("Tiếp tục"),
          _c("i", { staticClass: "icon-right-arrow m-l-10" })
        ]
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Tỉnh/Thành phố "),
      _c("sup", { staticClass: "text-danger" }, [_vm._v("*")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/step2.vue?vue&type=template&id=02726d30&scoped=true&":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/vir/step2.vue?vue&type=template&id=02726d30&scoped=true& ***!
  \*************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "va-step va-step-2 animated fadeInDown" }, [
    _c(
      "div",
      {
        staticClass: "button-secondary m-b-30",
        on: {
          click: function($event) {
            return _vm.backStep()
          }
        }
      },
      [_c("i", { staticClass: "icon-left-arrow m-r-10" }), _vm._v("Quay lại")]
    ),
    _vm._v(" "),
    _c("div", { staticClass: "page-block m-b-30 p-b-20" }, [
      _c(
        "div",
        { staticClass: "choose-tags", attrs: { id: "va_step_concern" } },
        [
          _c("div", { staticClass: "s-text2 m-b-6" }, [
            _vm._v("Hiện tại bạn quan tâm đến điều gì nhất?")
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "s-text8 m-b-20" }, [
            _vm._v("Được chọn 1 điều quan tâm")
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "choose-tags__block" },
            _vm._l(_vm.envCompany, function(item) {
              return _c("div", { staticClass: "choose-tags__item" }, [
                _c(
                  "label",
                  {
                    class: _vm.vir.env.includes(item.id) ? "is-checked" : "",
                    attrs: { for: "concern-" + item.id }
                  },
                  [
                    _vm._v(
                      "\n                        " +
                        _vm._s(item.name) +
                        "\n                        "
                    ),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.vir.env,
                          expression: "vir.env"
                        }
                      ],
                      staticClass: "custom-control-input",
                      attrs: {
                        type: "checkbox",
                        id: "concern-" + item.id,
                        disabled:
                          _vm.vir.env.length > 0 &&
                          _vm.vir.env.indexOf(item.id) === -1
                      },
                      domProps: {
                        value: item.id,
                        checked: Array.isArray(_vm.vir.env)
                          ? _vm._i(_vm.vir.env, item.id) > -1
                          : _vm.vir.env
                      },
                      on: {
                        change: function($event) {
                          var $$a = _vm.vir.env,
                            $$el = $event.target,
                            $$c = $$el.checked ? true : false
                          if (Array.isArray($$a)) {
                            var $$v = item.id,
                              $$i = _vm._i($$a, $$v)
                            if ($$el.checked) {
                              $$i < 0 &&
                                _vm.$set(_vm.vir, "env", $$a.concat([$$v]))
                            } else {
                              $$i > -1 &&
                                _vm.$set(
                                  _vm.vir,
                                  "env",
                                  $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                                )
                            }
                          } else {
                            _vm.$set(_vm.vir, "env", $$c)
                          }
                        }
                      }
                    })
                  ]
                )
              ])
            }),
            0
          )
        ]
      )
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "page-block m-b-30" }, [
      _c("div", { staticClass: "choose-tags" }, [
        _c("div", { staticClass: "s-text2 m-b-20" }, [
          _vm._v("Bạn đã có kinh nghiệm chưa?")
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "m-checkbox-container" }, [
          _c("div", { staticClass: "m-checkbox__item" }, [
            _vm._m(0),
            _vm._v(" "),
            _c("div", { staticClass: "grid-form" }, [
              _vm._m(1),
              _vm._v(" "),
              _c("div", { staticClass: "grid-form__item select-wrapper" }, [
                _c(
                  "select",
                  {
                    staticClass: "primary-select",
                    attrs: {
                      name: "exp_field",
                      "data-placeholder": "Bất động sản"
                    }
                  },
                  _vm._l(_vm.allFieldJob, function(item) {
                    return _c("option", { domProps: { value: item.id } }, [
                      _vm._v(_vm._s(item.name))
                    ])
                  }),
                  0
                )
              ]),
              _vm._v(" "),
              _vm._m(2)
            ])
          ]),
          _vm._v(" "),
          _vm._m(3)
        ])
      ])
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "page-block m-b-30 p-b-20" }, [
      _c(
        "div",
        { staticClass: "choose-tags", attrs: { id: "va_step_skill" } },
        [
          _c("div", { staticClass: "s-text2 m-b-6" }, [
            _vm._v("Bạn có những kĩ năng nào sau đây?")
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "s-text8 m-b-20" }, [
            _vm._v("Được chọn tối đa 5 kĩ năng")
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "choose-tags__block" },
            _vm._l(_vm.allSkill, function(item) {
              return _c("div", { staticClass: "choose-tags__item" }, [
                _c(
                  "label",
                  {
                    class: _vm.vir.skill.includes(item.id) ? "is-checked" : "",
                    attrs: { for: "skill-" + item.id }
                  },
                  [
                    _vm._v(
                      "\n                        " +
                        _vm._s(item.value) +
                        "\n                        "
                    ),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.vir.skill,
                          expression: "vir.skill"
                        }
                      ],
                      staticClass: "custom-control-input",
                      attrs: {
                        type: "checkbox",
                        id: "skill-" + item.id,
                        disabled:
                          _vm.vir.skill.length > 4 &&
                          _vm.vir.skill.indexOf(item.id) === -1
                      },
                      domProps: {
                        value: item.id,
                        checked: Array.isArray(_vm.vir.skill)
                          ? _vm._i(_vm.vir.skill, item.id) > -1
                          : _vm.vir.skill
                      },
                      on: {
                        change: function($event) {
                          var $$a = _vm.vir.skill,
                            $$el = $event.target,
                            $$c = $$el.checked ? true : false
                          if (Array.isArray($$a)) {
                            var $$v = item.id,
                              $$i = _vm._i($$a, $$v)
                            if ($$el.checked) {
                              $$i < 0 &&
                                _vm.$set(_vm.vir, "skill", $$a.concat([$$v]))
                            } else {
                              $$i > -1 &&
                                _vm.$set(
                                  _vm.vir,
                                  "skill",
                                  $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                                )
                            }
                          } else {
                            _vm.$set(_vm.vir, "skill", $$c)
                          }
                        }
                      }
                    })
                  ]
                )
              ])
            }),
            0
          )
        ]
      )
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "page-block m-b-30 p-b-20" }, [
      _c(
        "div",
        { staticClass: "choose-tags", attrs: { id: "va_step_character" } },
        [
          _c("div", { staticClass: "s-text2 m-b-6" }, [
            _vm._v("Bạn thấy mình là người thế nào?")
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "s-text8 m-b-20" }, [
            _vm._v("Được chọn tối đa 5 tính cách")
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "choose-tags__block" },
            _vm._l(_vm.allCharacters, function(item) {
              return _c("div", { staticClass: "choose-tags__item" }, [
                _c(
                  "label",
                  {
                    class: _vm.vir.character.includes(item.id)
                      ? "is-checked"
                      : "",
                    attrs: { for: "character-" + item.id }
                  },
                  [
                    _vm._v(
                      "\n                        " +
                        _vm._s(item.name) +
                        "\n                        "
                    ),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.vir.character,
                          expression: "vir.character"
                        }
                      ],
                      staticClass: "custom-control-input",
                      attrs: {
                        type: "checkbox",
                        id: "character-" + item.id,
                        disabled:
                          _vm.vir.character.length > 4 &&
                          _vm.vir.character.indexOf(item.id) === -1
                      },
                      domProps: {
                        value: item.id,
                        checked: Array.isArray(_vm.vir.character)
                          ? _vm._i(_vm.vir.character, item.id) > -1
                          : _vm.vir.character
                      },
                      on: {
                        change: function($event) {
                          var $$a = _vm.vir.character,
                            $$el = $event.target,
                            $$c = $$el.checked ? true : false
                          if (Array.isArray($$a)) {
                            var $$v = item.id,
                              $$i = _vm._i($$a, $$v)
                            if ($$el.checked) {
                              $$i < 0 &&
                                _vm.$set(
                                  _vm.vir,
                                  "character",
                                  $$a.concat([$$v])
                                )
                            } else {
                              $$i > -1 &&
                                _vm.$set(
                                  _vm.vir,
                                  "character",
                                  $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                                )
                            }
                          } else {
                            _vm.$set(_vm.vir, "character", $$c)
                          }
                        }
                      }
                    })
                  ]
                )
              ])
            }),
            0
          )
        ]
      )
    ]),
    _vm._v(" "),
    _vm._m(4),
    _vm._v(" "),
    _c("div", { staticClass: "button-container tar m-b-40" }, [
      _c(
        "div",
        {
          staticClass: "button-secondary fl",
          on: {
            click: function($event) {
              return _vm.backStep()
            }
          }
        },
        [_c("i", { staticClass: "icon-left-arrow m-r-10" }), _vm._v("Quay lại")]
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "button-primary",
          on: {
            click: function($event) {
              return _vm.nextStep2()
            }
          }
        },
        [
          _vm._v("Tiếp tục"),
          _c("i", { staticClass: "icon-right-arrow m-l-10" })
        ]
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "m-checkbox m-b-18" }, [
      _c("input", {
        staticClass: "radio-select-input",
        attrs: {
          type: "radio",
          name: "exp",
          value: "1",
          id: "exp_1",
          checked: "checked"
        }
      }),
      _vm._v("Đã có"),
      _c("span", { staticClass: "checkmark" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "grid-form__item select-wrapper" }, [
      _c(
        "select",
        {
          staticClass: "primary-select",
          attrs: { name: "exp_sale", "data-placeholder": "Telesale" }
        },
        [
          _c("option", { attrs: { value: "-1" } }, [_vm._v("Vị trí sale")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "1" } }, [_vm._v("Telesales")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "2" } }, [_vm._v("Sales trực tiếp")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "3" } }, [_vm._v("Sales tư vấn")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "4" } }, [_vm._v("Sales phân phối")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "5" } }, [_vm._v("Sales online")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "6" } }, [_vm._v("Sales admin")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "grid-form__item select-wrapper" }, [
      _c(
        "select",
        {
          staticClass: "primary-select",
          attrs: { name: "exp_year", "data-placeholder": "2 năm" }
        },
        [
          _c("option", { attrs: { value: "-1" } }, [
            _vm._v("Số năm kinh nghiệm")
          ]),
          _vm._v(" "),
          _c("option", { attrs: { value: "1" } }, [_vm._v("1 năm")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "2" } }, [_vm._v("2 năm")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "3" } }, [_vm._v("3 năm")]),
          _vm._v(" "),
          _c("option", { attrs: { value: "4" } }, [_vm._v("Trên 3 năm")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-checkbox__item" }, [
      _c("label", { staticClass: "m-checkbox" }, [
        _c("input", {
          attrs: { type: "radio", name: "exp", value: "2", id: "exp_2" }
        }),
        _vm._v("Chưa có"),
        _c("span", { staticClass: "checkmark" })
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "page-block m-b-30 p-b-10" }, [
      _c("div", { staticClass: "s-text2 m-b-20" }, [_vm._v("Thu nhập")]),
      _vm._v(" "),
      _c("div", { staticClass: "grid-form" }, [
        _c("div", { staticClass: "grid-form__item" }, [
          _c("label", [_vm._v("Thu nhập")]),
          _vm._v(" "),
          _c("div", { staticClass: "select-wrapper" }, [
            _c(
              "select",
              {
                staticClass: "primary-select",
                attrs: {
                  name: "salary_wish",
                  "data-placeholder": "Chọn mức thu nhập",
                  tabindex: "2"
                }
              },
              [
                _c(
                  "option",
                  {
                    attrs: {
                      value: "null",
                      disabled: "disabled",
                      selected: "selected"
                    }
                  },
                  [_vm._v("Chọn mức thu nhập")]
                ),
                _vm._v(" "),
                _c("option", { attrs: { value: "1" } }, [
                  _vm._v("Dưới 6,000,000 vnđ")
                ]),
                _vm._v(" "),
                _c("option", { attrs: { value: "2" } }, [
                  _vm._v("6,000,000 vnđ - 8,000,000 vnđ")
                ]),
                _vm._v(" "),
                _c("option", { attrs: { value: "3" } }, [
                  _vm._v("8,000,000 vnđ - 10,000,000 vnđ")
                ]),
                _vm._v(" "),
                _c("option", { attrs: { value: "4" } }, [
                  _vm._v("10,000,000 vnđ - 15,000,000 vnđ")
                ]),
                _vm._v(" "),
                _c("option", { attrs: { value: "5" } }, [
                  _vm._v("15,000,000 vnđ - 20,000,000 vnđ")
                ]),
                _vm._v(" "),
                _c("option", { attrs: { value: "6" } }, [
                  _vm._v("20,000,000 vnđ - 30,000,000 vnđ")
                ]),
                _vm._v(" "),
                _c("option", { attrs: { value: "7" } }, [
                  _vm._v("30,000,000 vnđ - 50,000,000 vnđ")
                ]),
                _vm._v(" "),
                _c("option", { attrs: { value: "8" } }, [
                  _vm._v("50,000,000 vnđ - 100,000,000 vnđ")
                ]),
                _vm._v(" "),
                _c("option", { attrs: { value: "9" } }, [
                  _vm._v("Trên 100,000,000 vnđ")
                ])
              ]
            )
          ])
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/step3.vue?vue&type=template&id=02563e2e&scoped=true&":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/vir/step3.vue?vue&type=template&id=02563e2e&scoped=true& ***!
  \*************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "va-step va-step-3 animated fadeInDown" }, [
    _c("div", { staticClass: "page-container size1" }, [
      _c(
        "div",
        {
          staticClass: "button-secondary m-b-30",
          on: {
            click: function($event) {
              return _vm.backStep()
            }
          }
        },
        [_c("i", { staticClass: "icon-left-arrow m-r-10" }), _vm._v("Quay lại")]
      ),
      _vm._v(" "),
      _c("div", { staticClass: "page-block m-b-40" }, [
        _vm._m(0),
        _vm._v(" "),
        _c("div", { staticClass: "form-group m-b-20" }, [
          _vm._m(1),
          _vm._v(" "),
          _c("div", { staticClass: "form-group__input" }, [
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.vir.full_name,
                  expression: "vir.full_name"
                }
              ],
              staticClass: "form-control",
              attrs: {
                value: "",
                placeholder: "Họ và tên",
                type: "text",
                name: "full_name",
                disabled: _vm.isDisable.full_name
              },
              domProps: { value: _vm.vir.full_name },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.vir, "full_name", $event.target.value)
                }
              }
            }),
            _vm._v(" "),
            _vm.errors["full_name"]
              ? _c(
                  "span",
                  {
                    staticClass:
                      "text-danger notification_name pull-right text-under-input"
                  },
                  [_vm._v(_vm._s(_vm.errors["full_name"]))]
                )
              : _vm._e()
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "form-group m-b-20" }, [
          _vm._m(2),
          _vm._v(" "),
          _c("div", { staticClass: "form-group__input" }, [
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.vir.number_phone,
                  expression: "vir.number_phone"
                }
              ],
              staticClass: "form-control",
              attrs: {
                type: "number",
                value: "",
                placeholder: "Số điện thoại",
                name: "number_phone",
                disabled: _vm.isDisable.number_phone
              },
              domProps: { value: _vm.vir.number_phone },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.vir, "number_phone", $event.target.value)
                }
              }
            }),
            _vm._v(" "),
            _vm.errors["number_phone"]
              ? _c(
                  "span",
                  {
                    staticClass:
                      "text-danger notification_phone pull-right text-under-input"
                  },
                  [_vm._v(_vm._s(_vm.errors["number_phone"]))]
                )
              : _vm._e()
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "form-group m-b-30" }, [
          _vm._m(3),
          _vm._v(" "),
          _c("div", { staticClass: "form-group__input" }, [
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.vir.email,
                  expression: "vir.email"
                }
              ],
              staticClass: "form-control",
              attrs: {
                type: "email",
                value: "",
                placeholder: "Email",
                name: "email",
                disabled: _vm.isDisable.email
              },
              domProps: { value: _vm.vir.email },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.vir, "email", $event.target.value)
                }
              }
            }),
            _vm._v(" "),
            _vm.errors["email"]
              ? _c(
                  "span",
                  {
                    staticClass:
                      "text-danger notification_email pull-right text-under-input"
                  },
                  [_vm._v(_vm._s(_vm.errors["email"]))]
                )
              : _vm._e()
          ])
        ]),
        _vm._v(" "),
        _c(
          "button",
          {
            staticClass: "button-primary w100 btn-step-3",
            on: {
              click: function($event) {
                return _vm.btnSubmit()
              }
            }
          },
          [_vm._v("\n                Hoàn thành\n            ")]
        )
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "s-text2 m-b-20" }, [
      _vm._v("Thông tin cơ bản"),
      _c("sup", [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_vm._v("Họ và tên"), _c("sup", [_vm._v("*")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_vm._v("Số điện thoại"), _c("sup", [_vm._v("*")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_vm._v("Email"), _c("sup", [_vm._v("*")])])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/step4.vue?vue&type=template&id=023a0f2c&scoped=true&":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/vir/step4.vue?vue&type=template&id=023a0f2c&scoped=true& ***!
  \*************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm._m(0)
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", [
      _c("div", { staticClass: "va-step va-step-4 animated fadeInDown" }, [
        _c("div", { staticClass: "page-block m-b-30 size1 tac" }, [
          _c("div", { staticClass: "s-text2 m-b-6" }, [_vm._v("Xem kết quả")]),
          _vm._v(" "),
          _c("div", { staticClass: "s-text8 m-b-20" }, [
            _vm._v(
              "Mã xác thực đã được gửi đến điện thoại của bạn, hãy vui lòng nhập mã xác thực để xem kết quả * Mật khẩu mới dùng để đăng ký tài khoản trong hệ thống"
            )
          ]),
          _vm._v(" "),
          _c("input", {
            staticClass: "form-control m-b-10",
            attrs: {
              type: "password",
              name: "password-new",
              placeholder: "Nhập mật khẩu mới"
            }
          }),
          _vm._v(" "),
          _c("input", {
            staticClass: "form-control m-b-10",
            attrs: {
              type: "text",
              name: "code-verify",
              placeholder: "Nhập mã xác thực"
            }
          }),
          _vm._v(" "),
          _c("p", { staticClass: "p-code-verify text text-danger pull-right" }),
          _vm._v("\n            {{--                            "),
          _c(
            "div",
            {
              staticClass: "form-countdown m-b-20",
              attrs: { id: "countdownTime" }
            },
            [_vm._v("10:00")]
          ),
          _vm._v("--}}\n            "),
          _c(
            "button",
            {
              staticClass: "button-primary pull-left sms-btn",
              attrs: { type: "submit" }
            },
            [_vm._v("Tiếp tục")]
          ),
          _vm._v(" "),
          _c("br")
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "va-step va-step-4-1 animated fadeInDown" }, [
        _c("div", { staticClass: "page-block m-b-30 size1 tac" }, [
          _c("div", { staticClass: "s-text2 m-b-6" }, [_vm._v("Login")]),
          _vm._v(" "),
          _c("div", { staticClass: "s-text8 m-b-20" }, [
            _vm._v(
              "Tài khoản đã có trong hệ thống vui lòng đăng nhập để tiếp tục"
            )
          ]),
          _vm._v(" "),
          _c("input", {
            staticClass: "form-control m-b-10",
            attrs: { type: "text", name: "phone-verify", readonly: "" }
          }),
          _vm._v(" "),
          _c("input", {
            staticClass: "form-control m-b-10",
            attrs: {
              type: "password",
              name: "password-verify",
              placeholder: "Nhập mật khẩu"
            }
          }),
          _vm._v(" "),
          _c("p", {
            staticClass: "pull-right text text-danger login-password"
          }),
          _vm._v(" "),
          _c(
            "button",
            {
              staticClass: "button-primary login-btn",
              attrs: { type: "submit" }
            },
            [_vm._v("Tiếp tục")]
          )
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/stepLast.vue?vue&type=template&id=9eff3c20&scoped=true&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/vir/stepLast.vue?vue&type=template&id=9eff3c20&scoped=true& ***!
  \****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "matching-job-result animated fadeInDown" }, [
    _c(
      "div",
      {
        staticClass: "button-secondary m-b-30 m-l-15",
        on: {
          click: function($event) {
            return _vm.backStep()
          }
        }
      },
      [_c("i", { staticClass: "icon-left-arrow m-r-10" }), _vm._v("Quay lại")]
    ),
    _vm._v(" "),
    _vm.listJob.length > 0
      ? _c("div", { staticClass: "m-text6 m-b-30 tac" }, [
          _vm._v("Chúng tôi tìm thấy 3 công việc phù hợp nhất với bạn")
        ])
      : _vm._e(),
    _vm._v(" "),
    _vm.listJob.length == 0
      ? _c("div", { staticClass: "m-text6 m-b-30 tac" }, [
          _vm._v("Chúng tôi không tìm thấy công việc phù hợp với bạn")
        ])
      : _vm._e(),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "matching-job p-b-40", attrs: { id: "root-job" } },
      _vm._l(_vm.listJob, function(item) {
        return _c("div", { staticClass: "col-md-4 col-sm-6 col-xs-12" }, [
          _c(
            "div",
            {
              staticClass: "matching-job__item m-b-30",
              attrs: { id: "job-detail-1" }
            },
            [
              _c("div", { staticClass: "matching-job__img" }, [
                _c("img", {
                  attrs: {
                    src: "https://file.samacom.com.vn/userfiles" + item.logo
                  }
                })
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "matching-job__info" }, [
                _c("div", { staticClass: "matching-job__text" }, [
                  _c("div", { staticClass: "s-text5 dJobTitle" }, [
                    _vm._v(_vm._s(item.companyName))
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "matching-job__text" }, [
                  _c("div", { staticClass: "page-tag page-tag--red" }, [
                    item.job_type == 1
                      ? _c("span", [_vm._v("Toàn thời gian")])
                      : _vm._e(),
                    _vm._v(" "),
                    item.job_type == 2
                      ? _c("span", [_vm._v("Bán thời gian")])
                      : _vm._e(),
                    _vm._v(" "),
                    item.job_type == 3
                      ? _c("span", [_vm._v("Hợp đồng")])
                      : _vm._e(),
                    _vm._v(" "),
                    item.job_type == 4
                      ? _c("span", [_vm._v("Thời vụ")])
                      : _vm._e()
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "matching-job__text" }, [
                  _c("div", { staticClass: "s-text12 dCompanyName" }, [
                    _vm._v(_vm._s(item.title))
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "matching-job__text dSalaryDetail" }, [
                  _vm._v(
                    " " +
                      _vm._s(_vm.formatPrice(item.income_min)) +
                      " VND - " +
                      _vm._s(_vm.formatPrice(item.income_max)) +
                      " VND"
                  )
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "matching-job__text" }, [
                  _vm._v("Không yêu cầu bằng cấp")
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "matching-job__text" }, [
                  item.gender == 1 ? _c("span", [_vm._v("Nam")]) : _vm._e(),
                  _vm._v(" "),
                  item.gender == 2 ? _c("span", [_vm._v("Nữ")]) : _vm._e(),
                  _vm._v(" "),
                  item.gender == 3 ? _c("span", [_vm._v("Khác")]) : _vm._e()
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "matching-job__text dProvince" }, [
                  _vm._v(_vm._s(item.provinceName))
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "matching-job__text dDistrict" }, [
                  _vm._v(_vm._s(item.districtName))
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "matching-job__link" }, [
                _c(
                  "a",
                  {
                    staticClass: "button-primary",
                    attrs: { href: "/cong-viec/" + item.id }
                  },
                  [_vm._v("Xem chi tiết")]
                )
              ])
            ]
          )
        ])
      }),
      0
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/top-step.vue?vue&type=template&id=29415db2&scoped=true&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/vir/top-step.vue?vue&type=template&id=29415db2&scoped=true& ***!
  \****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "va-progress p-t-35 p-b-20" }, [
    _c("ul", { staticClass: "progress-list", class: _vm.buildClassStep() }, [
      _vm._m(0),
      _vm._v(" "),
      _vm._m(1),
      _vm._v(" "),
      _vm._m(2),
      _vm._v(" "),
      _vm._m(3)
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "li",
      { staticClass: "progress-list__point progress-list__point-1" },
      [
        _c("div", { staticClass: "progress-list__number m-b-8" }, [
          _vm._v("1")
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "progress-list__title" }, [
          _vm._v("Mô tả bản thân")
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "progress-list__line" }, [
          _c("div", { staticClass: "progress-list__line-inner" })
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "li",
      { staticClass: "progress-list__point progress-list__point-2" },
      [
        _c("div", { staticClass: "progress-list__number m-b-8" }, [
          _vm._v("2")
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "progress-list__title" }, [
          _vm._v("Mô tả mong muốn")
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "progress-list__line" }, [
          _c("div", { staticClass: "progress-list__line-inner" })
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "li",
      { staticClass: "progress-list__point progress-list__point-3" },
      [
        _c("div", { staticClass: "progress-list__number m-b-8" }, [
          _vm._v("3")
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "progress-list__title" }, [
          _vm._v("Thông tin liên hệ")
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "progress-list__line" }, [
          _c("div", { staticClass: "progress-list__line-inner" })
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "li",
      { staticClass: "progress-list__point progress-list__point-4" },
      [
        _c("div", { staticClass: "progress-list__number m-b-8" }, [
          _vm._v("4")
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "progress-list__title" }, [_vm._v("Kết quả")]),
        _vm._v(" "),
        _c("div", { staticClass: "progress-list__line" }, [
          _c("div", { staticClass: "progress-list__line-inner" })
        ])
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () { injectStyles.call(this, this.$root.$options.shadowRoot) }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/vir/my-current-input.vue":
/*!***********************************************!*\
  !*** ./resources/js/vir/my-current-input.vue ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _my_current_input_vue_vue_type_template_id_648121fa_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./my-current-input.vue?vue&type=template&id=648121fa&scoped=true& */ "./resources/js/vir/my-current-input.vue?vue&type=template&id=648121fa&scoped=true&");
/* harmony import */ var _my_current_input_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./my-current-input.vue?vue&type=script&lang=js& */ "./resources/js/vir/my-current-input.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _my_current_input_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _my_current_input_vue_vue_type_template_id_648121fa_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _my_current_input_vue_vue_type_template_id_648121fa_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "648121fa",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/vir/my-current-input.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/vir/my-current-input.vue?vue&type=script&lang=js&":
/*!************************************************************************!*\
  !*** ./resources/js/vir/my-current-input.vue?vue&type=script&lang=js& ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_my_current_input_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./my-current-input.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/my-current-input.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_my_current_input_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/vir/my-current-input.vue?vue&type=template&id=648121fa&scoped=true&":
/*!******************************************************************************************!*\
  !*** ./resources/js/vir/my-current-input.vue?vue&type=template&id=648121fa&scoped=true& ***!
  \******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_my_current_input_vue_vue_type_template_id_648121fa_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./my-current-input.vue?vue&type=template&id=648121fa&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/my-current-input.vue?vue&type=template&id=648121fa&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_my_current_input_vue_vue_type_template_id_648121fa_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_my_current_input_vue_vue_type_template_id_648121fa_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/vir/step1.vue":
/*!************************************!*\
  !*** ./resources/js/vir/step1.vue ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _step1_vue_vue_type_template_id_028e9c32_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./step1.vue?vue&type=template&id=028e9c32&scoped=true& */ "./resources/js/vir/step1.vue?vue&type=template&id=028e9c32&scoped=true&");
/* harmony import */ var _step1_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./step1.vue?vue&type=script&lang=js& */ "./resources/js/vir/step1.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _step1_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _step1_vue_vue_type_template_id_028e9c32_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _step1_vue_vue_type_template_id_028e9c32_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "028e9c32",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/vir/step1.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/vir/step1.vue?vue&type=script&lang=js&":
/*!*************************************************************!*\
  !*** ./resources/js/vir/step1.vue?vue&type=script&lang=js& ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_step1_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./step1.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/step1.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_step1_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/vir/step1.vue?vue&type=template&id=028e9c32&scoped=true&":
/*!*******************************************************************************!*\
  !*** ./resources/js/vir/step1.vue?vue&type=template&id=028e9c32&scoped=true& ***!
  \*******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_step1_vue_vue_type_template_id_028e9c32_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./step1.vue?vue&type=template&id=028e9c32&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/step1.vue?vue&type=template&id=028e9c32&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_step1_vue_vue_type_template_id_028e9c32_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_step1_vue_vue_type_template_id_028e9c32_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/vir/step2.vue":
/*!************************************!*\
  !*** ./resources/js/vir/step2.vue ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _step2_vue_vue_type_template_id_02726d30_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./step2.vue?vue&type=template&id=02726d30&scoped=true& */ "./resources/js/vir/step2.vue?vue&type=template&id=02726d30&scoped=true&");
/* harmony import */ var _step2_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./step2.vue?vue&type=script&lang=js& */ "./resources/js/vir/step2.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _step2_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _step2_vue_vue_type_template_id_02726d30_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _step2_vue_vue_type_template_id_02726d30_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "02726d30",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/vir/step2.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/vir/step2.vue?vue&type=script&lang=js&":
/*!*************************************************************!*\
  !*** ./resources/js/vir/step2.vue?vue&type=script&lang=js& ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_step2_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./step2.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/step2.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_step2_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/vir/step2.vue?vue&type=template&id=02726d30&scoped=true&":
/*!*******************************************************************************!*\
  !*** ./resources/js/vir/step2.vue?vue&type=template&id=02726d30&scoped=true& ***!
  \*******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_step2_vue_vue_type_template_id_02726d30_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./step2.vue?vue&type=template&id=02726d30&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/step2.vue?vue&type=template&id=02726d30&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_step2_vue_vue_type_template_id_02726d30_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_step2_vue_vue_type_template_id_02726d30_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/vir/step3.vue":
/*!************************************!*\
  !*** ./resources/js/vir/step3.vue ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _step3_vue_vue_type_template_id_02563e2e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./step3.vue?vue&type=template&id=02563e2e&scoped=true& */ "./resources/js/vir/step3.vue?vue&type=template&id=02563e2e&scoped=true&");
/* harmony import */ var _step3_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./step3.vue?vue&type=script&lang=js& */ "./resources/js/vir/step3.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _step3_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _step3_vue_vue_type_template_id_02563e2e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _step3_vue_vue_type_template_id_02563e2e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "02563e2e",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/vir/step3.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/vir/step3.vue?vue&type=script&lang=js&":
/*!*************************************************************!*\
  !*** ./resources/js/vir/step3.vue?vue&type=script&lang=js& ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_step3_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./step3.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/step3.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_step3_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/vir/step3.vue?vue&type=template&id=02563e2e&scoped=true&":
/*!*******************************************************************************!*\
  !*** ./resources/js/vir/step3.vue?vue&type=template&id=02563e2e&scoped=true& ***!
  \*******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_step3_vue_vue_type_template_id_02563e2e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./step3.vue?vue&type=template&id=02563e2e&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/step3.vue?vue&type=template&id=02563e2e&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_step3_vue_vue_type_template_id_02563e2e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_step3_vue_vue_type_template_id_02563e2e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/vir/step4.vue":
/*!************************************!*\
  !*** ./resources/js/vir/step4.vue ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _step4_vue_vue_type_template_id_023a0f2c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./step4.vue?vue&type=template&id=023a0f2c&scoped=true& */ "./resources/js/vir/step4.vue?vue&type=template&id=023a0f2c&scoped=true&");
/* harmony import */ var _step4_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./step4.vue?vue&type=script&lang=js& */ "./resources/js/vir/step4.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _step4_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _step4_vue_vue_type_template_id_023a0f2c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _step4_vue_vue_type_template_id_023a0f2c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "023a0f2c",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/vir/step4.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/vir/step4.vue?vue&type=script&lang=js&":
/*!*************************************************************!*\
  !*** ./resources/js/vir/step4.vue?vue&type=script&lang=js& ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_step4_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./step4.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/step4.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_step4_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/vir/step4.vue?vue&type=template&id=023a0f2c&scoped=true&":
/*!*******************************************************************************!*\
  !*** ./resources/js/vir/step4.vue?vue&type=template&id=023a0f2c&scoped=true& ***!
  \*******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_step4_vue_vue_type_template_id_023a0f2c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./step4.vue?vue&type=template&id=023a0f2c&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/step4.vue?vue&type=template&id=023a0f2c&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_step4_vue_vue_type_template_id_023a0f2c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_step4_vue_vue_type_template_id_023a0f2c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/vir/stepLast.vue":
/*!***************************************!*\
  !*** ./resources/js/vir/stepLast.vue ***!
  \***************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _stepLast_vue_vue_type_template_id_9eff3c20_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./stepLast.vue?vue&type=template&id=9eff3c20&scoped=true& */ "./resources/js/vir/stepLast.vue?vue&type=template&id=9eff3c20&scoped=true&");
/* harmony import */ var _stepLast_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./stepLast.vue?vue&type=script&lang=js& */ "./resources/js/vir/stepLast.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _stepLast_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _stepLast_vue_vue_type_template_id_9eff3c20_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _stepLast_vue_vue_type_template_id_9eff3c20_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "9eff3c20",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/vir/stepLast.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/vir/stepLast.vue?vue&type=script&lang=js&":
/*!****************************************************************!*\
  !*** ./resources/js/vir/stepLast.vue?vue&type=script&lang=js& ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_stepLast_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./stepLast.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/stepLast.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_stepLast_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/vir/stepLast.vue?vue&type=template&id=9eff3c20&scoped=true&":
/*!**********************************************************************************!*\
  !*** ./resources/js/vir/stepLast.vue?vue&type=template&id=9eff3c20&scoped=true& ***!
  \**********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_stepLast_vue_vue_type_template_id_9eff3c20_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./stepLast.vue?vue&type=template&id=9eff3c20&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/stepLast.vue?vue&type=template&id=9eff3c20&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_stepLast_vue_vue_type_template_id_9eff3c20_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_stepLast_vue_vue_type_template_id_9eff3c20_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/vir/top-step.vue":
/*!***************************************!*\
  !*** ./resources/js/vir/top-step.vue ***!
  \***************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _top_step_vue_vue_type_template_id_29415db2_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./top-step.vue?vue&type=template&id=29415db2&scoped=true& */ "./resources/js/vir/top-step.vue?vue&type=template&id=29415db2&scoped=true&");
/* harmony import */ var _top_step_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./top-step.vue?vue&type=script&lang=js& */ "./resources/js/vir/top-step.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _top_step_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _top_step_vue_vue_type_template_id_29415db2_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _top_step_vue_vue_type_template_id_29415db2_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "29415db2",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/vir/top-step.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/vir/top-step.vue?vue&type=script&lang=js&":
/*!****************************************************************!*\
  !*** ./resources/js/vir/top-step.vue?vue&type=script&lang=js& ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_top_step_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./top-step.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/top-step.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_top_step_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/vir/top-step.vue?vue&type=template&id=29415db2&scoped=true&":
/*!**********************************************************************************!*\
  !*** ./resources/js/vir/top-step.vue?vue&type=template&id=29415db2&scoped=true& ***!
  \**********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_top_step_vue_vue_type_template_id_29415db2_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./top-step.vue?vue&type=template&id=29415db2&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/vir/top-step.vue?vue&type=template&id=29415db2&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_top_step_vue_vue_type_template_id_29415db2_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_top_step_vue_vue_type_template_id_29415db2_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/vir/vir.js":
/*!*********************************!*\
  !*** ./resources/js/vir/vir.js ***!
  \*********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _top_step_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./top-step.vue */ "./resources/js/vir/top-step.vue");
/* harmony import */ var _step1_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./step1.vue */ "./resources/js/vir/step1.vue");
/* harmony import */ var _step2_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./step2.vue */ "./resources/js/vir/step2.vue");
/* harmony import */ var _step3_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./step3.vue */ "./resources/js/vir/step3.vue");
/* harmony import */ var _step4_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./step4.vue */ "./resources/js/vir/step4.vue");
/* harmony import */ var _stepLast_vue__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./stepLast.vue */ "./resources/js/vir/stepLast.vue");






var TIME_EXPIRED = 10 * 60 * 1000;
var app = new Vue({
  el: '#vir',
  components: {
    TopStep: _top_step_vue__WEBPACK_IMPORTED_MODULE_0__["default"],
    Step1: _step1_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
    Step2: _step2_vue__WEBPACK_IMPORTED_MODULE_2__["default"],
    Step3: _step3_vue__WEBPACK_IMPORTED_MODULE_3__["default"],
    Step4: _step4_vue__WEBPACK_IMPORTED_MODULE_4__["default"],
    StepLast: _stepLast_vue__WEBPACK_IMPORTED_MODULE_5__["default"]
  },
  data: function data() {
    return {
      virdata: {
        step: 1
      }
    };
  },
  mounted: function mounted() {
    // localStorage.clear();
    this.virdata.step = this.getStepToLocalStorage();
  },
  methods: {
    passDataToParent: function passDataToParent(step) {
      this.setStepToLocalStorage(step);
      this.virdata.step = this.getStepToLocalStorage();
    },
    setStepToLocalStorage: function setStepToLocalStorage(step) {
      var item = {
        'step': step,
        'timeExpired': new Date().getTime() + TIME_EXPIRED
      };
      localStorage.setItem('step', JSON.stringify(item));
    },
    getStepToLocalStorage: function getStepToLocalStorage() {
      var step = JSON.parse(localStorage.getItem('step'));

      if (!step) {
        return 1;
      }

      if (step.timeExpired < new Date().getTime()) {
        return 1;
      }

      return step.step;
    }
  }
});

/***/ }),

/***/ 2:
/*!***************************************!*\
  !*** multi ./resources/js/vir/vir.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\samacom\samacom\resources\js\vir\vir.js */"./resources/js/vir/vir.js");


/***/ })

/******/ });