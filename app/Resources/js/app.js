import $ from 'jquery';
// import 'bootstrap';
import '../styles/app.scss';

import searchService from './searchService';

$(document).ready(() => {
  console.log("hello there");
  $('#search-form').submit(() => {
    const val = $('#search-input').val();
    search(val);

    return false;
  });

  search();
});

const search = (val = '') => {
  searchService.searchFor(val).then((response) => {
    handleFolderResponse(response.data);
  });
};

const handleFolderResponse = (folders) => {
  // inline table
  const rows = [];
  folders.forEach((folder) => {
    addFolderRow(rows, folder);
  });

  // render
  renderFolders(rows);
};

/**
 * recursive function to loop through each node and add it to rows result
 * @param rows
 * @param folder
 * @param depth
 * @returns {*}
 */
const addFolderRow = (rows, folder, depth = 1) => {
  // add current node
  rows.push({
    name: folder.name,
    depth: depth,
  });

  // add files
  folder.files.forEach((file) => {
    rows.push({
      name: file.name,
      depth: depth,
      type: 'file',
    });
  });

  // add children
  if (depth < 5) {
    folder.children.forEach((child) => {
      addFolderRow(rows, child, depth + 1);
    });
  }

  return rows;
};

const renderFolders = (rows) => {
  let res = '';
  rows.forEach((row) => {
    if (row.type === 'file') {
      res += `
        <tr class="depth-${row.depth} file">
          <td>
              <span class="oi oi-file" title="file" aria-hidden="true"></span> 
              ${row.name}
          </td>
        </tr>
      `;
    }
    else {
      res += `
        <tr class="depth-${row.depth}">
          <td>
              <span class="oi oi-folder" title="folder" aria-hidden="true"></span> 
              ${row.name}
          </td>
        </tr>
      `;
    }
  });

  $('.explorer-table tbody')
    .empty()
    .append(res);
};