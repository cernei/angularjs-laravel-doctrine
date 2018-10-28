const url = process.env.API_URL;

export default class dataService {
  constructor($http) {
    this.$http = $http;
    this.isCategoriesLoaded = false;
    this.statusArr = {};
    this.categoriesById = {};
  }

  status(param) {
    return this.statusArr[param].$$state.status;
  }

  loadSearch(params) {
    this.statusArr.search = this.$http({
      url: url + '/vacancies/search',
      method: "GET",
      params: params
    }).then(response => {
      this.search = response.data;
    });
  }

  loadCategories() {
    if (!this.isCategoriesLoaded) {
      this.statusArr.categories = this.$http.get(url + '/categories').then(response => {
        this.categories = response.data;
        for (let i in this.categories) {
          this.categoriesById[this.categories[i].id] = this.categories[i].title;
        }
        this.isCategoriesLoaded = true;

      });
    }
  }

  loadVacancy(id) {
    this.statusArr.vacancy = this.$http.get(url + '/vacancies/' + id).then(response => {
      this.vacancy = response.data
    });

  }
}
