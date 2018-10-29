class VacancySearch {
  constructor($state, $dataService) {
    this.$dataService = $dataService;

    this.$state = $state;
    this.page = $state.params.page || 1;
    this.q = $state.params.q || '';
    this.category_id = $state.params.category_id || '';
    this.location = $state.params.location || '';
    this.dateFrom = $state.params.date_from || '';
    this.dateTo = $state.params.date_to || '';

    this.$dataService.loadCategories();
    this.$dataService.loadSearch(this.getParams());
  }

  submit() {
    this.$state.go('search', this.getParams());
  }
  apply() {
    this.page = 1;
    this.submit();
  }
  getParams() {
    return {
      q: this.q,
      category_id: this.category_id,
      location: this.location,
      date_from: this.dateFrom,
      date_to: this.dateTo,
      page: this.page,
    }
  }
  previous() {
    this.page--;
    this.submit();
  }
  next() {
    this.page++;
    this.submit();
  }

}
VacancySearch.$inject = ['$state', '$dataService'];
export const search = {
  controller: VacancySearch,
  template: `
        <div class="container">
            <form class="row" ng-submit="$ctrl.apply()">
        
                <div class="form-group  col-2">
                    <input type="text" ng-model="$ctrl.q" class="form-control"  placeholder="Search"/>
                </div>
        
                <div class="form-group  col-2">
                    <input type="text" ng-model="$ctrl.location" class="form-control" placeholder="Location""/>
                </div>
        
                <div class="form-group  col-2">
                    <select ng-model="$ctrl.category_id" class="form-control" placeholder="Category">
                        <option value="" ></option>
                        <option ng-repeat="item in $ctrl.$dataService.categories" value="{{item.id}}" >
                            {{ item.title }}
                        </option>
                    </select>
                </div>
                <div class="form-group col-2" >
                    <datepicker date-format="MMMM d, y">
                        <input type="text" ng-model="$ctrl.dateFrom" class="form-control" placeholder="Date from"/>
                    </datepicker>
                </div>
                <div class="form-group  col-2">
                    <datepicker date-format="MMMM d, y">
                        <input type="text" ng-model="$ctrl.dateTo" class="form-control " placeholder="Date to"/>
                    </datepicker>
                </div>
                <div class="form-group  col-1">
                    <button type="submit" class="btn btn-primary" ng-click="$ctrl.go()">Apply</button>
                </div>
            </form>
            <div class="mt-3">
                <div ng-if="$ctrl.$dataService.status('search') == 1">
                    <div ng-if="$ctrl.$dataService.search.data.length">
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Location</th>
                                    <th>Date created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in $ctrl.$dataService.search.data">
                                    <td>{{ item.id}}</td>
                                    <td><a ui-sref="vacancy({id: item.id})">{{ item.title}}</a></td>
                                    <td>{{ $ctrl.$dataService.categoriesById[item.categoryId] }}</td>
                                    <td>{{ item.location }}</td>
                                    <td>{{ item.createdAt }}</td>
                                </tr>
        
                            </tbody>
                        </table>
                        <div class="mt-3">
                          <ul class="pagination">
                  
                              <li class="page-item"><button class="page-link" ng-click="$ctrl.previous()" ng-if="$ctrl.$dataService.search.currentPage > 1">Previous</button></li>
                              <li class="page-item"><button class="page-link" ng-click="$ctrl.next()"  ng-if="$ctrl.$dataService.search.currentPage < $ctrl.$dataService.search.lastPage">Next</button></li>
                          </ul>
                          <div><span class="mr-5">Page: {{$ctrl.$dataService.search.currentPage}} / {{$ctrl.$dataService.search.lastPage}}</span><span class="mr-2">Total items: {{$ctrl.$dataService.search.total}} </span></div>
                        </div>
                    </div>
                    <div ng-if="$ctrl.$dataService.search.data.length == 0">
                      <h3>No results</h3>
                    </div>
                </div>
                <div ng-if="$ctrl.$dataService.status('search') == 0">
                  <div class="loading-ring-container">
                        <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                  </div>
                </div>
                <div ng-if="$ctrl.$dataService.status('search') == 2">
                  <h3>Something went wrong</h3>
                </div>
            </div>

        </div>
  `
}
