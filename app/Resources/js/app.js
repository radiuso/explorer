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

  search();
});

const search = (val = '') => {
  searchService.searchFor(val).then((response) => {
    renderFolders(response.data);
  });
};

const renderFolders = (folders) => {
  let res = '';
  folders.forEach((folder) => {
    res += `
      <tr>
        <td>
            <span class="oi oi-folder" title="icon name" aria-hidden="true"></span> 
            ${folder.name}
        </td>
      </tr>
    `;
  });

  $('.explorer-table tbody')
    .empty()
    .append(res);
};