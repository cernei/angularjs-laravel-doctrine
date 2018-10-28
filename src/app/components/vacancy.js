class Vacancy {
  constructor($stateParams, $dataService) {
    this.$dataService = $dataService;

    this.$dataService.loadCategories();
    this.$dataService.loadVacancy($stateParams.id);
  }

}
export const vacancy = {
  controller: Vacancy,
  template: `
    <div ng-if="$ctrl.$dataService.status('vacancy') == 1">
      <h1>{{ $ctrl.$dataService.vacancy.title}}</h1>
      <div>Category: <b>{{ $ctrl.$dataService.categoriesById[$ctrl.$dataService.vacancy.categoryId] }}</b></div>
      <div>{{ $ctrl.$dataService.vacancy.content}}</div>
    </div>
    <div ng-if="$ctrl.$dataService.status('vacancy') == 0">
      <div class="loading-ring-container">
            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
      </div>
    </div>
  `
};
