import $ from 'jquery';
// import 'bootstrap';
import '../styles/app.scss';

import searchService from './searchService';

$(document).ready(() => {
  console.log("hello there");
  $('#search-action').click(() => {
    const val = $('#search-input').val();
    search(val);
  });
});

const search = (val) => {
  if (val !== '') {
    searchService.searchFor(val).then((response) => {
      console.log(response.data);
    });
  }
};
