import angular from 'angular';
import uiRouter from "@uirouter/angularjs";

import '../style/app.css';

var myApp = angular.module('app', [uiRouter]);

myApp.config(function ($stateProvider, $urlRouterProvider) {
  $urlRouterProvider.otherwise('/vacancies');
  var searchState = {
    name: 'search',
    url: '/vacancies',
    template: `this is search page`
  };

  var vacancyState = {
    name: 'vacancy',
    url: '/vacancy/:id',
    template: `this is vacancy page`
  };

  $stateProvider.state(searchState);
  $stateProvider.state(vacancyState);
});