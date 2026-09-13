// KWONN theme effects — password toggle + live table search
document.addEventListener('DOMContentLoaded', function () {

  // Password show/hide toggle
  document.querySelectorAll('.toggle-pass').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var input = document.getElementById(btn.dataset.target);
      if (!input) return;
      var showing = input.type === 'text';
      input.type = showing ? 'password' : 'text';
      btn.innerHTML = showing ? eyeIcon() : eyeOffIcon();
    });
  });

  // Live search filter on the products table
  var searchInput = document.getElementById('productSearch');
  if (searchInput) {
    var rows = document.querySelectorAll('.product-row');
    var emptyState = document.getElementById('emptyState');
    searchInput.addEventListener('input', function () {
      var q = searchInput.value.trim().toLowerCase();
      var visible = 0;
      rows.forEach(function (row) {
        var name = (row.dataset.name || '').toLowerCase();
        var match = name.indexOf(q) !== -1;
        row.style.display = match ? '' : 'none';
        if (match) visible++;
      });
      if (emptyState) emptyState.style.display = visible === 0 ? '' : 'none';
    });
  }

  function eyeIcon() {
    return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z"/><circle cx="12" cy="12" r="3"/></svg>';
  }
  function eyeOffIcon() {
    return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.94 10.94 0 0 1 12 19c-7 0-11-7-11-7a21.6 21.6 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 7 11 7a21.6 21.6 0 0 1-2.16 3.19M14.12 14.12a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>';
  }
});