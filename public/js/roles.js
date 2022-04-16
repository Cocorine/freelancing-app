/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/roles.js":
/*!*******************************!*\
  !*** ./resources/js/roles.js ***!
  \*******************************/
/***/ (() => {

eval("Livewire.on(\"deleteTriggered\", function (id, name) {\n  var proceed = confirm(\"Voulez-vous vraiment supprimer le role : \".concat(name));\n\n  if (proceed) {\n    Livewire.emit(\"delete\", id);\n  }\n});\nwindow.addEventListener(\"role-deleted\", function (event) {\n  alert(\"Le r\\xF4le \".concat(event.detail.role_name, \" a \\xE9t\\xE9 supprim\\xE9!\"));\n});\nLivewire.on(\"triggerCreate\", function () {\n  console.log(\"create\");\n  $(\"#role-modal\").modal(\"show\");\n});\nwindow.addEventListener(\"role-saved\", function (event) {\n  $(\"#role-modal\").modal(\"hide\");\n  /* if(event.detail.action == 'updated'){\n      alert(`Le rôle ${event.detail.role_name} a été modifié!`);\n  }\n  else\n      alert(`Le rôle ${event.detail.role_name} a été créé!`);\n  } */\n\n  alert(\"Le r\\xF4le \".concat(event.detail.role_name, \" a \\xE9t\\xE9 \").concat(event.detail.role_name == 'updated' ? 'modifié' : 'créée', \" !\"));\n});\nLivewire.on(\"dataFetched\", function (role) {\n  $(\"#role-modal\").modal(\"show\");\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvcm9sZXMuanM/Zjc4ZCJdLCJuYW1lcyI6WyJMaXZld2lyZSIsIm9uIiwiaWQiLCJuYW1lIiwicHJvY2VlZCIsImNvbmZpcm0iLCJlbWl0Iiwid2luZG93IiwiYWRkRXZlbnRMaXN0ZW5lciIsImV2ZW50IiwiYWxlcnQiLCJkZXRhaWwiLCJyb2xlX25hbWUiLCJjb25zb2xlIiwibG9nIiwiJCIsIm1vZGFsIiwicm9sZSJdLCJtYXBwaW5ncyI6IkFBQUFBLFFBQVEsQ0FBQ0MsRUFBVCxDQUFZLGlCQUFaLEVBQStCLFVBQUNDLEVBQUQsRUFBS0MsSUFBTCxFQUFjO0FBQ3pDLE1BQU1DLE9BQU8sR0FBR0MsT0FBTyxvREFBNkNGLElBQTdDLEVBQXZCOztBQUVBLE1BQUlDLE9BQUosRUFBYTtBQUNUSixJQUFBQSxRQUFRLENBQUNNLElBQVQsQ0FBYyxRQUFkLEVBQXdCSixFQUF4QjtBQUNIO0FBQ0osQ0FORDtBQVFBSyxNQUFNLENBQUNDLGdCQUFQLENBQXdCLGNBQXhCLEVBQXdDLFVBQUNDLEtBQUQsRUFBVztBQUMvQ0MsRUFBQUEsS0FBSyxzQkFBWUQsS0FBSyxDQUFDRSxNQUFOLENBQWFDLFNBQXpCLCtCQUFMO0FBQ0gsQ0FGRDtBQUlBWixRQUFRLENBQUNDLEVBQVQsQ0FBWSxlQUFaLEVBQTZCLFlBQU07QUFDL0JZLEVBQUFBLE9BQU8sQ0FBQ0MsR0FBUixDQUFZLFFBQVo7QUFDQUMsRUFBQUEsQ0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQkMsS0FBakIsQ0FBdUIsTUFBdkI7QUFDSCxDQUhEO0FBS0FULE1BQU0sQ0FBQ0MsZ0JBQVAsQ0FBd0IsWUFBeEIsRUFBc0MsVUFBQ0MsS0FBRCxFQUFXO0FBQzdDTSxFQUFBQSxDQUFDLENBQUMsYUFBRCxDQUFELENBQWlCQyxLQUFqQixDQUF1QixNQUF2QjtBQUVBO0FBQ0o7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFDSU4sRUFBQUEsS0FBSyxzQkFBWUQsS0FBSyxDQUFDRSxNQUFOLENBQWFDLFNBQXpCLDBCQUE0Q0gsS0FBSyxDQUFDRSxNQUFOLENBQWFDLFNBQWIsSUFBMEIsU0FBMUIsR0FBc0MsU0FBdEMsR0FBa0QsT0FBOUYsUUFBTDtBQUNILENBVkQ7QUFZQVosUUFBUSxDQUFDQyxFQUFULENBQVksYUFBWixFQUEyQixVQUFDZ0IsSUFBRCxFQUFVO0FBQ2pDRixFQUFBQSxDQUFDLENBQUMsYUFBRCxDQUFELENBQWlCQyxLQUFqQixDQUF1QixNQUF2QjtBQUNELENBRkgiLCJzb3VyY2VzQ29udGVudCI6WyJMaXZld2lyZS5vbihcImRlbGV0ZVRyaWdnZXJlZFwiLCAoaWQsIG5hbWUpID0+IHtcbiAgICBjb25zdCBwcm9jZWVkID0gY29uZmlybShgVm91bGV6LXZvdXMgdnJhaW1lbnQgc3VwcHJpbWVyIGxlIHJvbGUgOiAke25hbWV9YCk7XG5cbiAgICBpZiAocHJvY2VlZCkge1xuICAgICAgICBMaXZld2lyZS5lbWl0KFwiZGVsZXRlXCIsIGlkKTtcbiAgICB9XG59KTtcblxud2luZG93LmFkZEV2ZW50TGlzdGVuZXIoXCJyb2xlLWRlbGV0ZWRcIiwgKGV2ZW50KSA9PiB7XG4gICAgYWxlcnQoYExlIHLDtGxlICR7ZXZlbnQuZGV0YWlsLnJvbGVfbmFtZX0gYSDDqXTDqSBzdXBwcmltw6khYCk7XG59KTtcblxuTGl2ZXdpcmUub24oXCJ0cmlnZ2VyQ3JlYXRlXCIsICgpID0+IHtcbiAgICBjb25zb2xlLmxvZyhcImNyZWF0ZVwiKTtcbiAgICAkKFwiI3JvbGUtbW9kYWxcIikubW9kYWwoXCJzaG93XCIpO1xufSk7XG5cbndpbmRvdy5hZGRFdmVudExpc3RlbmVyKFwicm9sZS1zYXZlZFwiLCAoZXZlbnQpID0+IHtcbiAgICAkKFwiI3JvbGUtbW9kYWxcIikubW9kYWwoXCJoaWRlXCIpO1xuXG4gICAgLyogaWYoZXZlbnQuZGV0YWlsLmFjdGlvbiA9PSAndXBkYXRlZCcpe1xuICAgICAgICBhbGVydChgTGUgcsO0bGUgJHtldmVudC5kZXRhaWwucm9sZV9uYW1lfSBhIMOpdMOpIG1vZGlmacOpIWApO1xuICAgIH1cbiAgICBlbHNlXG4gICAgICAgIGFsZXJ0KGBMZSByw7RsZSAke2V2ZW50LmRldGFpbC5yb2xlX25hbWV9IGEgw6l0w6kgY3LDqcOpIWApO1xuICAgIH0gKi9cbiAgICBhbGVydChgTGUgcsO0bGUgJHtldmVudC5kZXRhaWwucm9sZV9uYW1lfSBhIMOpdMOpICR7ZXZlbnQuZGV0YWlsLnJvbGVfbmFtZSA9PSAndXBkYXRlZCcgPyAnbW9kaWZpw6knIDogJ2Nyw6nDqWUnIH0gIWApO1xufSk7XG5cbkxpdmV3aXJlLm9uKFwiZGF0YUZldGNoZWRcIiwgKHJvbGUpID0+IHtcbiAgICAkKFwiI3JvbGUtbW9kYWxcIikubW9kYWwoXCJzaG93XCIpO1xuICB9KTtcbiJdLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvcm9sZXMuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/roles.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/roles.js"]();
/******/ 	
/******/ })()
;