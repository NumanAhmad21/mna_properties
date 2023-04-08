$(document).ready(function() {
    // Hide success message after 5 seconds
    setTimeout(function() {
        $('#success-message').fadeOut('slow');
    }, 5000);

    const deleteBtn = document.getElementById('delete-btn');

  deleteBtn.addEventListener('click', function(event) {
    // show confirmation dialog
    const confirmed = confirm("Are you sure you want to delete this item?");
    if (!confirmed) {
      // user clicked cancel, don't proceed with deletion
      event.preventDefault();
    }
  });
});
$('.show_confirm').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Are you sure you want to delete this record?`,
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        form.submit();
      }
    });
});