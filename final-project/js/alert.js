const message = id => {    
    Swal.fire({
        title: "¿Desea borrar el registro?",
        showCancelButton: true,
        confirmButtonText: "Si",
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            Swal.fire("Saved!", "", "success");
            setTimeout(() => {
                window.location = `index.php?txtID=${id}`;
            }, "1000");
        }
      });
}
// 