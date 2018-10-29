import angular from 'angular';
import uiRouter from "@uirouter/angularjs";
import 'angularjs-datepicker';
import dataService from './services/data';
import '../style/app.css';

import {search} from "./components/vacancy.search";
import {vacancy} from "./components/vacancy";

var myApp = angular.module('app', [uiRouter, '720kb.datepicker']);

myApp.config(['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider) {
  $urlRouterProvider.otherwise('/vacancies');
  var searchState = {
    name: 'search',
    url: '/vacancies?q&category_id&location&date_from&date_to&page',
    component: 'search'
  };

  var vacancyState = {
    name: 'vacancy',
    url: '/vacancy/:id',
    component: 'vacancy'
  };

  $stateProvider.state(searchState);
  $stateProvider.state(vacancyState);
}]).component('search', search)
  .component('vacancy', vacancy)
  .service('$dataService', dataService);
